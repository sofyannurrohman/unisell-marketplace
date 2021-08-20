<x-layouts.auth>
  <form
    method="POST"
    action="{{ route('login') }}"
    class="!mt-2 flex flex-col space-y-4"
  >
    @csrf

    <!-- Name -->
    <div>
      <x-label
        for="name"
        :value="__('Nama')"
      />

      <x-input
        id="name"
        type="text"
        name="name"
        :placeholder="__('nama')"
        :value="old('name')"
        required
        autofocus
        class="block mt-1 w-full"
      />
    </div>

    <!-- Email Address -->
    <div>
      <x-label
        for="email"
        :value="__('Email')"
      />

      <x-input
        id="email"
        name="email"
        type="email"
        :value="old('email')"
        placeholder="your@email.com"
        required
        class="block mt-1 w-full"
        autofocus
      />
    </div>

    <!-- Password -->
    <div class="mt-4">
      <x-label
        for="password"
        :value="__('Password')"
      />

      <x-input
        id="password"
        name="password"
        type="password"
        placeholder="password"
        required
        autocomplete="current-password"
        class="block mt-1 w-full"
      />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4">
      <x-label
        for="password_confirmation"
        :value="__('Konfirmasi password')"
      />

      <x-input
        id="password_confirmation"
        name="password_confirmation"
        type="password"
        :placeholder="__('konfirmasi password')"
        required
        class="block mt-1 w-full"
      />
    </div>

    <div class="w-full pt-8">
      <x-button
        type="submit"
        class="w-full "
      >
        {{ __('Daftar') }}
      </x-button>
    </div>

    <div class="w-full">
      <label
        for="terms_agreement"
        class="inline-flex items-center space-x-4"
      >
        <input
          id="terms_agreement"
          name="terms_agreement"
          type="checkbox"
          class="rounded border-gray-300 text-primary-100 shadow-sm focus:border-primary-70 focus:ring focus:ring-primary-50 focus:ring-opacity-50"
        >
        <span class="ml-2 text-sm text-gray-600">{!! __('Dengan mendaftar, saya menyetujui <b>Syarat dan Ketentuan</b> serta <b>Kebijakan Privasi</b>') !!}</span>
      </label>
    </div>
  </form>

  <x-screen-overlay>
    <div
      class="relative w-full h-full flex flex-col justify-center items-center"
      x-init="console.log('asdad')"
    >
      <div class="relative p-4 bg-white rounded-3xl shadow-lg flex flex-col items-center space-y-2.5">
        <div class="absolute top-0 right-0 m-4">
          <button
            class="rounded-full"
            x-on:click.prevent="console.log"
          >
            <span class="material-icons-round text-gray-300">close</span>
          </button>
        </div>

        <span class="material-icons-round text-3xl">mail</span>

        <h6 class="font-semibold text-md">{{ __('Masukkan kode verifikasi') }}</h6>

        <p class="text-sm text-center">{{ __('Kode verifikasi telah dikirim melalui sms ke 081329230845') }}</p>

        <div class="w-full max-w-sm py-4 flex space-x-4">
          @for ($i = 0; $i < 4; $i++)
            <input
              type="number"
              minLength="1"
              maxLength="1"
              class="hide-input-arrows w-1/4 text-lg text-center border-0 border-b border-gray-300 focus:border-primary-50 focus:ring-primary-70"
              x-on:change="alert('asdad')"
            />
          @endfor
        </div>

        <p class="text-sm text-gray-500">{{ __('Mohon tunggu dalam 28 detik untuk kirim ulang') }}</p>
        <x-button
          type="submit"
          class="w-full max-w-xs"
        >
          {{ __('Verifikasi') }}
        </x-button>
      </div>
    </div>
  </x-screen-overlay>

  <x-slot name="beforeHeadEnd">
    <script
        defer
        src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"
    ></script>
  </x-slot>

  <x-slot name="beforeEnd">
    <script defer>
      // document.addEventListener('DOMContentLoaded', () => {
      const onKeyDown = e => {
        console.log(e)
        // const key = e.which;

        // if (key === 9 || (key >= 48 && key <= 57)) {
        //   return true;
        // }

        // e.preventDefault();
        // return false;
      }

      const onKeyUp = e => {
        console.log(e);
        // const key = e.which;
        // const t = $(e.target);
        // const sib = t.next('input');

        // if (key != 9 && (key < 48 || key > 57)) {
        //   e.preventDefault();
        //   return false;
        // }

        // if (key === 9) {
        //   return true;
        // }

        // if (!sib || !sib.length) {
        //   sib = body.find('input').eq(0);
        // }
        // sib.select().focus();
      }
      // })
    </script>
  </x-slot>
</x-layouts.auth>
