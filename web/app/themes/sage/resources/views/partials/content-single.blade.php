<div class="container px-4 pt-32 pb-32 mx-auto md:px-0">
  <div class="inline-block pb-4 md:pb-8">
    <a href="/blog" class="font-bold">
      @svg('caret-left', 'fill-current inline w-2')

      <span class="pt-1 pl-2">
        Back to Blog
      </span>
    </a>
  </div>

  <article @php(post_class())>
    @php(the_content())
  </article>
</div>
