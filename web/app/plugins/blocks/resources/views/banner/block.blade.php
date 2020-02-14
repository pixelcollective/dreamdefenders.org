<div class="block-id-{!! $id = uniqid() !!} alignfull override">
  <header class="wp-block-tinypixel-banner override w-full my-0 mt-0 mb-12 flex flex-col content-center">
    <div class="relative top-0 left-0 right-0 bottom-0 overflow-hidden w-full" style="height: {!! isset($attr->containerSize->height) ? $attr->containerSize->height : 300 !!}px;">
      <div class="absolute h-full w-full flex flex-col flex-wrap content-center banner-bg-image-{!! $id !!}"></div>

      <div class="relative z-10 banner-bg-overlay-{!! $id !!} h-full w-full">
        @isset($attr->title)
          <div class="p-4 w-full text-center content-center flex flex-wrap relative" style="height: @isset($attr->containerSize->height) {!! $attr->containerSize->height . 'px;' !!} @else 300px; @endisset">
            <div class="w-full lg:flex-row flex-col flex flex-wrap justify-around">
              <div class="">
                <h1 class="text-center font-display text-7xl tracking-wider w-full inline-block uppercase font-bold break-all text-white">
                  {!! $attr->title !!}
                </h1>
              </div>
            </div>
          </div>
        @endisset
      </div>
    </div>
  </header>
</div>

@isset($attr->background->media['id'])
  <style>
    .banner-bg-image-{!! $id !!} {
      background-repeat: no-repeat;
      background-image: url({!! $attr->background->media['sizes']['large']['url'] !!});
      background-size: {!! isset($attr->background->size) && $attr->background->size == 'cover' ? 'cover' : 'cover' !!};
      background-attachment: {!! isset($attr->background->attachment) && $attr->background->attachment == 'fixed' ? 'fixed' : '' !!};
      background-position-x: {!! isset($attr->background->position['x']) ? $attr->background->position['x'] * 100 : '50' !!}%;
      background-position-y: {!! isset($attr->background->position['y']) ? $attr->background->position['y'] * 100 : '50' !!}%;
      @isset($attr->background->scale) transform: scale({!! $attr->background->scale * .01 !!}); @endisset
    }

    .banner-bg-overlay-{!! $id !!} {
      background-color: {!!
        $attr->overlay->rendered && $attr->overlay->raw && $attr->overlay->opacity
          ? $attr->overlay->rendered
          : 'rgba(0, 0, 0, 0.4)'
      !!};
    }
  </style>
@endisset
