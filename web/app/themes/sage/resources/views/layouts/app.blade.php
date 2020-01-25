<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class())>
    @php(wp_body_open())

    <div id="app" class="w-full overflow-hidden">
      @php(do_action('get_header'))

      <div class="bg-gray">
        @include('partials.navigation')
          @hasSection('header')
            @yield('header')
          @endif

          <div class="bg-white">
            @hasSection('content')
              @yield('content')
            @endif

            @hasSection('sidebar')
              <aside class="sidebar">
                @yield('sidebar')
              </aside>
            @endif
          </div>
        </div>

        @php(do_action('get_footer'))
        @include('partials.footer')
      </div>
    </div>

    @include('partials.navigation-overlay')

    @php(wp_footer())

    @stack('styles')
    @stack('scripts')
  </body>
</html>
