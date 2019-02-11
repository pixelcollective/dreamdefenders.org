{{--
  @todo add to controller
  @todo change h1 to h2 @tag a11y
--}}

<section class="cta-containter"
  @if($bg_img)
    style="background-image: url({!! $bg_img !!});">
  @elseif($bg_color)
    style="background-color: {!! $bg_color !!};">
  @else
    style="background-color: rgba(0, 0, 0, 100);">
  @endif

  <div class="cta-overlay"></div>

  <div class="cta-content {!! $alignment !!}">
    @if($heading) <h1 class="cta-headline">{!! $heading !!}</h1> @endif
    @if($subheading) <h3 class="cta-subheading">{!! $subheading !!}</h3> @endif
    @if($text && $link) <a class="cta-button" href="{!! $link !!}">{!! $text !!}</a> @endif
  </div>
</section>