@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
              <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Share Url</th>
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
                        {{ $questionnaire->identify_id }}
                  </td>
                  <td>
                    <a class="btn btn-primary" href="{{ route('questionnaire.show', $questionnaire) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ route('questionnaire.destroy', $questionnaire) }}" onclick="event.preventDefault();
                    document.getElementById('form-delete').submit();">Delete</a>
                    <form action="{{ route('questionnaire.destroy', $questionnaire) }}" id="form-delete" method="POST" style="display: none;">
                        @csrf
                        {{ method_field('DELETE') }}
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  <ul>
  </ul>
@endsection
