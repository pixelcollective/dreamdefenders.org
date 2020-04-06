
<nav class="fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden bg-transparent nav transition">
  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center justify-middle">
        <a aria-label="Dream Defenders" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-32 my-4 ml-0 no-underline blend-difference nav-logo hover:no-underline fill-white" href="{!! $app->site->url !!}">
          @svg('logo', 'w-full text-white fill-current blend-difference', ['height' => 64, 'alt' => 'Dream Defenders logo', 'title' => 'The Dream Defenders'])
        </a>
      </div>

      <div class="items-center justify-between hidden text-white align-middle blend-difference md:flex">
        @if($app->accounts->facebook)
          <a id="home" aria-label="Return to the {!! get_bloginfo('site_name') !!} homepage" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 text-white no-underline rounded rounded-full blend-difference hover:relative hover:no-underline hover:bg-white hover:text-black" href="{!! $app->accounts->facebook !!}">
            @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>
        @endif

        @if($app->accounts->twitter)
          <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 text-white no-underline rounded rounded-full  blend-difference hover:relative hover:no-underline hover:bg-white hover:text-black" href="{!! $app->accounts->twitter !!}">
            @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>
        @endif

        @if($app->accounts->instagram)
          <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="justify-center p-3 mx-1 text-white no-underline align-middle rounded rounded-full blend-difference hover:relative hover:no-underline hover:bg-white hover:text-black" href="{!! $app->accounts->instagram !!}" style="overflow-x: hidden;">
            @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
          </a>
        @endif

        @if($app->accounts->email)
          <a aria-label="Compose an email to {!! $app->accounts->email !!}" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 mr-4 text-white no-underline rounded rounded-full blend-difference hover:relative hover:no-underline hover:bg-white hover:text-black" href="{!! $app->accounts->email !!}">
            @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
          </a>
        @endif

        @isset($app->actions[0]->url)
          <button modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded blend-difference" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset

        @isset($app->actions[1]->url)
          <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black text-white uppercase bg-transparent border border-white rounded blend-difference" title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
            <a aria-label="{!! $app->actions[1]->text !!}" href="{!! $app->actions[1]->url !!}">
              {!! $app->actions[1]->text !!}
            </a>
          </button>
        @endisset
      </div>

      <div class="flex items-center justify-end w-32">
        <button nav-toggle toggle-target="nav-overlay" class="px-0 mx-2 text-white focus:shadow-none focus:outline-none nav-toggle blend-difference" title="Open menu" aria-label="Open menu">
          @svg('bars',  'menu-icon menu-icon-open w-full fill-current blend-difference', ['width' => '26', 'height' => '26'])
          @svg('times', 'menu-icon menu-icon-close w-full fill-current blend-difference', ['width' => '0px', 'height' => '0px'])
        </button>
      </div>
    </div>

    <div class="flex flex-col w-full h-0 overflow-hidden nav-overlay">
      <div class="relative flex flex-col content-center w-full h-full overlay-contents">
        @if ($navigation->about)
          <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
            <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
            <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
              About Us
            </span>
          </div>

          <nav class="relative flex flex-col flex-grow-0 mx-auto text-center justify-middle w-96" style="top: -0.75rem">
            @foreach ($navigation->about as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl font-bold text-white uppercase md:text-4xl font-display nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
            @endforeach
          </nav>
        @endif

        @if ($navigation->vision)
          <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
            <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
            <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md nav-heading" style="top: -0.9rem">
              Our Vision
            </span>
          </div>

          <nav class="relative flex flex-col flex-grow-0 mx-auto text-center justify-middle w-96" style="top: -0.75rem">
            @foreach ($navigation->vision as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl font-bold text-white uppercase nav-item md:text-4xl font-display" href="{!! $item->url !!}">{!! $item->label !!}</a>
            @endforeach
          </nav>
        @endif

        @if ($navigation->work)
          <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
            <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
            <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
              Our Work
            </span>
          </div>

          <nav class="relative flex flex-col flex-grow-0 mx-auto text-center justify-middle w-96" style="top: -0.75rem">
            @foreach ($navigation->work as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl font-bold text-white uppercase md:text-4xl font-display nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
            @endforeach
          </nav>
        @endif
      </div>
    </div>
  </div>
</nav>
