@extends('layouts.app')

@section('header')
<div class="bg-black">
  @include('partials.header')
</div>
@endsection

@section('content')

  @posts
    <main>
      <div class="page bg-white">
        <section>
          <img src="@field('freedompaper__image', 'url')" style="width:100vw;" />
        </section>
      </div>
    </main>
  @endposts
@endsection
