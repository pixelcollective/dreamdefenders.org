@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @include('partials.front.two-paths')

  @include('partials.front.organize')

  @while(have_posts()) @php(the_post())
    <div class="container py-24 mx-auto">
      @include('partials.content-page')
    </div>

    @include('forms.dream-together')
  @endwhile

  @include('components.instagram')
@endsection
