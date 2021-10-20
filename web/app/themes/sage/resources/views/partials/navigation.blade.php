@section('toggle-open')
<button nav-toggle="open" toggle-target="nav-overlay"
  class="w-full inline-flex items-center justify-end pr-0 justify-end text-white transition transition-opacity duration-500 ease-in-out border-0 rounded focus:outline-none">
  @svg('bars', 'menu-icon menu-icon-open w-12 justify-end fill-current blend-exclusion transition transition-opacity
  duration-500 ease-in-out stroke-white text-white', ['width' => '1.5rem', 'height' => '1.5rem'])
</button>
@endsection

@section('toggle-close')
<button nav-toggle="close" toggle-target="nav-overlay"
  class="inline-flex items-center w-12 px-3 text-white transition transition-opacity duration-500 ease-in-out border-0 rounded focus:outline-none">
  @svg('times', 'menu-icon menu-icon-close text-white w-full fill-current blend-exclusion transition duration-500
  ease-in-out', [
  'width' => '1.5rem',
  'height' => '1.5rem',
  ])
</button>
@endsection

<header
  class="fixed z-40 flex w-full overflow-hidden transition transition-opacity duration-500 ease-in-out bg-opacity-75 bg-black nav">
  <div class="flex flex-row items-center justify-between w-full p-2 blend-difference">
    <a href="/" aria-label="Dream Defenders" class="w-full items-center font-medium text-white title-font">
      @svg('logo', 'w-24 text-white p-2 fill-current stroke-none', [
      'height' => 64,
      'alt' => 'Dream Defenders logo',
      'title' => 'The Dream Defenders',
      ])
    </a>

    <nav class="hidden items-center justify-between text-base lower-nav sm:flex flex-row">
      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800" fx-on-scale="1.1"
        fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
        class="justify-center w-full p-2 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
        href="https://facebook.com/dreamdefenders">
        @svg('facebook-square', 'mx-auto text-center fill-current', ['width' => 32, 'height' => 32])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1"
        fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
        class="justify-center w-full p-2 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
        href="https://twitter.com/dreamdefenders">
        @svg('twitter', 'mx-auto text-center fill-current', ['width' => 32, 'height' => 32])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800" fx-on-scale="1.1"
        fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
        class="justify-center w-full p-2 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
        href="https://instagram.com/thedreamdefenders">
        @svg('instagram', 'mx-auto text-center fill-current', ['width' => 32, 'height' => 32])
      </a>

      <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800" fx-on-scale="1.1"
        fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
        class="p-2 text-white w-full no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
        href="mailto:info@dreamdefenders.org">
        @svg('envelope', 'mx-auto text-center fill-current', ['width' => 32, 'height' => 32])
      </a>

      <div class="flex flex-row justify-evenly align-middle items-center w-full mx-0">
        @isset($app->actions[0]->url)
        <a modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
          fx-off-translate-y="0px"
          class="flex mx-2 truncate justify-center w-full px-6 py-2 text-sm text-black uppercase bg-white border border-white rounded"
          href="{!! $app->actions[0]->url !!}" title="{!! $app->actions[0]->text !!}"
          aria-label="{!! $app->actions[0]->text !!}">
          {!! $app->actions[0]->text !!}
        </a>
        @endisset

        @isset($app->actions[1]->url)
        <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
          fx-off-translate-y="0px"
          class="flex mx-2 truncate w-full flex justify-center px-6 py-2 w-full text-sm text-black text-white uppercase bg-transparent border border-white rounded"
          href="{!! $app->actions[1]->url !!}" title="{!! $app->actions[1]->text !!}"
          aria-label="{!! $app->actions[1]->text !!}">
          {!! $app->actions[1]->text !!}
        </a>
        @endisset
      </div>
    </nav>

    @yield('toggle-open')
  </div>
</header>

<div
  class="fixed top-0 bottom-0 left-0 right-0 z-40 flex flex-col h-screen w-full h-0 overflow-hidden transition transition-opacity duration-500 ease-in-out bg-black opacity-0 nav-overlay bg-black">
  <div class="overflow-y-auto">
    <div
      class="flex flex-col flex-wrap items-center justify-between px-8 py-16 md:px-24 md:py-24 lg:px-24 lg:pt-24 mx-auto">
      <div class="flex flex-row relative justify-center md:w-1/2 mt-4 mb-0 text-center align-middle">
        @isset($app->actions[0]->url)
        <button modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
          fx-off-translate-y="0px"
          class="relative z-50 px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded"
          title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
          <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
            {!! $app->actions[0]->text !!}
          </a>
        </button>
        @endisset

        @isset($app->actions[1]->url)
        <button modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
          fx-off-translate-y="0px"
          class="relative z-50 px-6 py-2 mx-2 text-sm text-white uppercase bg-transparent border border-white rounded"
          title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
          <a aria-label="{!! $app->actions[1]->text !!}" href="{!! $app->actions[1]->url !!}">
            {!! $app->actions[1]->text !!}
          </a>
        </button>
        @endisset
      </div>

      <div class="h-full p-2 md:p-8 mx-auto w-3/4 sm:3/4 md:w-1/2 lg:w-1/3">
        @if ($navigation->about)
        <div class="relative justify-center w-full mt-4 mt-8 mb-0 text-center align-middle">
          <div class="relative justify-center h-1 mx-1 mt-4 align-middle bg-white " style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md"
            style="top: -0.9rem">
            About Us
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->about as $item)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
            fx-off-translate-y="0px"
            class="flex-grow-0 text-xl lg:text-3xl font-bold text-white uppercase md:text-2xl font-display nav-item"
            href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
        @endif

        @if ($navigation->vision)
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center h-1 mx-1 mt-4 align-middle bg-white " style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md"
            style="top: -0.9rem">
            Our Vision
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->vision as $item)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
            fx-off-translate-y="0px"
            class="flex-grow-0 text-xl lg:text-3xl font-bold text-white uppercase md:text-2xl font-display nav-item"
            href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
        @endif

        @if ($navigation->work)
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center h-1 mx-1 mt-4 align-middle bg-white" style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md"
            style="top: -0.9rem">
            Our Work
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->work as $item)
          <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px"
            fx-off-translate-y="0px"
            class="flex-grow-0 text-xl lg:text-3xl font-bold text-white uppercase md:text-2xl font-display nav-item"
            href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
        @endif
      </div>

      <nav class="flex flex-row items-center mx-auto w-4/5 sm:3/4 md:w-1/2 lg:w-1/3 justify-center mx-auto text-base">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800"
          fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
          class="block p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
          href="https://facebook.com/dreamdefenders">
          @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1"
          fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
          class="block p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
          href="https://twitter.com/dreamdefenders">
          @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800"
          fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
          class="justify-center block p-2 mx-1 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
          href="https://instagram.com/thedreamdefenders" style="overflow-x: hidden;">
          @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
        </a>

        <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800" fx-on-scale="1.1"
          fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px"
          class="block p-2 mx-1 mr-4 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black"
          href="mailto:info@dreamdefenders.org">
          @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
        </a>
      </nav>
    </div>
  </div>
</div>
