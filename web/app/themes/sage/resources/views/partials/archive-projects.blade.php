<div class="flex flex-col md:flex-row flex-wrap">
  @if($projects->isNotEmpty())
    @each('components.card-fancy', $projects, 'card')
  @endif
</div>
