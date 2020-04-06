<div class="flex flex-col flex-wrap md:flex-row">
  @while(have_posts()) @php(the_post())
      @include('components.card-fancy', ['card' => (object) [
        'id'    => get_the_id(),
        'title' => get_the_title(),
        'image' => get_the_post_thumbnail_url(),
        'url'   => get_the_permalink(),
      ]])
  @endwhile
</div>
