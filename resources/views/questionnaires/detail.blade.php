@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>IP</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
              @foreach($answers as $index=>$answer)
                <tr>
                    <th>{{ $index + 1 }}</th>
                    <td>
                        {{ $answer->submit_address }}
                    </td>
                    <td>
                        <view-detail-button :details="{{ $answer->model }}"></view-detail-button>
                    </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        <slideout-panel></slideout-panel>
    </div>
@endsection
