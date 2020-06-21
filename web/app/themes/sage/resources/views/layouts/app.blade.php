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
        title="Defund Police and Rebuild our Communities"
        description="
          There’s a shift happening right now. The call to defund police is louder than we’ve ever heard it.
          We can all answer that call and reshape what our communities look like. We made a toolkit to help you map what you can do in your cities."
        buttonText="Download Toolkit"
        buttonHref="https://drive.google.com/file/d/1UFNn-2ZZsCKlwzZmj5MIDa_LqSbcdc9w"
        cookie="defund-police-modal"
      />
    </div>
  </div>

  @php(wp_footer())

  @stack('styles')
  @stack('scripts')
</body>

</html>