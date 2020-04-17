<article @php(post_class("pt-12 pb-12 px-2"))>
  <header>
    <h2 class="mb-4 entry-title">
      <a href="{{ get_permalink() }}">
        {!! get_the_title() !!}
      </a>
    </h2>

    @includeWhen(get_post_type() == 'post' && get_the_excerpt(), 'partials/entry-meta')
  </header>

  <div class="flex flex-col w-full md:flex-row">
    @if($image = get_the_post_thumbnail_url())
      <div class="w-full mb-4 entry-media md:pr-4 md:w-1/2">
        <img src="{!! $image !!}" />
      </div>
    @endif

    <div class="entry-summary text-lg content w-full {!! get_the_post_thumbnail_url() ? "md:w-1/2" : null !!}">
      <div class="w-full mb-12">
        {!! get_the_excerpt() !!}
      </div>

      @button(['url' => get_the_permalink()])
        See more
      @endbutton
    </div>
  </div>
</article>
