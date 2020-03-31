@isset($archivePosts)
  <div class="flex flex-col md:flex-row flex-wrap">
    @if($archivePosts->isNotEmpty())
      @each('components.card-fancy', $archivePosts, 'card')
    @endif
  </div>
@endisset
