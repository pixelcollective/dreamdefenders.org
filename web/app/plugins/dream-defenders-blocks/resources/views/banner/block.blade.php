@php($blockId = uniqid())
<div class="block-id-{!! $blockId !!} alignfull" style="padding-top: 0; margin-top: 0;">
  <header class="flex flex-col content-center w-full my-0 mt-0 mb-12 wp-block-tinypixel-banner">
    <div class="relative top-0 bottom-0 left-0 right-0 w-full overflow-hidden">
      <div class="absolute flex flex-col flex-wrap content-center w-full h-full banner-bg-image"></div>

      <div class="relative z-10 w-full h-full banner-bg-overlay">
        @isset($attr->title)
          <div class="relative flex flex-wrap content-center w-full p-4 text-center"
            style="height: {!! isset($attr->containerSize->height) ? $attr->containerSize->height . 'px;' : '500px;' !!}">
            <div class="flex flex-col flex-wrap justify-around w-full lg:flex-row">
              <h1 class="inline-block w-full text-5xl font-bold leading-none tracking-wider text-center text-white uppercase break-words is-style-epic font-display md:text-6xl lg:text-7xl">
                {!! $attr->title !!}
              </h1>
            </div>
          </div>
        @endisset
      </div>

    </div>
  </header>
</div>

@isset($attr->background->media['id'])
  <style>
    .block-id-{!! $blockId !!} .banner-bg-image {
      background-repeat: no-repeat;
      background-image: url({!! $attr->background->media['url'] !!});
      background-position-x: {!! isset($attr->background->position['x']) && $attr->background->position['x'] ? $attr->background->position['x'] * 100 : '50' !!}%;
      background-position-y: {!! isset($attr->background->position['y']) && $attr->background->position['y'] ? $attr->background->position['y'] * 100 : '50' !!}%;
      @if(isset($attr->background->scale) && $attr->background->scale)
        transform: scale({!! $attr->background->scale * .01 !!});
      @endif

      @if(isset($attr->background->attachment) && $attr->background->attachment == 'fixed')
        background-attachment: fixed;
      @endif
    }

    @php($overlaySet = isset($attr->overlay) && isset($attr->overlay->rendered))

    .block-id-{!! $blockId !!} .banner-bg-overlay {
      background-color: {!! $overlaySet ? $attr->overlay->rendered : 'rgba(0, 0, 0, 0.8)' !!};
    }
  </style>
@endisset
