<section class="bg-fixed background-flowing">
  <div class="px-4 pb-16 bg-white-800">
    <div class="container">
      <div class="flex flex-col justify-between py-16 px-4 mx-auto md:flex-row">
        <div class="w-full px-2 md:w-3/5 pr-8 mb-8">
          <h1 class="inline-block">
            Can We Dream Together?
          </h1>

          <div class="col-count-1 sm:col-count-2 md:col-count-1 lg:col-count-2 xl:col-count-3 col-gap-md">
            <p>
              Lorem Ipsum is simply dummy text of the printing and typesetting industry.
              Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an
              unknown printer took a galley of type and scrambled it to make a type specimen book.
              It has survived not only five centuries, but also the leap into electronic typesetting,
              remaining essentially unchanged. It was popularised in the 1960s with the release
              of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
              publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
          </div>
        </div>

        <div class="w-full pr-2 md:w-2/5">
          <div class="flex flex-wrap content-center w-full h-64 min-h-full md:h-full shadow:md transition-all transition transition-duration-2000 hover:shadow-epic bg-black-900">
            <span class="text-white w-full text-center font-display text-5xl">
              FORM
            </span>
          </div>
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