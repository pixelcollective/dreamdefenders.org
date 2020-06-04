@section('toggle-open')
  <button nav-toggle="open" toggle-target="nav-overlay" class="transition transition-opacity ease-in-out duration-500 inline-flex items-center border-0 text-white px-3 focus:outline-none rounded text-white">
    @svg('bars', 'menu-icon menu-icon-open w-full fill-current blend-exclusion transition transition-opacity duration-500 ease-in-out', ['width' => '32px', 'height' => '32px'])
  </button>
@endsection

@section('toggle-close')
  <button nav-toggle="close" toggle-target="nav-overlay" class="transition transition-opacity ease-in-out duration-500 inline-flex items-center border-0 text-white px-3 focus:outline-none rounded text-white">
    @svg('times', 'menu-icon menu-icon-close text-white w-full fill-current blend-exclusion transition duration-500 ease-in-out', ['width' => '32px', 'height' => '32px'])
  </button>
@endsection

<header class="bg-opacity-75 bg-black-700 blend-hard-light nav transition transition-opacity ease-in-out duration-500 fixed flex md:hidden z-50 w-full overflow-hidden transition">
  <div class="flex flex-wrap flex-row items-center justify-between flex-grow p-2 blend-difference">
    <a href="/" aria-label="Dream Defenders" class="title-font font-medium items-center text-white">
      @svg('logo', 'w-24 text-white p-2 fill-current', [
        'stroke' => 'currentColor',
        'stroke-linecap' => 'round',
        'height' => 64,
        'alt' => 'Dream Defenders logo',
        'title' => 'The Dream Defenders',
      ])
    </a>
  </div>

  @yield('toggle-open')
</header>


<header class="bg-black-800 nav transition transition-opacity ease-in-out duration-500 fixed hidden md:flex z-50 w-full overflow-hidden transition">
  <div class="w-full blend-hard-screent">
    <div class="flex flex-wrap flex-row items-center justify-between flex-grow p-2">
      <a href="/" aria-label="Dream Defenders" hoverfx fx-duration="800"  class="flex title-font font-medium items-center text-white mb-4 md:mb-0">
        @svg('logo', 'w-24 text-white p-2 fill-current blend-hard-light', [
          'stroke' => 'currentColor',
          'stroke-linecap' => 'round',
          'height' => 64,
          'alt' => 'Dream Defenders logo',
          'title' => 'The Dream Defenders',
        ])
      </a>

      <nav class="lower-nav flex-grow md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800"  class="p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://facebook.com/dreamdefenders">
          @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
        </a>

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800"  class="p-2 mx-1 text-white no-underline rounded rounded-full  hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
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
          <button hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-black text-white uppercase bg-transparent border border-white rounded" title="{!! $app->actions[1]->text !!}" aria-label="{!! $app->actions[1]->text !!}">
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
<div class="bg-opacity-25 transition transition-opacity ease-in-out duration-500 fixed nav-overlay flex flex-col h-0 w-full z-40 overflow-hidden fixed top-0 left-0 right-0 bottom-0 bg-black opacity-0">
  <div class="container h-full">
    <div class="mx-auto flex flex-wrap p-5 pt-24 flex-col items-center">
      <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
        <button modal="overlay" hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-black uppercase bg-white border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
          <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
            {!! $app->actions[0]->text !!}
          </a>
        </button>

        <button modal="overlay" hoverfx fx-duration="800"  class="px-6 py-2 mx-2 text-sm text-white uppercase bg-transparent border border-white rounded" title="{!! $app->actions[0]->text !!}" aria-label="{!! $app->actions[0]->text !!}">
          <a aria-label="{!! $app->actions[0]->text !!}" href="{!! $app->actions[0]->url !!}">
            {!! $app->actions[0]->text !!}
          </a>
        </button>
      </div>

      @if ($navigation->about)
        <div class="relative justify-center w-full mt-4 mb-0 text-center align-middle">
          <div class="relative justify-center w-64 h-1 mx-auto mt-4 align-middle bg-white" style="height: 2px;"></div>
          <span class="relative inline px-4 text-sm font-thin text-center text-white bg-black nav-heading md:text-md" style="top: -0.9rem">
            About Us
          </span>
        </div>

        <nav class="relative flex flex-col flex-grow-0 mx-auto text-center justify-middle w-96" style="top: -0.75rem">
          @foreach ($navigation->about as $item)
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase md:text-4xl font-display nav-item" href="{!! $item->url !!}">{!! $item->label !!}</a>
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
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase nav-item md:text-4xl font-display" href="{!! $item->url !!}">{!! $item->label !!}</a>
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
            <a hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="flex-grow-0 text-3xl font-bold text-white uppercase md:text-4xl font-display nav-item text-white" href="{!! $item->url !!}">{!! $item->label !!}</a>
          @endforeach
        </nav>
      @endif
    </div>

    <nav class="flex-grow mx-auto mx-auto flex flex-wrap justify-center flex-wrap items-center text-base justify-center">
      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Facebook" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-2 mx-1 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://facebook.com/dreamdefenders">
        @svg('facebook-square', 'w-full fill-current', ['width' => 28, 'height' => 28])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-2 mx-1 text-white no-underline rounded rounded-full  hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
        @svg('twitter', 'w-full fill-current', ['width' => 28, 'height' => 28])
      </a>

      <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Instagram" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="justify-center p-2 mx-1 text-white no-underline align-middle rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://instagram.com/thedreamdefenders" style="overflow-x: hidden;">
        @svg('instagram', 'w-full fill-current pl-1', ['width' => 32, 'height' => 32])
      </a>

      <a aria-label="Compose an email to info@dreamdefenders.org" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-2 mx-1 mr-4 text-white no-underline rounded rounded-full hover:relative hover:no-underline hover:bg-white hover:text-black" href="mailto:info@dreamdefenders.org">
        @svg('envelope', 'w-full fill-current', ['width' => 28,'height' => 28])
      </a>
    </nav>
  </div>
</div>

{{--

<nav class="fixed z-50 flex flex-col items-center justify-between w-full overflow-hidden bg-transparent nav transition">
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

        <a aria-label="Link to {!! get_bloginfo('site_name') !!} on Twitter" hoverfx fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="p-3 mx-1 text-white no-underline rounded rounded-full  hover:relative hover:no-underline hover:bg-white hover:text-black" href="https://twitter.com/dreamdefenders">
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
