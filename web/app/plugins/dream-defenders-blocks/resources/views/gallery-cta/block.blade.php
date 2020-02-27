@php($ctaHasText = isset($attr->cta->text) && $attr->cta->text)
@php($ctaHasLink = isset($attr->cta->url) && $attr->cta->url)
@php($blockId = uniqid())

<div class="block-id-{!! $blockId !!} alignfull bg-black my-16 ">
  <div class="container mx-auto px-4 md:px-16 p-16 flex align-bottom flex-col">
    @if(isset($attr->heading) && $attr->heading)
      <div class="w-full content-bottom flex">
        <h2 class="text-5xl font-bold text-left text-white uppercase leading-none align-bottom block">
          <span class="leading-none">{!! $attr->heading !!}</span>
        </h2>
      </div>
    @endif

    <div class="flex flex-row flex-wrap flex-auto flex-grow">
      @if(isset($attr->media->one) && $attr->media->one['url'])
        <div class="overflow-hidden h-64 md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3 w-full">
          <div class="inline-block relative w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->one,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->two) && $attr->media->two['url'])
        <div class="overflow-hidden h-64 md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3 w-full">
          <div class="inline-block relative w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->two,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->three) && $attr->media->three['url'])
        <div class="overflow-hidden h-64 md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3 w-full">
          <div class="inline-block relative w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->three,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->four) && $attr->media->four['url'])
        <div class="overflow-hidden h-64 md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3 w-full">
          <div class="inline-block relative w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->four,
              'classes' => 'w-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if(isset($attr->media->five) && $attr->media->five['url'])
        <div class="overflow-hidden h-64 md:max-h-48 md:h-48 md:w-1/2 lg:w-1/3 w-full">
          <div class="inline-block relative w-full h-full overflow-hidden">
            @include('components.image', [
              'image' => (object) $attr->media->five,
              'classes' => 'w-full h-full absolute top-0 left-0 right-0 bottom-0 p-2',
            ])
          </div>
        </div>
      @endif

      @if($ctaHasText)
        <div class="inline-block w-full md:w-1/2 lg:w-1/3 p-2 h-48">
          <div class="flex flex-wrap w-full h-full justify-center content-center border border-yellow p-2 hover:bg-yellow transition transition-all text-white hover:text-black hover:cursor-pointer">
            <h2 data-faded class="flex justify-center text-3xl italic font-bold text-center leading-none mb-0 h-full w-full flex-wrap">
              @if($ctaHasLink) <a class="flex justify-center content-center align-middle w-full h-full flex-wrap" href="{!! $attr->cta->url !!}"> @endif
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
