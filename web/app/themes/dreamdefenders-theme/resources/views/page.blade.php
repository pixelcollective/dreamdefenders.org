@extends('layouts.app')

@section('header')
  @include('components.banner')
@endsection

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container py-8 mx-auto my-8">
      @include('partials.content-page')
    </div>

    <section class="px-4 mt-8 bg-black-100">
      <div class="container py-16 mx-auto">
        @include('forms.dream-together')
      </div>
    </section>
  @endwhile
@endsection
