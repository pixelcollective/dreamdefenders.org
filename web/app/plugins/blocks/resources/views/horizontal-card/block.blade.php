<div class="container mx-auto px-4 wp-blocks-tinypixel-post-container">
  <div class="px-2">
    <div class="flex flex-col md:flex-row">
      <div class="w-full md:w-1/2 content-center flex-wrap flex">
        <div class='pb-6 pr-0 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5'>
          @if(isset($attr->media) && is_object($attr->media))
            @include('components.image', ['image' => $attr->media])
          @endif
        </div>
      </div>

      <div class="w-full md:w-1/2 content-center flex-wrap flex">
        @if(isset($content) && $content)
          <div class="w-full">
            {!! $content !!}
          </div>
        @endif
      </div>
    </div>
  </div>
</div>
