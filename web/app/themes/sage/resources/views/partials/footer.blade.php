<footer class="w-full pb-3 bg-gray relative z-10">
  <div class="container flex flex-row mx-auto uppercase justify-center px-4 text-white-800">
    @if ($navigation->footer_left)
      <nav class="flex-row w-full justify-center hidden pt-0 pb-8 md:py-8 text-white max-h-16 md:flex">
        @foreach ($navigation->footer_left as $item)
          <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
            {!! $item->label !!}
          </a>
        @endforeach
      </nav>
    @endif

    <div class="w-64 mx-auto">
      <div class="flex items-center w-full">
        <div class="flex items-center justify-center px-4 w-full h-full mx-auto text-black">
          <div class="text-black">
            @svg('logo-solid', 'fill-current text-black stroke-white py-0 px-4 relative', ['style' => 'top: -5rem;'])
          </div>
        </div>
      </div>

      <div class="flex flex-row items-center w-full pt-0 pb-8 justify-center px-4">
        @if($app->accounts->facebook)
          <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" href="{!! $app->accounts->facebook !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @svg('facebook', 'fill-current')
          </a>
        @endif

        @if($app->accounts->facebook)
          <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" href="{!! $app->accounts->twitter !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @svg('twitter', 'fill-current')
          </a>
        @endif

        @if($app->accounts->instagram)
          <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" href="{!! $app->accounts->instagram !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @svg('instagram', 'fill-current', ['style' => 'padding-left: 0.1rem;'])
          </a>
        @endif

        @if($app->accounts->email)
          <a aria-label="Compose an email to {!! $app->accounts->email !!}" href="{!! $app->accounts->email !!}" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="inline-block w-1/3 h-auto p-2 mx-1 text-center text-white rounded-full hover:cursor-pointer transition transition-color transition-bg transition-ease-in-out hover:bg-white hover:text-black">
            @svg('envelope', 'fill-current')
          </a>
        @endif
      </div>
    </div>

    @if ($navigation->footer_right)
      <nav class="flex-row w-full justify-center hidden pt-0 pb-8 md:py-8 text-white max-h-16 md:flex">
        @foreach ($navigation->footer_right as $item)
          <a class="px-6" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1" href="{!! $item->url !!}">
            {!! $item->label !!}
          </a>
        @endforeach
      </nav>
    @endif
  </div>
</footer>
