@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container pb-24 mx-auto">
      @include('partials.content-page')
    </div>
  @endwhile

  <section>
    @include('forms.dream-together')
  </section>
@endsection
