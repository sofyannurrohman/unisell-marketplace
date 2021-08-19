<x-html-template>
  <main class="h-full min-h-screen grid grid-cols-2">
    <div class="h-full bg-gray-50 flex flex-col justify-around px-16 py-8">
      <x-brand />

      <div class="self-center max-w-lg">
        <img
          src="https://via.placeholder.com/300"
          alt="login illustration"
        >
      </div>

      <div>
        <small class="text-gray-500">&copy;2021 PT.Unisell</small>
      </div>
    </div>

    <div class="justify-self-center h-full w-full max-w-xl bg-white flex flex-col justify-center px-16 py-8">
      <div
        role="tablist"
        class="overflow-hidden flex flex-nowrap"
      >
        <div
          role="tab"
          class="cursor-pointer relative w-1/2 p-5 flex flex-col items-center"
        >
          <span class="font-bold text-primary-100 text-center">{{ __('Masuk') }}</span>

          <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-primary-100"></div>
        </div>

        <div
          role="tab"
          class="cursor-pointer relative w-1/2 p-5 flex flex-col items-center"
        >
          <span class="font-bold text-gray-300 text-center">{{ __('Daftar') }}</span>

          <div class="absolute inset-x-0 bottom-0 w-full h-[2px] bg-gray-300"></div>
        </div>
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
  </main>
</x-html-template>
