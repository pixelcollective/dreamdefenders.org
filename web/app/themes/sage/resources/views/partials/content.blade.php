<article @php(post_class())>
  <header class="pb-8">
    <h2 class="entry-title text-2xl">
      <a href="{{ get_permalink() }}">
        {!! $title !!}
      </a>
    </h2>

    @include('partials/entry-meta')
  </header>

  <div class="entry-summary">
    @php(the_excerpt())
  </div>
</article>
