<div id="wp-block-sage-section" class="wp-block-sage-section">
  <div class="section section__background">
    <div class="section__container container">
      {!! $block->content !!}
    </div>
  </div>
</div>

@if(isset($block->attributes->mediaURL))
  @push('styles')
    .section__background {
      background-image: url({!! $block->attributes->mediaURL !!});
    }
  @endpush
@endif
