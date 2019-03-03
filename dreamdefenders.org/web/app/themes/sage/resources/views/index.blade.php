@extends('layouts.app')

@section('header')
  @include('partials.header')
@endsection

@section('content')
    {{-- Builder Layout --}}
    @if(get_field('components'))
      @layouts('components')

        @layout('content')
          @isnull(have_posts())
            <div class="post-index">
              <div class="alert alert-warning">
                {{ __('Sorry, no results were found.', 'sage') }}
              </div>
              {!! get_search_form(false) !!}
            </div>
          @endisnull

          @posts
            <div class="post-index">
              @include('partials.content-'.get_post_type())
            </div>
          @endposts

          {!! get_the_posts_navigation() !!}
        @endlayout

        @layout('instagram')
          @shortcode('[instagram-feed]')
        @endlayout

        @layout('form')
          @include('components.form')
        @endlayout

        @layout('cta-email')
          @include('partials.cta-email')
        @endlayout

      @endlayouts

    {{-- Fallback Layout --}}
    @else
      @include('components.hero-default')
      @if (!have_posts())
      <div class="alert alert-warning">
          {{ __('Sorry, no results were found.', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      <div class="post-index">
        @while (have_posts()) @php the_post() @endphp
          @include('partials.content')
        @endwhile
      </div>

      {!! get_the_posts_navigation() !!}
      @shortcode('[instagram-feed]')
    @endif
@endsection