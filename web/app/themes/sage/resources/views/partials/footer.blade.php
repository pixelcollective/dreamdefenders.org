<footer class="w-full bg-gray relative z-10 max-h-64" style="max-height: 200px;">
  <div class="container flex flex-row mx-auto uppercase justify-center px-4 text-white-800">
    @if ($navigation->footer_left)
    <nav class="flex-row w-full justify-center hidden pt-0 pb-1 md:pt-8 text-white max-h-16 md:flex">
      @foreach ($navigation->footer_left as $item)
      <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
        {!! $item->label !!}
      </a>
      @endforeach
    </nav>
    @endif

    <div class="flex flex-col w-full mx-auto relative">
      <div class="relative w-full text-black w-32 mx-auto">
        @svg('logo-solid', 'fill-current text-black stroke-white relative mx-auto w-48 h-48', ['style' => 'top: -5rem;'])
      </div>
    </div>

    @if ($navigation->footer_right)
      <nav class="flex-row w-full justify-center hidden pt-0 md:pt-8 text-white max-h-16 md:flex">
        @foreach ($navigation->footer_right as $item)
          <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
            {!! $item->label !!}
          </a>
        @endforeach
      </nav>
    @endif
  </div>

  <div class="container flex flex-row items-center pt-4 md:pt-0 justify-center md:px-4 align-middle" style="position: relative; top: -5rem;">
    @if($app->accounts->facebook)
      <div class="flex flex-wrap flex-col justify-center align-middle w-12 h-12 relative z-20">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" href="{!! $app->accounts->facebook !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-full inline-block p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black relative z-20">
          @svg('facebook-square', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->facebook)
      <div class="flex flex-wrap flex-col justify-center align-middle w-12 h-12 relative z-20">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" href="{!! $app->accounts->twitter !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-full inline-block p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black relative z-20">
          @svg('twitter', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->instagram)
      <div class="flex flex-wrap flex-col justify-center align-middle w-12 h-12 relative z-20">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" href="{!! $app->accounts->instagram !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-full inline-block p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black relative z-20">
          @svg('instagram', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->email)
      <div class="flex flex-wrap flex-col justify-center align-middle w-12 h-12 relative z-20">
        <a aria-label="Compose an email to {!! $app->accounts->email !!}" href="{!! $app->accounts->email !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-on-padding= fx-off-translate-y="0px" class="w-full inline-block p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black relative z-20">
          @svg('envelope', 'fill-current')
        </a>
      </div>
    @endif
  </div>
</footer>

@script
  if ("serviceWorker" in navigator) {
    window.addEventListener("load", () => {
      navigator.serviceWorker.register("/app/themes/sage/dist/service-worker.js");
    });
  }
@endscript
