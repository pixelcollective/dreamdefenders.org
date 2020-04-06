@isset($pagination)
  <nav class="flex items-center my-8" role="navigation" aria-label="pagination">
    @if (! $pagination->onFirstPage())
      <a
        href="{{ $pagination->previousPageUrl() }}"
        rel="prev"
        aria-label="Previous Page"
        class="px-4 py-1 mr-3 border rounded-sm hover:bg-blue-600 hover:text-white"
      >&larr; Previous</a>
    @endif

    @if ($pagination->hasMorePages())
      <a
        href="{{ $pagination->nextPageUrl() }}"
        rel="next"
        aria-label="Next Page"
        class="px-4 py-1 mr-3 border rounded-sm hover:bg-blue-600 hover:text-white"
      >Next &rarr;</a>
    @endif
  </nav>
@endisset