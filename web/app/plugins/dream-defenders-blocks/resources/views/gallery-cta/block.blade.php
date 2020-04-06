@php($ctaHasText = isset($attr->cta->text) && $attr->cta->text)
@php($ctaHasLink = isset($attr->cta->url) && $attr->cta->url)
@php($blockId = uniqid())

<div class="block-id-{!! $blockId !!} alignfull bg-black my-16 ">
  <div class="container flex flex-col p-16 px-4 mx-auto align-bottom md:px-16">
    @if(isset($attr->heading) && $attr->heading)
      <div class="flex w-full content-bottom">
        <h2 class="block text-5xl font-bold leading-none text-left text-white uppercase align-bottom">
          <span class="leading-none">{!! $attr->heading !!}</span>
        </h2>
      </div>
    @endif

    <div class="flex flex-row flex-wrap flex-auto flex-grow">
      @if(isset($attr->media->one) && $attr->media->one['url'])
        <div class="w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
          <div class="relative inline-block w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->one,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->two) && $attr->media->two['url'])
        <div class="w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
          <div class="relative inline-block w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->two,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->three) && $attr->media->three['url'])
        <div class="w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
          <div class="relative inline-block w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->three,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->four) && $attr->media->four['url'])
        <div class="w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
          <div class="relative inline-block w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->four,
              'classes' => 'w-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->five) && $attr->media->five['url'])
        <div class="w-full h-64 overflow-hidden md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3">
          <div class="relative inline-block w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->five,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if($ctaHasText)
        <div class="inline-block w-full h-48 p-2 md:w-1/2 lg:w-1/3">
          <div class="flex flex-wrap content-center justify-center w-full h-full p-2 text-white border border-yellow hover:bg-yellow transition transition-all hover:text-black hover:cursor-pointer">
            <h2 data-faded class="flex flex-wrap justify-center w-full h-full mb-0 text-3xl italic font-bold leading-none text-center">
              @if($ctaHasLink) <a class="flex flex-wrap content-center justify-center w-full h-full align-middle" href="{!! $attr->cta->url !!}"> @endif
                <span class="text-white">
                  {!! $attr->cta->text !!}
                </span>
              @if($ctaHasLink) </a> @endif
            </h2>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
