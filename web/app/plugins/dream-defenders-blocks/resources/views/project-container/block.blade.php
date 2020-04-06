<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full p-2 pt-0 mt-0 md:w-1/2 md:p-4 md:pt-0 lg:p-8 lg:pt-0">
      @if(isset($attr->title) && $attr->title)
        <h1 class="inline-block pr-8 font-sans font-bold leading-none uppercase break-words sm:text-xl md:text-2xl lg:text-4xl xl:text-5xl md:pr-6 lg:pr-8 md:pb-8 md:max-w-4/5">
          {!! $attr->title !!}
        </h1>
      @endif

      @if(isset($attr->media) && is_object($attr->media))
        <div class="w-full max-w-full pb-6 pr-0 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
          @include('components.image', ['image' => $attr->media])
        </div>
      @endisset
    </div>

    <div class="flex-col w-full md:w-1/2" style="position: relative; top: -0.45rem;">
      @isset($content)
        @if($content)
          {!! $content !!}
        @endif
      @endisset
    </div>
  </div>
</div>