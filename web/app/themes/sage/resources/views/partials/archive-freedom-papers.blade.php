<div>
  <div class="px-4 pb-12">
    {!! $content !!}
  </div>

  <div class="container mx-auto">
    <img
      src="@asset('images/select-a-volume.jpg')"
      class="sm:px-4 md:px-24 lg:px-32 w-3/5 md:max-w-3/5 mx-auto pb-8"
      alt="Select a Volume"
      title="Select a Volume" />
  </div>

  @isset($papers)
    <div class="alignfull flex flex-col md:flex-row flex-wrap px-4 mt-0 mx-auto" style="max-width: 1600px; margin-top: 0;">
      @if($papers->isNotEmpty())
        @each('components.card-plain', $papers, 'card')
      @endif
    </div>
  @endisset
</div>
