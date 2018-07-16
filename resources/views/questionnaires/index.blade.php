@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Operate</th>
              </tr>
            </thead>
            <tbody>
              @foreach($questionnaires as $index=>$questionnaire)
                <tr>
                  <th>{{ $index + 1 }}</th>
                  <td>
                      <a href="{{ route('questionnaire.show', $questionnaire) }}">
                          {{ $questionnaire->title }}
                      </a>
                  </td>
                  <td>
                    <button type="button" class="btn btn-primary">Edit</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  <ul>
  </ul>
@endsection
