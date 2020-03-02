@php($blockId = uniqid())

<section class="block-{!! $blockId !!} bg-fixed bg-cover bg-no-repeat background-flowing alignfull mt-16 mb-0">
  <div class="px-4 pb-16 pb-24 bg-white-800">
    <div class="container">
      <div class="flex flex-col justify-between py-16 px-4 mx-auto md:flex-row">
        <div class="w-full px-2 md:w-3/5 pr-8 mb-8">
          @if(isset($attr->heading) && $attr->heading)
            <h1 class="inline-block leading-none text-5xl md:text-6xl">
              {!! $attr->heading !!}
            </h1>
          @endif

          @if(isset($attr->text) && $attr->text)
            <div class="col-count-1 sm:col-count-2 md:col-count-1 lg:col-count-2 xl:col-count-3 col-gap-md">
              {!! $attr->text !!}
            </div>
          @endif
        </div>

        <div class="w-full pr-2 md:w-2/5">
          @if(isset($content) && $content)
            <div class="flex flex-wrap content-center w-full h-64 min-h-full md:h-full shadow:md transition-all transition transition-duration-2000 hover:shadow-epic bg-black-900">
              <div class="embed-container text-white flex flex-wrap content-center w-full text-center font-display text-5xl max-w-full object-fit">
                {!! $content !!}
              </div>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .block-{!! $blockId !!} {
    margin-bottom: 0em !important;
  }

  .background-flowing {
    background-image: url('/app/themes/sage/dist/images/background-flowing.jpg');
    background-position: 40% 20%;
  }

  .embed-container iframe {
    object-fit: contain;
    max-width: 100%;
  }
</style>
