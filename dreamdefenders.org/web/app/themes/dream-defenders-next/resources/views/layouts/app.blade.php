<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php(body_class())>
    @php(wp_body_open())
    @php(do_action('get_header'))
    @include('partials.header')

    <main class="main">
      @yield('content')
    </main>

    @include('partials.cards')

    @php(do_action('get_footer'))
      @include('partials.footer')
      @include('util.styles')
      @include('util.scripts')
      @php(wp_footer())

  </body>
</html>
