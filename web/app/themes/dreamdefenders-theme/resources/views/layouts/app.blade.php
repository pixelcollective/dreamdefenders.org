<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class())>
    @php(wp_body_open())
    <div id="app" class="w-full overflow-x-hidden">
      @php(do_action('get_header'))

      <div class="w-full">
        <div class="object-cover bg-black bg-center bg-top md:bg-fixed" style="background-image: url(@asset('images/banner-background.png'));">
          <div class="bg-black-600">
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
      </div>

      @include('partials.navigation-overlay')

      @php(wp_footer())
  </body>
</html>
