<div class="text-black alert bg-yellow">
  <div class="container py-4">
    <span>
      @if($label)
        @svg('exclamation-circle', 'inline w-4 align-middle pb-1 relative')

        <span class="font-bold uppercase">
          {!! $label !!}:
        </span>
      @endif

      {{ $slot }}

      @if($build)
        <a class="text-gray-700 transition transition-color transition-default hover:text-black" href="https://github.com/pixelcollective/dreamdefenders.org/commit/{!! $build !!}">
          @svg('github', 'inline w-4 align-middle pb-1 relative fill-current')

          Build: {!! $build !!}
        </a>
      @endif
    </span>
  </div>
</div>
