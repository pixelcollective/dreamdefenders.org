<article @php post_class() @endphp>
  <header>
    <h1 class="entry-title">@title</h1>
  </header>
  <div class="entry-content">
    @content
  </div>
  <footer>
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </footer>
</article>
