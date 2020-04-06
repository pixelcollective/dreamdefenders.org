@extends('layouts.app')

@section('content')
  <header class="px-4 pt-32 mx-auto md:px-0">
    <img src="@asset('images/freedom-papers.jpg')" />
  </header>

  <main class='container px-4 pb-32 mx-auto'>
    @posts
      <div class="px-4 pb-12">
        @content
      </div>
    @endposts

    <div class="container mx-auto">
      <img src="@asset('images/select-a-volume.jpg')" class="w-3/5 pb-8 mx-auto sm:px-4 md:px-24 lg:px-32 md:max-w-3/5" alt="Select a Volume" title="Select a Volume" />
    </div>

    @isset($papers)
      <div class="flex flex-col flex-wrap px-4 mx-auto mt-0 alignfull md:flex-row" style="max-width: 1600px; margin-top: 0;">
        @if($papers->isNotEmpty())
          @foreach($papers as $paper)
            @if($paper->image && $paper->url)
              <div class="w-full p-2 md:w-1/3">
                <a href="{!! $paper->url !!}" hoverfx hoverfx fx-elasticity="0" fx-duration="800" fx-on-scale="1.1" fx-off-scale="1" fx-on-translate-y="-3px" fx-off-translate-y="0px" class="relative z-0 block object-contain shadow shadow-md w-100 hover:shadow-2xl transition transition-all hover:z-10"> <img class="w-100" src="{!! $paper->image !!}" @isset($paper->title) title="{!! $paper->title !!}" @endisset @isset($paper->excerpt) alt="{!! $paper->excerpt !!}" @endisset />
                </a>
              </div>
            @endif
          @endforeach
        @endif
      </div>
    @endisset
  </main>
@endsection
