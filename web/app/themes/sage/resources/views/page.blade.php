@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container pb-32 mx-auto lg:px-24">
      @include('partials.content-page')
    </div>
  @endwhile
@endsection
