
<div class="w-full h-screen block overflow-hidden">
  <div class="banner-bg object-cover bg-black bg-fixed bg-center bg-top w-full h-full">
    <div class="bg-gray-600 w-full">
      <div class="container flex items-center justify-center mx-auto align-middle">
        <div class="flex items-center w-full text-center text-white h-screen p-24 lg:p-32 my-8">
          <img src="@asset('images/banner-messaging.png')" class="w-full hidden lg:block max-w-4/5" />
          <img src="@asset('images/banner-messaging-medium.png')" class="w-full hidden md:block lg:hidden max-w-3/5" />
          <img src="@asset('images/banner-messaging-small.png')" class="w-full block md:hidden max-w-4/5" />
        </div>
      </div>
    </div>
  </div>
</div>

@push('styles')
  @style
    .banner-bg {
      background-image: url(@asset('images/banner-background.png'));
    }
  @endstyle
@endpush
