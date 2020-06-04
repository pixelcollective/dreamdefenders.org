<div class="container px-4 pt-32 mx-auto">
  <div class="inline-block pb-4 md:pb-8 md:px-16 hover:translate-x--2">
    <a href="/publications" class="font-bold">
      @svg('arrow-left', 'fill-current inline h-4 relative', ['style' => 'padding-top: -0.4rem;'])
      <span class="pl-0">Back to Blog</span>
    </a>
  </div>

  <article @php(post_class()) data-fade>
    <div class="pb-16 md:px-16">
      @php(the_content())
    </div>
  </article>
</div>

@isset($additionalPosts)
  @if($additionalPosts->isNotEmpty())
    <div class="container mx-auto">
      <h2 class="text-4xl font-hairline font-bold leading-relaxed text-center font-display">
        Explore our other publications
      </h2>
    </div>
    <div class="flex flex-col flex-wrap md:flex-row pt-8 px-12 pb-24">
      @each('components.simple-card', $additionalPosts, 'card')
    </div>
  @endif
@endisset