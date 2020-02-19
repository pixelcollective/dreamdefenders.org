<div class="container md:w-3/5 mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full">
      @isset($attr->media)
        <div class="w-full min-w-full pb-4">
          @include('components.image', ['image' => $attr->media, 'classes' => 'w-full min-w-full mx-auto text-center'])
        </div>

        <div class="block font-bold uppercase mx-auto text-center w-full mx-auto pb-8 w-4/5 md:w-1/2">
          <a href="{!! $attr->media->url !!}" class="mx-auto text-center">
            @include('components.svg.download-this-volume')
          </a>
        </div>
      @endisset

      @isset($content)
        @if($content)
          {!! $content !!}
        @endif
      @endisset
    </div>
  </div>
</div>
