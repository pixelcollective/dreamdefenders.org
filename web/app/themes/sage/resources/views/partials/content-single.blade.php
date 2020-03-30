<div class="container px-4 pt-32 mx-auto">
  <div class="inline-block pb-4 md:pb-8">
    <a href="/publications" class="font-bold" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1">
      @svg('arrow-left', 'fill-current inline h-4 relative', ['style' => 'padding-top: -0.4rem;'])
      <span class="pl-0">Back to Blog</span>
    </a>
  </div>

  <article @php(post_class())>
    <div class="pb-16">
      @php(the_content())
    </div>
  </article>

  @isset($additionalPosts)
    @if($additionalPosts->isNotEmpty())
      <div class="container pb-32 mx-auto">
        <h2 class="font-display text-4xl font-hairline font-bold leading-relaxed text-center">
          Explore our other publications
        </h2>

        <div class="flex flex-col md:flex-row flex-wrap">
          @each('components.simple-card', $additionalPosts, 'card')
        </div>
      </div>
    @endif
  @endisset
</div>