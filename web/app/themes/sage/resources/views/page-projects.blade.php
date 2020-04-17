@extends('layouts.app')

@section('content')
  @include('partials.header-archive-page', [
    'archiveTitle' => 'Projects',
  ])

  <main class='container px-4 pb-32 mx-auto'>
    @if ($projects->isEmpty())
      {!! get_search_form(false) !!}
    @else
      @include('partials.archive-page', [
        'archivePosts' => $projects,
      ])
    @endif
  </main>
@endsection
