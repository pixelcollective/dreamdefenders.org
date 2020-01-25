
<div class="w-full">
  <div class="banner-bg object-cover bg-black bg-fixed bg-center bg-top h-screen">
    <div class="bg-gray-600 h-screen w-full">
      <div class="container flex items-center justify-center px-1 mx-auto align-middle">
        <div class="flex items-center w-full text-center text-white h-screen">
          <img src="@asset('images/banner-messaging.png')" class="w-full" />
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
