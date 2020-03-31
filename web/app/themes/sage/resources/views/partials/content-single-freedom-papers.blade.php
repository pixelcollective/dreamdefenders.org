<div class="bg-gradient-b-white-yellow fixed w-full z-0" style="height: 150vh;"></div>
  <div class="container px-2 pt-32 pb-32 mx-auto z-10 relative">
    <div class="inline-block pb-4 md:pb-8">
      <a href="/freedom-papers" class="font-bold" hoverfx elasticity="0" fx-duration="800" fx-on-scale="1.2" fx-off-scale="1">
        @svg('arrow-left', 'fill-current inline h-4 relative', ['style' => 'padding-top: -0.4rem;'])
        <span class="pl-0">Back to Freedom Papers</span>
      </a>
    </div>

    <article @php(post_class())>
      @php(the_content())
    </article>

    <div class="block">
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
  </div>
</div>
