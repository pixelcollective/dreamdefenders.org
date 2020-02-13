<div class="container px-2 py-48 mx-auto md:px-0">
  <article @php(post_class())>
    <div class="inline-block pb-4 md:pb-8">
      <a href="/freedom-papers" class="font-bold">
        @solid('caret-left', 'fill-current inline w-2')
        <span class="pt-1 pl-2">Back to Freedom Papers</span>
      </a>
    </div>

    @if($content)
      {!! $content !!}
    @endif

    <div class="post-nav">
      @if($previous = get_previous_post())
        <div class="fixed top-0 left-0 p-4" style="top: 50%;">
          <a href="{!! $previous->post_name !!}" class="p-4">
            @svg('arrow-left')
          </a>
        </div>
      @endif

      @if($next = get_next_post())
        <div class="fixed top-0 right-0 p-4" style="top: 50%;">
          <a href="{!! $next->post_name !!}" class="p-4">
            @svg('arrow-right')
          </a>
        </div>
      @endif
    </div>
  </article>
</div>

@if($papers->isNotEmpty())
  <div class="px-4 py-16">
    <h2 class="font-display text-4xl font-hairline font-bold leading-relaxed text-center">
      Select a volume below
    </h2>

    <div class="flex flex-col md:flex-row flex-wrap">
      @each('components.simple-card', $papers, 'card')
    </div>
  </div>
@endif
