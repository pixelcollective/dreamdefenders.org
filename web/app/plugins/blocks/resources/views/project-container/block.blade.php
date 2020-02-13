<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @isset($attr->title)
        @if($attr->title)
          <h1 class="inline-block font-sans text-3xl font-bold uppercase break-all">
            {!! $attr->title !!}
          </h1>
        @endif
      @endisset

      @isset($attr->media)
        @if($attr->media)
          <div class="w-full pb-6 pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
            <img src="{!! $attr->media->sizes['large']['url'] !!}" />
          </div>
        @endif
      @endisset
    </div>

    <div class="flex-col w-full md:w-1/2">
      @isset($content)
        @if($content)
          {!! $content !!}
        @endif
      @endisset
    </div>
  </div>
</div>
