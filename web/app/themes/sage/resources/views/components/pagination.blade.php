@isset($pagination)
  <nav class="flex items-center my-8" role="navigation" aria-label="pagination">
    @if (! $pagination->onFirstPage())
      <a
        href="{{ $pagination->previousPageUrl() }}"
        rel="prev"
        aria-label="Previous Page"
        class="border rounded-sm mr-3 py-1 px-4 hover:bg-blue-600 hover:text-white"
      >&larr; Previous</a>
    @endif

    @if ($pagination->hasMorePages())
      <a
        href="{{ $pagination->nextPageUrl() }}"
        rel="next"
        aria-label="Next Page"
        class="border rounded-sm mr-3 py-1 px-4 hover:bg-blue-600 hover:text-white"
      >Next &rarr;</a>
    @endif
  </nav>
@endisset