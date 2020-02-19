
<nav class="bg-transparent nav fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden transition">
  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center justify-middle">
        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-32 my-4 ml-0 no-underline blend-difference nav-logo hover:no-underline" href="{!! $app->site->url !!}" title="Dream Defenders">
          @svg('logo', 'w-full fill-current blend-difference', ['height' => 64])
        </a>
      </div>

      <div class="items-center justify-between text-white align-middle blend-difference hidden md:flex">
        @if($app->accounts->facebook)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="py-3 mx-1 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="{!! $app->accounts->facebook !!}" title="Dream Defenders">
            @svg('facebook-f', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>
        @endif

        @if($app->accounts->twitter)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="py-3 mx-1  text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="{!! $app->accounts->twitter !!}" title="Dream Defenders">
            @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
          </a>
        @endif

        @if($app->accounts->instagram)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="py-3 mx-1 align-middle justify-center text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="{!! $app->accounts->instagram !!}" title="Dream Defenders" style="overflow-x: hidden;">
            @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
          </a>
        @endif

        @if($app->accounts->email)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="mr-2 py-3 mx-1 text-white no-underline blend-difference hover:relative hover:no-underline hover:bg-white rounded rounded-full hover:text-black" href="{!! $app->accounts->email !!}" title="Dream Defenders">
            @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
          </a>
        @endif

        @isset($app->actions[0]->url)
          <button modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded blend-difference" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset

        @isset($app->actions[1]->url)
          <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black uppercase bg-transparent text-white border border-white rounded blend-difference" title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
            <a href="{!! $app->actions[1]->url !!}">
              {!! $app->actions[1]->text !!}
            </a>
          </button>
        @endisset
      </div>

      <div class="w-32 flex items-center justify-end">
        <button nav-toggle toggle-target="nav-overlay" class="focus:shadow-none focus:outline-none text-white mx-2 px-0 nav-toggle blend-difference" title="Open menu" aria-label="Open menu">
          @svg('bars',  'menu-icon menu-icon-open w-full fill-current blend-difference', ['width' => '26', 'height' => '26'])
          @svg('times', 'menu-icon menu-icon-close w-full fill-current blend-difference', ['width' => '0px', 'height' => '0px'])
        </button>
      </div>
    </div>

    <div class="nav-overlay h-0 w-full flex flex-col overflow-hidden">
      <div class="overlay-contents h-full flex-col relative w-full flex content-center">
        @if ($navigation->about)
          <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
            <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
            <span class="nav-heading relative inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
              About Us
            </span>
          </div>

          <nav class="relative flex flex-col text-center justify-middle flex-grow-0 w-96 mx-auto" style="top: -0.75rem">
            @foreach ($navigation->about as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display font-bold nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
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

          <nav class="relative flex flex-col text-center justify-middle flex-grow-0 w-96 mx-auto" style="top: -0.75rem">
            @foreach ($navigation->vision as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="nav-item flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display font-bold" href="{!! $item->url !!}">{!! $item->label !!}</a>
            @endforeach
          </nav>
        @endif

        @if ($navigation->work)
          <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
            <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
            <span class="relative nav-heading inline px-4 text-sm font-thin text-center text-white bg-black md:text-md" style="top: -0.9rem">
              Our Work
            </span>
          </div>

          <nav class="relative flex flex-col text-center justify-middle flex-grow-0 w-96 mx-auto" style="top: -0.75rem">
            @foreach ($navigation->work as $item)
              <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-2xl text-white uppercase md:text-4xl font-display font-bold nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
            @endforeach
          </nav>
        @endif
      </div>
    </div>
  </div>
</nav>
