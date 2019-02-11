<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>
    @php do_action('get_header') @endphps
    @include('partials.components.spinner')
    @include('partials.header')

    @yield('hero')

    <main>
      @yield('content')
    </main>

    @yield('call-to-action')

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp

  </body>
</html>
