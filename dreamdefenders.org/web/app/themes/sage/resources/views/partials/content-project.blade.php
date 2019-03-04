<div
  style="
    background-color: black;
    @if(get_the_post_thumbnail_url(get_the_id(), 'full')) background-image: url({!! get_the_post_thumbnail_url(get_the_id(), 'full') !!});
    @else background-image: url(/app/uploads/2018/09/42682965051_106ec31632_k-768x512.jpg);
    @endif
  "
>
  <div style="background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 100%;">
    <article @php post_class() @endphp>
      <header>
        <h2 class="entry-title"><a href="{{ get_permalink() }}">{!! get_the_title() !!}</a></h2>
      </header>
      <div class="entry-summary">
        @excerpt
      </div>
    </article>
  </div>
</div>
