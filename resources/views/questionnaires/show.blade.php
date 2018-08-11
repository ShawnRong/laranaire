@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <questionnaire :form-data="{{ $questionnaire }}"></questionnaire>
    </div>
@endsection
