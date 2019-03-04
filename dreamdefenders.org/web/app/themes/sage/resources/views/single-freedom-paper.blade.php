@extends('layouts.app')

@section('header')
<div class="bg-black" style="display: block;">
  @include('partials.header')
</div>
@endsection

@section('content')

  @posts
    <main>
      <div class="page bg-white">
        <div class="fixed post_nav">
          <div class="prev_post">
            @php $prev = get_previous_post() @endphp
            @if(is_a( $prev , 'WP_Post' ))
              <a href="{!! get_permalink( $prev->ID ); !!}">
                {!! get_the_title( $prev->ID ); !!}
              </a>
            @endif
          </div>
          <div class="next_post">
              @php $next = get_next_post() @endphp
              @if(is_a( $next , 'WP_Post' ))
                <a href="{!! get_permalink( $next->ID ); !!}">
                  {!! get_the_title( $next->ID ); !!}
                </a>
              @endif
          </div>
        </div>
        <section>
          <img src="@field('freedompaper__image', 'url')" style="width:100vw;" />
        </section>
      </div>
    </main>
  @endposts

@endsection
