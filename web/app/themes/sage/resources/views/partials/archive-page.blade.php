@isset($archivePosts)
  <div class="flex flex-col flex-wrap md:flex-row">
    @if($archivePosts->isNotEmpty())
      @each('components.card-fancy', $archivePosts, 'card')
    @endif
  </div>
@endisset
