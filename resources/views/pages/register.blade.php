<x-layouts.auth x-data="signup">
  <form
    method="POST"
    action="{{ route('login') }}"
    class="!mt-2 flex flex-col space-y-4"
    x-ref="registerForm"
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
    <div>
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
    <div>
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
        class="w-full"
        @click="onSubmitRegister"
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
          required
          class="rounded border-gray-300 text-primary-100 shadow-sm focus:border-primary-70 focus:ring focus:ring-primary-50 focus:ring-opacity-50"
        >
        <span class="ml-2 text-sm text-gray-600">{!! __('Dengan mendaftar, saya menyetujui <b>Syarat dan Ketentuan</b> serta <b>Kebijakan Privasi</b>') !!}</span>
      </label>
    </div>
  </form>

  <x-screen-overlay x-show="isVerificationModalOpen">
    <form
      x-ref="verificationNumberForm"
      class="relative w-full h-full flex flex-col justify-center items-center"
      @click.self="onOverlayClick"
    >
      <div
        class="relative p-4 bg-white rounded-3xl shadow-lg flex flex-col items-center space-y-2.5"
        x-ref="verificationModal"
        x-show="isVerificationModalOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform scale-90"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90"
      >
        <div class="absolute top-0 right-0 m-4">
          <button
            class="rounded-full"
            @click="closeVerificationModal"
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
              required
              class="hide-input-arrows w-1/4 text-lg text-center border-0 border-b border-gray-300 focus:border-primary-50 focus:ring-primary-70"
              @keydown="onKeyDown"
              @keyup="onKeyUp"
            />
          @endfor
        </div>

        <p
          class="text-sm text-gray-500"
          x-text="`{{ __('Mohon tunggu dalam ${verificationNumberRequestTimeRemaining} detik untuk kirim ulang') }}`"
        ></p>
        <x-button
          type="submit"
          class="w-full max-w-xs"
          x-ref="verificationNumberFormSubmitter"
        >
          {{ __('Verifikasi') }}
        </x-button>
      </div>
      </div>
  </x-screen-overlay>

  <x-slot name="beforeHeadEnd">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
    />
    <script
        defer
        src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"
    ></script>
  </x-slot>

  <x-slot name="beforeBodyEnd">
    <script>
      document.addEventListener('alpine:init', () => {
        const tabKey = 9;
        const numberKeys = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57];
        const verificationNumberRequestInterval = 60;

        Alpine.data('signup', () => ({
          isVerificationModalOpen: false,
          verificationNumberRequestTimeRemaining: verificationNumberRequestInterval,
          verificationNumberRequestCounter: undefined,
          closeVerificationModal() {
            this.isVerificationModalOpen = false;
            this.onVerificationModalClose();
          },
          openVerificationModal() {
            this.isVerificationModalOpen = true;
            this.onVerificationModalOpen();
          },
          startCounter() {
            this.stopCounter()

            this.verificationNumberRequestCounter = setInterval(() => {
              if (--this.verificationNumberRequestTimeRemaining <= 0) {
                this.stopCounter();
              }
            }, 1000);
          },
          stopCounter() {
            clearInterval(this.verificationNumberRequestCounter);
            this.onStopCounter();
          },
          onStopCounter() {
            this.verificationNumberRequestTimeRemaining = verificationNumberRequestInterval;
          },
          onSubmitRegister() {
            if (this.$refs.registerForm.reportValidity()) {
              this.openVerificationModal();
            }
          },
          onVerificationModalClose() {
            //
          },
          onVerificationModalOpen() {
            this.startCounter();
          },
          onOverlayClick() {
            this.$refs.verificationModal.classList.add('animate__animated', 'animate__shakeX');
          },
          onKeyDown(e) {
            e.currentTarget.value = e.currentTarget.value.slice(e.currentTarget.value.length - 1, e.currentTarget.value.length);

            return [tabKey, ...numberKeys].includes(e.which);
          },
          /** @param {KeyboardEvent} e */
          onKeyUp(e) {
            const pressedKey = e.which;

            if (pressedKey === tabKey) {
              return true;
            } else if (!numberKeys.includes(pressedKey)) {
              return false;
            } else {
              /** @type {(HTMLInputElement | null)} */
              const nextInput = e.currentTarget.nextElementSibling;

              if (nextInput) {
                nextInput.select();
              } else {
                const form = this.$refs.verificationNumberForm;

                if (form.requestSubmit) {
                  form.requestSubmit(this.$refs.verificationNumberFormSubmitter);
                } else {
                  form.submit();
                }
              }
            }
          },
          init() {
            this.$refs.verificationModal.addEventListener('animationend', () => {
              this.$refs.verificationModal
                .classList.remove('animate__animated', 'animate__shakeX');
            });
          }
        }))

      })
    </script>
  </x-slot>
</x-layouts.auth>
