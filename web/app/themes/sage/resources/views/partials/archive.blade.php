<div class="alignfull flex flex-col md:flex-row flex-wrap px-4 mt-0 mx-auto" style="max-width: 1600px; margin-top: 0;">
  @while(have_posts()) @php(the_post())
    @include('components.card-fancy', ['card' => (object) [
      'id'    => get_the_id(),
      'title' => get_the_title(),
      'image' => get_the_post_thumbnail_url(),
      'url'   => get_the_permalink(),
    ]])
  @endwhile
</div>
