@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @posts
    <main>
      <div class="page bg-black">
        @include('components.post_nav')
        <section class="freedom-paper-single-view">
          <img src="{!! get_field('freedompaper__download')['url'] !!}?fm=pjpg&q=10" style="width:100vw;" />
        </section>
      </div>
    </main>
  @endposts
@endsection
