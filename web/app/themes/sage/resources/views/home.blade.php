@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('partials.front.two-paths')
  @include('partials.front.organize')
  @include('partials.front.squadd-up')
  @include('partials.front.freedom-papers-teaser')
  @content
@endsection
