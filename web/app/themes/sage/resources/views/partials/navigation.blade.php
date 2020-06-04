@section('toggle-open')
  <button nav-toggle="open" toggle-target="nav-overlay" class="inline-flex items-center w-12 px-3 text-white transition transition-opacity duration-500 ease-in-out border-0 rounded focus:outline-none">
    @svg('bars', 'menu-icon menu-icon-open w-full fill-current blend-exclusion transition transition-opacity duration-500 ease-in-out', ['width' => '1.5rem', 'height' => '1.5rem'])
  </button>
@endsection

@section('toggle-close')
  <button nav-toggle="close" toggle-target="nav-overlay" class="inline-flex items-center w-12 px-3 text-white transition transition-opacity duration-500 ease-in-out border-0 rounded focus:outline-none">
    @svg('times', 'menu-icon menu-icon-close text-white w-full fill-current blend-exclusion transition duration-500 ease-in-out', ['width' => '1.5rem', 'height' => '1.5rem'])
  </button>
@endsection

<header class="fixed z-50 flex w-full overflow-hidden transition transition-opacity duration-500 ease-in-out bg-opacity-75 bg-black-700 blend-hard-light nav md:hidden">
  <div class="flex flex-row flex-wrap items-center justify-between flex-grow p-2 blend-difference">
    <a href="/" aria-label="Dream Defenders" class="items-center font-medium text-white title-font">
      @svg('logo', 'w-24 text-white p-2 fill-current', [
        'stroke' => 'currentColor',
        'stroke-linecap' => 'round',
        'height' => 64,
        'alt' => 'Dream Defenders logo',
        'title' => 'The Dream Defenders',
      ])
    </a>
    @yield('toggle-open')
  </div>
</header>


<header class="fixed z-50 hidden w-full overflow-hidden transition transition-opacity duration-500 ease-in-out bg-black-800 nav md:flex">
  <div class="w-full blend-hard-screent">
    <div class="flex flex-row flex-wrap items-center justify-between flex-grow p-2">
      <a href="/" aria-label="Dream Defenders" hoverfx fx-duration="800"  class="flex items-center mb-4 font-medium text-white title-font md:mb-0">
        @svg('logo', 'w-24 text-white p-2 fill-current blend-hard-light', [
          'stroke' => 'currentColor',
          'stroke-linecap' => 'round',
          'height' => 64,
          'alt' => 'Dream Defenders logo',
          'title' => 'The Dream Defenders',
        ])
      </a>

      <nav class="z-40 flex flex-wrap items-center justify-center flex-grow text-base lower-nav md:ml-auto md:mr-auto">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800"  class="p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://facebook.com/dreamdefenders">
          @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800"  class="p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
          @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800"  class="justify-center p-2 mx-1 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://instagram.com/thedreamdefenders" style="overflow-x: hidden;">
          @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
        </a>

        <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800"  class="p-2 mx-1 mr-4 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="mailto:info@dreamdefenders.org">
          @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
        </a>

        @isset($app->actions[0]->url)
          <button modal="overlay" hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset

        @isset($app->actions[1]->url)
          <button hoverfx fx-duration="800" class="px-6 py-2 mx-2 text-sm text-black text-white uppercase bg-transparent border border-white rounded" title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
            <a aria-label="{!! $app->actions[1]->text !!}" href="{!! $app->actions[1]->url !!}">
              {!! $app->actions[1]->text !!}
            </a>
          </button>
        @endisset
      </nav>

      @yield('toggle-open')
    </div>
  </div>
</header>

{{-- overlay --}}
<div class="fixed top-0 bottom-0 left-0 right-0 z-40 flex flex-col w-full h-0 overflow-hidden transition transition-opacity duration-500 ease-in-out bg-black bg-opacity-25 opacity-0 nav-overlay">
  <div class="h-full">
    <div class="flex flex-col flex-wrap items-center justify-between px-24 pt-24 mx-auto">
      <div class="relative justify-center w-1/2 mt-4 mb-0 text-center align-middle">
        @isset($app->actions[0]->url)
          <button modal="overlay" hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset

        @isset($app->actions[1]->url)
          <button modal="overlay" hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-white uppercase bg-transparent border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset
      </div>

      @if ($navigation->about)
        <div class="relative justify-center w-full mt-4 mt-8 mb-0 text-center align-middle max-w-1/2">
          <div class="relative justify-center h-1 mx-8 mt-4 align-middle bg-white " style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
            About Us
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->about as $item)
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase md:text-4xl font-display nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
      @endif

      @if ($navigation->vision)
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle max-w-1/2">
          <div class="relative justify-center h-1 mx-8 mt-4 align-middle bg-white " style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
            Our Vision
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->vision as $item)
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase nav-item md:text-4xl font-display" href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
      @endif

      @if ($navigation->work)
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle max-w-1/2">
          <div class="relative justify-center h-1 mx-8 mt-4 align-middle bg-white " style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
            Our Work
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-16 mx-auto text-center justify-middle" style="top: -0.75rem">
          @foreach ($navigation->work as $item)
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase md:text-4xl font-display nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
      @endif
    </div>

    <nav class="flex flex-row items-center justify-center mx-auto mt-8 text-base">
      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="block p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://facebook.com/dreamdefenders">
        @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="block p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
        @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="justify-center block p-2 mx-1 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://instagram.com/thedreamdefenders" style="overflow-x: hidden;">
        @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
      </a>

      <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="block p-2 mx-1 mr-4 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="mailto:info@dreamdefenders.org">
        @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
      </a>
    </nav>
  </div>
</div>

{{--

<nav class="fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden transition bg-transparent nav">
  <div class="container text-black">
    <div class="flex flex-row justify-between w-full">
      <div class="flex items-center justify-middle">
        <a aria-label="Dream Defenders" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="w-32 my-4 ml-0 no-underline nav-logo hover:no-underline fill-white" href="/">
          @svg('logo', 'w-full text-white fill-current', ['height' => 64, 'alt' => 'Dream Defenders logo', 'title' => 'The Dream Defenders'])
        </a>
      </div>

      <div class="items-center justify-between hidden text-white align-middle md:flex">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://facebook.com/dreamdefenders">
          @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
          @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="justify-center p-3 mx-1 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://instagram.com/thedreamdefenders" style="overflow-x: hidden;">
          @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
        </a>

        <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 mr-4 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="mailto:info@dreamdefenders.org">
          @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
        </a>

        @isset($app->actions[0]->url)
          <button modal="overlay" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
            <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
              {!! $app->actions[0]->text !!}
            </a>
          </button>
        @endisset

        @isset($app->actions[1]->url)
          <button hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="px-6 py-2 mx-2 text-sm text-black text-white uppercase bg-transparent border border-white rounded blend-exclusion" title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
            <a aria-label="{!! $app->actions[1]->text !!}" href="{!! $app->actions[1]->url !!}">
              {!! $app->actions[1]->text !!}
            </a>
          </button>
        @endisset
      </div>

      <div class="flex items-center justify-end w-32">
        <button nav-toggle toggle-target="nav-overlay" class="px-0 mx-2 text-white focus:shadow-none focus:outline-none nav-toggle blend-exclusion" title="Open menu" aria-label="Open menu">
          @svg('bars',  'menu-icon menu-icon-open w-full fill-current blend-exclusion', ['width' => '26', 'height' => '26'])
          @svg('times', 'menu-icon menu-icon-close w-full fill-current blend-exclusion', ['width' => '0px', 'height' => '0px'])
        </button>
      </div>
    </div>


  </div>
</nav>

--}}
