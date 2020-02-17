<div class="container px-2 pt-32 mx-auto md:px-0">
  <div class="inline-block pb-4 md:pb-8">
    <a href="/projects" class="font-bold">
      @solid('caret-left', 'fill-current inline w-2')
      <span class="pt-1 pl-2">Back to Projects</span>
    </a>
  </div>

  <article @php(post_class())>
    @php(the_content())
  </article>
</div>

@isset($projects)
  @if($projects->isNotEmpty())
    <div class="px-4 py-16">
      <h2 class="font-display text-4xl font-hairline font-bold leading-relaxed text-center">
        Explore our other projects
      </h2>

      <div class="flex flex-col md:flex-row flex-wrap">
        @each('components.simple-card', $projects, 'card')
      </div>
    </div>
  @endif
@endisset
