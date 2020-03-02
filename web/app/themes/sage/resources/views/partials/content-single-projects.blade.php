<div class="container px-2 pt-32 pb-24 mx-auto z-10 relative">
  <div class="inline-block pb-4 md:pb-8">
    <a href="/projects" class="font-bold" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1">
      @svg('arrow-left', 'fill-current inline h-4 relative', ['style' => 'padding-top: -0.4rem;'])
      <span class="pl-0">Back to Projects</span>
    </a>
  </div>

  <article @php(post_class())>
    @php(the_content())
  </article>

  @isset($projects)
    @if($projects->isNotEmpty())
      <div class="alignfull px-4 py-16">
        <h2 class="font-display text-4xl font-hairline font-bold leading-relaxed text-center">
          Explore our other projects
        </h2>

        <div class="flex flex-col md:flex-row flex-wrap">
          @each('components.simple-card', $projects, 'card')
        </div>
      </div>
    @endif
  @endisset
</div>
