<nav class="flex flex-wrap items-center justify-between w-full p-6 bg-grey-darkest pin-t">
  <div class="flex items-center mr-6 text-white flex-no-shrink">
    <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
      <span class="relative pl-2 text-2xl">@svg('logo')</span>
    </a>
  </div>

  <div class="block lg:hidden">
    <button id="nav-toggle" class="flex items-center px-3 py-2 text-white">
      <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>

  <div class="flex-grow hidden w-full pt-6 lg:flex lg:items-center lg:w-auto lg:block lg:pt-0" id="nav-content">
    <ul class="items-center justify-end flex-1 list-reset lg:flex">
      <li class="mr-3">
        <a class="inline-block px-4 py-2 text-white no-underline" href="#">Active</a>
      </li>
      <li class="mr-3">
        <a class="inline-block px-4 py-2 no-underline text-grey-dark hover:text-grey-lighter hover:text-underline" href="#">link</a>
      </li>
      <li class="mr-3">
        <a class="inline-block px-4 py-2 no-underline text-grey-dark hover:text-grey-lighter hover:text-underline" href="#">link</a>
      </li>
      <li class="mr-3">
        <a class="inline-block px-4 py-2 no-underline text-grey-dark hover:text-grey-lighter hover:text-underline" href="#">link</a>
      </li>
    </ul>
  </div>
</nav>