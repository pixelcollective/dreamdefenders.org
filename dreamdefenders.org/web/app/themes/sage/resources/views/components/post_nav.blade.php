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