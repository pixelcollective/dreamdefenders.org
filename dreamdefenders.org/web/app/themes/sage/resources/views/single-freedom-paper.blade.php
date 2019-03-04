@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
  @posts
    <main>
      <div class="page bg-white">
        @include('components.post_nav')
        <section class="freedom-paper-single-view">
          <img src="@field('freedompaper__download', 'url')" style="width:100vw;" />
        </section>
      </div>
    </main>
  @endposts
@endsection
