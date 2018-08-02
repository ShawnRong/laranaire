@extends('layouts.app')

@section('content')
    <div class="container">
        <qform :questions="{{ $questions }}" :fill-status="true"></qform>
    </div>
@endsection
