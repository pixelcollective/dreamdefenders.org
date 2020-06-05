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

<x-view-more limit="8">
  Explore our other publications
</x-view-more>
