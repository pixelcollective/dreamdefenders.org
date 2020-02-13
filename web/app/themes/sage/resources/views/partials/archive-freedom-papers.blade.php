<div class="flex flex-col md:flex-row flex-wrap">
  @if($papers->isNotEmpty())
    @each('components.card-fancy', $papers, 'card')
  @endif
</div>
