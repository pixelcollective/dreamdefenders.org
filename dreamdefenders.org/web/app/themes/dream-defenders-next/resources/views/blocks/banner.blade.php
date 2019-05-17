<div class="banner banner__background">
  <div class="banner banner__overlay">
    <div class="banner__container container">
      <div class="banner__content">
        @isset($block->attributes->heading)
          <div class="banner__heading">{!! $block->attributes->heading !!}</div>
        @endisset
        @isset($block->attributes->subheading)
          <div class="banner__subheading">{!! $block->attributes->subheading !!}</div>
        @endisset
      </div>
    </div>
  </div>
</div>

@if(isset($block->attributes->mediaURL))
  @push('styles')
    .banner__background {
      background-image: url({!! $block->attributes->mediaURL !!});
    }
  @endpush
@endif
