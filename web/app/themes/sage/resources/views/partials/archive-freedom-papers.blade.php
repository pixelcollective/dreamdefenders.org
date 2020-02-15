<div>
  <div class="px-4 pb-12">
    {!! $content !!}
  </div>

  <div class="container mx-auto">
    <img src="@asset('images/select-a-volume.jpg')" class="md:px-8 w-3/5 md:max-w-3/5 mx-auto pb-8" />
  </div>

  <div class="flex flex-col md:flex-row flex-wrap">
    @if($papers->isNotEmpty())
      @each('components.card-fancy', $papers, 'card')
    @endif
  </div>
</div>
