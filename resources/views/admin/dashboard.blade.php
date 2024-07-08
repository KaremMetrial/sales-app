@extends('admin.layouts.app')
@section('title')
    الرئيسية
@stop
@section('contentHeader')
    الرئيسية
@stop
@section('contentHeaderLink')
    <a href="{{ route('admin.dashboard') }}"> الرئيسية</a>
@stop
@section('contentHeaderActive')
    عرض
@stop
@section('content')
    <div class="row" style="background-image: url({{ asset('admin-assets/imgs/1.jpg') }}); background-size: cover; background-repeat: no-repeat; min-height: 600px; min-width: 600px" ></div>
@stop
