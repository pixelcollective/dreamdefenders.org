<div class="container mx-auto wp-blocks-tinypixel-post-container">
  <div class="flex flex-col md:flex-row">
    <div class="flex-col w-full md:w-1/2">
      @if(isset($attr->title) && $attr->title)
        <h1 class="inline-block font-sans text-4xl font-bold uppercase pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
          {!! $attr->title !!}
        </h1>
      @endif

      @if(isset($attr->media) && is_object($attr->media))
        <div class="w-full pb-6 pr-8 md:pr-6 lg:pr-8 md:pb-0 md:max-w-4/5">
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