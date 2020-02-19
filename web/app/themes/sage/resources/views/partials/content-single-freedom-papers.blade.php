<div class="bg-gradient-b-white-yellow fixed w-full z-0" style="height: 150vh;"></div>
<div class="container px-2 pt-32 pb-24 mx-auto md:px-0 z-10 relative">
  <div class="container md:w-3/5 mx-auto">
    <div class="inline-block pb-4 md:pb-8">
      <a href="/freedom-papers" class="font-bold">
        @svg('caret-left', 'fill-current inline w-2')
        <span class="pt-1 pl-2">Back to Freedom Papers</span>
      </a>
    </div>
  </div>

  <article @php(post_class())>
    @php(the_content())
  </article>

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
</div>
