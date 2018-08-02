@extends('layouts.app')

@section('content')
    <div class="container">
        <questionnaire :form-data="{{ $questionnaire }}"></questionnaire>
    </div>
@endsection
