<div class="container px-4 mx-auto wp-blocks-tinypixel-two-column">
  <div class="flex flex-col px-2 md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @if(isset($attr->heading) && is_string($attr->heading))
          <h1 class="inline-block font-sans text-3xl font-bold uppercase break-all">
            {!! $attr->heading !!}
          </h1>
      @endif

      @if(isset($attr->media) && is_object($attr->media))
        <div class="w-full pb-6 md:pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
          @include('components.image', ['image' => $attr->media])
        </div>
      @endisset
    </div>

    <div class="flex-col w-full md:w-1/2">
        @if(isset($content) && is_string($content))
             {!! $content !!}
        @endif
    </div>
  </div>
</div>
