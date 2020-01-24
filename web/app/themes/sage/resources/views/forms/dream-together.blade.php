<section class="bg-fixed bg-black-100 background-flowing">
  <div class="px-4 bg-white-800">
    <div class="container">
      <div class="flex flex-col justify-between py-16 mx-auto md:flex-row">
        <div class="w-full px-2 md:w-3/5">
          <h1 class="inline-block pr-8">Can We Dream Together?</h1>
          <p class="inline-block pr-8">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
            Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an
            unknown printer took a galley of type and scrambled it to make a type specimen book.
            It has survived not only five centuries, but also the leap into electronic typesetting,
            remaining essentially unchanged. It was popularised in the 1960s with the release
            of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
            publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div>

        <div class="w-full pr-2 md:w-2/5">
          <div class="w-full h-64 min-h-full md:h-full shadow:md transition-all transition hover:shadow-xl bg-black-900"></div>
        </div>
      </div>
    </div>
  </div>
</section>

@push('styles')
  @style
    .background-flowing {
      background-image: url(@asset('images/background-flowing.jpg'));
      background-size: cover;
      background-position: 40% 20%;
      background-repeat: no-repeat;
    }
  @endstyle
@endpush