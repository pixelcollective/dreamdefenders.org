<footer class="relative z-10 w-full bg-black max-h-64" style="max-height: 200px;">
  <div class="container flex flex-row justify-center px-4 mx-auto uppercase text-white-800">
    @if ($navigation->footer_left)
    <nav class="flex-row justify-center hidden w-full pt-0 pb-1 text-white md:pt-8 max-h-16 md:flex">
      @foreach ($navigation->footer_left as $item)
      <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
        {!! $item->label !!}
      </a>
      @endforeach
    </nav>
    @endif

    <div class="relative flex flex-col w-full mx-auto">
      <div class="relative w-32 w-full mx-auto text-black">
        @svg('logo-solid', 'text-black stroke-current text-white relative mx-auto w-48 h-48', ['style' => 'top: -5rem;'])
      </div>
    </div>

    @if ($navigation->footer_right)
      <nav class="flex-row justify-center hidden w-full pt-0 text-white md:pt-8 max-h-16 md:flex">
        @foreach ($navigation->footer_right as $item)
          <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
            {!! $item->label !!}
          </a>
        @endforeach
      </nav>
    @endif
  </div>

  <div class="container flex flex-row items-center justify-center pt-4 align-middle md:pt-0 md:px-4" style="position: relative; top: -5rem;">
    @if($app->accounts->facebook)
      <div class="relative z-20 flex flex-col flex-wrap justify-center w-12 h-12 align-middle">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" href="{!! $app->accounts->facebook !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="relative z-20 inline-block w-full p-2 mx-1 text-center text-white stroke-current rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @svg('facebook-square', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->facebook)
      <div class="relative z-20 flex flex-col flex-wrap justify-center w-12 h-12 align-middle">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" href="{!! $app->accounts->twitter !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="relative z-20 inline-block w-full p-2 mx-1 text-center text-white stroke-current rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @svg('twitter', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->instagram)
      <div class="relative z-20 flex flex-col flex-wrap justify-center w-12 h-12 align-middle">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" href="{!! $app->accounts->instagram !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="relative z-20 inline-block w-full p-2 mx-1 text-center text-white stroke-current rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @svg('instagram', 'fill-current')
        </a>
      </div>
    @endif

    @if($app->accounts->email)
      <div class="relative z-20 flex flex-col flex-wrap justify-center w-12 h-12 align-middle">
        <a aria-label="Compose an email to {!! $app->accounts->email !!}" href="{!! $app->accounts->email !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-on-padding= fx-off-translate-y="0px" class="relative z-20 inline-block w-full p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
          @svg('envelope', 'fill-current')
        </a>
      </div>
    @endif
  </div>
</footer>
