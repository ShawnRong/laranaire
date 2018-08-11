@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>IP地址</th>
                <th>填写时间</th>
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
                       {{ $answer->created_at->diffForHumans() }}
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
