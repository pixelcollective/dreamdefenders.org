<div class="container md:w-3/5 mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full">
      @if(isset($attr->media) && $attr->media->url)
        <div class="w-full min-w-full pb-4">
          @include('components.image', [
            'image' => $attr->media,
            'classes' => 'w-full min-w-full mx-auto text-center',
          ])
        </div>

        @if(isset($attr->mediaDownload) && $attr->mediaDownload->url)
          <div class="block font-bold uppercase mx-auto text-center w-full mx-auto pb-8 w-4/5 md:w-1/2">
            <a href="{!! $attr->mediaDownload->url !!}" class="mx-auto text-center">
              @include('components.svg.download-this-volume')
            </a>
          </div>
        @endif
      @endif

      @if(isset($content) && $content)
        {!! $content !!}
      @endif
    </div>
  </div>
</div>
