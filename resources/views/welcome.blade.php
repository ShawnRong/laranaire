@extends('layouts.app')

@section('content')
    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
        <div class="p-3 p-md-5 m-md-3 text-center">
            <h1 class="display-4 font-weight-normal">人人可用的在线表单工具</h1>
            <p class="lead font-weight-normal">
                帮你收集和管理日常工作中的数据，把几小时的工作缩减至零。
            </p>
            <a href="{{ route('login') }}" class="btn btn-outline-secondary">开始使用</a>
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>
    <div class="d-md-flex flex-equal w-100 pl-md-3 my-md-3">
        <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 p-3">
                <p class="lead text-left">已经有</p>
                <h2 class="display-3" id="number1">1234</h2>
                <p class="lead text-right">份表单生成</p>
            </div>
        </div>
        <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <p class="lead text-left">已经有</p>
                <h2 class="display-3" id="number2">21234</h2>
                <p class="lead text-right">人完成表单填写</p>
            </div>
        </div>
    </div>
@endsection
