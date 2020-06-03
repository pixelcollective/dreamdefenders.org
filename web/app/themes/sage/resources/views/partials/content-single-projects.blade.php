<div class="container px-4 pt-32 mx-auto">
  <div class="inline-block pb-4 md:pb-8">
    <a href="/projects" class="font-bold" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1">
      @svg('arrow-left', 'fill-current inline h-4 relative', ['style' => 'padding-top: -0.4rem;'])
      <span class="pl-0">Back to Projects</span>
    </a>
  </div>

  <article @php(post_class())>
    @php(the_content())
  </article>

  @isset($additionalPosts)
    @if($additionalPosts->isNotEmpty())
      <div class="container pb-32 mx-auto">
        <h2 class="text-4xl font-hairline font-bold leading-relaxed text-center font-display">
          Explore our other projects
        </h2>

        <div class="flex flex-col flex-wrap md:flex-row">
          @each('components.simple-card', $additionalPosts, 'card')
        </div>
      </div>
    @endif
  @endisset
</div>
