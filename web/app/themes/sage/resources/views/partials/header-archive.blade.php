<div class="container px-4 pt-32 mx-auto">
  @if($title = get_the_archive_title())
    <div class="inline-block pb-4 md:pb-8">
      <h1 class="font-sans text-black text-5xl font-hairline font-bold leading-relaxed">
        {!! $title !!}
      </h1>
    </div>
  @endif
</div>
