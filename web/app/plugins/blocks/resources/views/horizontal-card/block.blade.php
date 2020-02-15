<div class="container mx-auto px-4 wp-blocks-tinypixel-post-container">
  <div class="px-2">
    <div class="flex flex-col md:flex-row">
      <div class="flex-col w-full md:w-1/2">
        @isset($attr->media)
          @if($attr->media)
            <div class="w-full pb-6 pr-0 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
              <img class="w-full" src="{!! $attr->media->sizes['large']['url'] !!}" />
            </div>
          @endif
        @endisset
      </div>

      <div class="w-full md:w-1/2 content-center flex-wrap flex">
        @isset($content)
          @if($content)
            <div class="w-full">
              {!! $content !!}
            </div>
          @endif
        @endisset
      </div>
    </div>
  </div>
</div>
