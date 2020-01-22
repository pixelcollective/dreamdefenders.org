<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @isset($attr->heading)
        @if($attr->heading)
          <h1 class="inline-block font-sans text-3xl font-bold uppercase break-all">
            {!! $attr->heading !!}
          </h1>
        @endif
      @endisset

      @isset($attr->date)
        @if($attr->date)
          <span class="inline-block w-full mb-4 font-sans uppercase text-md">
            {!! $attr->date !!}
          </span>
        @endif
      @endisset

      @isset($attr->media)
        @if($attr->media)
          <div class="w-full pb-6 pr-0 md:pr-6 md:pb-0">
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
