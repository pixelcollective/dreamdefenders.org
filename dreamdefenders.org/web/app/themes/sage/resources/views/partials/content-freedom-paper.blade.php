<div class="hero darken half-it"
     style="background-color: black; @if($paper->image) background-image: url({!! $paper->image !!}); @endif">
  <div style="background-color: rgba(0, 0, 0, 0.8); width: 100%; height: 100%;">
    <article>
      <h2><a href="{{ get_permalink($paper->id) }}">{!! $paper->heading !!}</a></h2>
      <h3>{!! $paper->subheading !!}</h3>
      <p>{!! $paper->excerpt !!}</p>
      <a class="hero__button" style="margin-top: 2rem; display: inline-block;" href="{!! get_permalink($paper->id) !!}">Read</a>
    </article>
  </div>
</div>
