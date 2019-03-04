<div class="hero hero__bg-center darken"
      style="
        background-color: black;
        @if($paper->image) background-image: url({!! $paper->image !!}); @endif
      "
>
  <div style="background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 100%;">
    <article class="hero__content">
        <h2><a href="{{ get_permalink($paper->id) }}">{!! $paper->heading !!}</a></h2>
        <h3>{!! $paper->subheading !!}</h3>
      <div class="entry-summary">
        {!! $paper->excerpt !!}
      </div>
      <a class="hero__button" href="{!! $paper->download['url'] !!}">
          Download
        </a>
    </article>
  </div>
</div>
