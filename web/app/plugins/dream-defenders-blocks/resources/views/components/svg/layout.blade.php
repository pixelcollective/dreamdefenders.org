@if(isset($paths) && $paths)
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
    @if(isset($attr) && is_array($attr))
      @foreach($attr as $p => $v)
        {{ "{$p}={$v}" }}
      @endforeach
    @endif
    @if(isset($classes) && is_string($classes))
      class="{!! $classes !!}"
    @endif>

    {!! $paths !!}
  </svg>
@endif
