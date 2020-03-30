@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container pb-12 mx-auto">
      @include('partials.content-page')
    </div>
  @endwhile

  @include('components.instagram')
@endsection
