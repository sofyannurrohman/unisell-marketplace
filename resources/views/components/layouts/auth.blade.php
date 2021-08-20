@php
$getTabColor = fn($toRouteName) => Route::currentRouteName() === $toRouteName ? 'text-primary-100' : 'text-gray-300';
@endphp

<x-html-template>
  <main class="h-screen grid grid-cols-2">
    <section class="h-full bg-gray-50 flex flex-col justify-around p-16">
      <x-brand />

      <div class="self-center max-w-lg">
        <img
          src="/img/img-placeholder.png"
          alt="login illustration"
        >
      </div>

      <div>
        <small class="text-gray-500">&copy;2021 PT.Unisell</small>
      </div>
    </section>

    <section class="justify-self-center overflow-y-auto h-full w-full px-16 py-8 bg-white flex flex-col items-center">
      <div class="h-full w-full max-w-md flex flex-col justify-center">
        <div
          role="tablist"
          class="flex flex-nowrap"
        >
          <a
            href="{{ route('login') }}"
            role="tab"
            class="cursor-pointer relative w-1/2 p-5 flex flex-col items-center"
          >
            <span class="font-bold text-center {{ $getTabColor('login') }}">{{ __('Masuk') }}</span>

            @if (Route::currentRouteName() == 'login')
              <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-primary-100"></div>
            @else
              <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-gray-300"></div>
            @endif
          </a>

          <a
            href="{{ route('register') }}"
            role="tab"
            class="cursor-pointer relative w-1/2 p-5 flex flex-col items-center"
          >
            <span class="font-bold text-center {{ $getTabColor('register') }}">{{ __('Daftar') }}</span>


            @if (Route::currentRouteName() == 'register')
              <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-primary-100"></div>
            @else
              <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-gray-300"></div>
            @endif
          </a>
        </div>

        <div
          role="tabpanel"
          class="py-6 flex flex-col space-y-8"
        >
          <div class="flex space-x-4">
            <button
              class="w-1/2 px-2 py-2.5 bg-white font-medium border border-greyscale-stroke rounded-full flex justify-center items-center space-x-3 transition-colors hover:bg-gray-50"
            >
              <img
                src="/icons/google-g.svg"
                alt="google g"
              >
              <span>Google</span>
            </button>

            <button
              class="w-1/2 px-2 py-2.5 bg-white font-medium border border-greyscale-stroke rounded-full flex justify-center items-center space-x-3 transition-colors hover:bg-gray-50"
            >
              <img
                src="/icons/facebook-f.svg"
                alt="facebook f"
              >
              <span>Facebook</span>
            </button>
          </div>

          <div class="flex items-center space-x-4">
            <hr class="flex-grow bg-gray-400" />

            <span class="font-medium text-sm text-gray-400">{{ __('atau masuk dengan') }}</span>

            <hr class="flex-grow bg-gray-400" />
          </div>

          {{ $slot }}
        </div>
      </div>
    </section>
  </main>

  <x-slot name="beforeBodyEnd">
    {{ isset($beforeBodyEnd) ? $beforeBodyEnd : '' }}
  </x-slot>
</x-html-template>
