<header class="alignfull override my-0 mt-0 mb-12 flex flex-col content-center" style="height: {!! isset($attr->containerSize->height) ? $attr->containerSize->height : 300 !!}px;">
  <div class="h-full w-full flex flex-col flex-wrap content-center banner-bg-image-{!! $attr->media->id !!}">
    @isset($attr->title)
      <div class="p-4 w-full text-center content-center flex flex-wrap" style="height: {!! isset($attr->containerSize->height) ? $attr->containerSize->height : 300 !!}px;">
        <h1 class="text-center font-display text-7xl tracking-wider w-full inline-block uppercase font-bold break-all text-white">
          {!! $attr->title !!}
        </h1>
      </div>
    @endisset
  </div>
</header>

@isset($attr->media->id)
  <style>
    .banner-bg-image-{!! $attr->media->id !!} {
      background-repeat: no-repeat;
      background-image: url({!! $attr->media->sizes['large']['url'] !!});
      background-size: {!! isset($attr->backgroundStyle) && $attr->backgroundStyle == 'cover' ? 'cover' : 'cover' !!};
      background-attachment: {!! isset($attr->backgroundStyle) && $attr->backgroundStyle == 'fixed' ? 'fixed' : '' !!};
      background-position-x: {!! isset($attr->focal->x) ? $attr->focal->x * 100 : '50' !!}%;
      background-position-y: {!! isset($attr->focal->y) ? $attr->focal->y * 100 : '50' !!}%;
    }
  </style>
@endisset
