<div class="px-4">
  <div class="px-2">
    @php(the_content())
    {!! wp_link_pages(['echo' => 0, 'before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']) !!}
  </div>
</div>
