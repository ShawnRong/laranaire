@extends('layouts.app')

@section('content')
    <div class="container">
        <qform :questions="{{ $questions }}" :fill-status="true" :form-id="{{ $quesitonnaire_id }}"></qform>
    </div>
@endsection
