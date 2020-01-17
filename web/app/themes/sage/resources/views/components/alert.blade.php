<div class="text-black alert bg-yellow">
  <div class="container py-4">
    {!! $label ? "<span class=\"font-bold uppercase\">{$label}:</span> " : null !!} {{ $slot }}
  </div>
</div>
