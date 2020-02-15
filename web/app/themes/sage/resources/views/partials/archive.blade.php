<div class="container px-4 mx-auto">
  @while(have_posts()) @php(the_post())
    <div class="flex flex-col w-4/5 flex-2">
      @include('partials.content')
    </div>
  @endwhile
</div>