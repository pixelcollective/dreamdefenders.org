<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')

  <body @php(body_class())>
    @php(wp_body_open())
    <div id="app">
      @php(do_action('get_header'))

      @hasSection('header')
        @yield('header')
      @endif

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
    </div>

    @php(wp_footer())
  </body>
</html>
