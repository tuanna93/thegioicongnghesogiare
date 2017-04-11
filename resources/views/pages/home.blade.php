@extends('master')
@section('title',$title)
@section('keywords',$keywords)
@section('description',$description)
@section('content')
    @include('widgets.slide')

    @include('widgets.doitac')

    @include('widgets.home')
@endsection