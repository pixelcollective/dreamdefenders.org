<div id="app" class="block w-full overflow-hidden">
  @php(do_action('get_header'))

  @include('partials.navigation')

  @hasSection('header')
    @yield('header')
  @endif

  <div class="relative z-0 bg-white">
    @hasSection('content')
      @yield('content')
    @endif

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif

    @php(do_action('get_footer'))

    @include('partials.footer')
    @include('components.overlay')
  </div>
</div>

@stack('styles')
@stack('scripts')
