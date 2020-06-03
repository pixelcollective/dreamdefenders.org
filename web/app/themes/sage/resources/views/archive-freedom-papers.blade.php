@extends("layouts.app")

@section("content")
  <header class="px-4 pt-32 mx-auto md:px-0">
    <img src="@asset('images/freedom-papers.jpg')" />
  </header>

  <main class='container px-4 pb-32 mx-auto'>
    <div class="px-4 pb-12">
      @php(the_content(877))
    </div>

    @include("partials.archive-freedom-papers")
  </main>
@endsection
