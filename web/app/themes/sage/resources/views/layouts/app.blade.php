<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')

<body @php(body_class())>
  @php(wp_body_open())

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

      <x-modal
        title="We keep us safe."
        description="COVID-19 is spreading quickly and infecting people all over our state.<br /><br />Meanwhile thousands of Floridians are out of work struggling to survive during this crisis. Florida needs each of us to join the fight to keep us safe and healthy. We are only as safe as our least safe neighbor."
        buttonText="Get involved"
        buttonHref="/covid-resources/"
      />
    </div>
  </div>

  @php(wp_footer())
  @stack('styles')
  @stack('scripts')
</body>

</html>