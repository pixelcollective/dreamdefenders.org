@extends('layouts.app')

@section('content')
  <header class="px-4 pt-32 mx-auto md:px-0">
    <img src="@asset('images/freedom-papers.jpg')" />
  </header>

  @while(have_posts()) @php(the_post())
    <div class="container pb-32 mx-auto lg:px-24">
      @include('partials.content-page')
    </div>
  @endwhile

  @if($posts = get_posts(['post_type' => 'freedom-papers']))
    <div class="flex flex-col flex-wrap px-4 mx-auto mt-0 alignfull md:flex-row" style="max-width: 1600px; margin-top: 0;">
      @foreach($posts as $post)
        <div class="w-full p-2 md:w-1/3">
          <a href="{!! get_the_permalink($post->ID) !!}"
            hoverfx hoverfx fx-elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
            class="relative z-0 block object-contain shadow shadow-md w-100 hover:shadow-2xl transition transition-all hover:z-10">
            <img
              class="w-100"
              src="{!! get_the_post_thumbnail_url($post->ID) !!}"
              @if($title = get_the_title($post->ID)) title="{!! $title !!}" @endif
              @if($excerpt = get_the_excerpt($post->ID)) alt="{!! $excerpt !!}" @endif
            />
          </a>
        </div>
      @endforeach
    </div>
  @endif
@endsection
