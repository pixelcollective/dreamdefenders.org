<div class="container px-2 py-48 mx-auto md:px-0">
  <div class="inline-block pb-4 md:pb-8">
    <a href="#" class="font-bold">
      @solid('caret-left', 'fill-current inline w-2') <span class="pt-1 pl-2">Back to Blog</span>
    </a>
  </div>

  <article @php(post_class())>
    @if($content)
      {!! $content !!}
    @endif

    @if($pageNav)
      <footer>
        {!! $pageNav !!}
      </footer>
    @endif
  </article>
</div>
