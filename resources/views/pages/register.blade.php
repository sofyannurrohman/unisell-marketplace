<x-layouts.auth x-data="signup">
  <form
    method="POST"
    action="{{ route('login') }}"
    class="!mt-2 flex flex-col space-y-4"
    x-ref="registerForm"
  >
    @csrf

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


    <div class="w-full pt-6">
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
        class="relative p-8 bg-white rounded-3xl shadow-lg flex flex-col items-center space-y-2.5"
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
            <svg
              viewBox="0 0 24 24"
              fill="currentColor"
              xmlns="http://www.w3.org/2000/svg"
              class="w-6 h-6 text-greyscale-placeholder rotate-45"
            >
              <path
                d="M6 12H18"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
              <path
                d="M12 18V6"
                stroke="currentColor"
                stroke-width="1.5"
                stroke-linecap="round"
                stroke-linejoin="round"
              />
            </svg>
          </button>
        </div>

        <div>
          <svg
            viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg"
            class="w-10 h-10 text-primary-100"
          >
            <path
              d="M17 3.5H7C4 3.5 2 5 2 8.5V15.5C2 19 4 20.5 7 20.5H17C20 20.5 22 19 22 15.5V8.5C22 5 20 3.5 17 3.5ZM17.47 9.59L14.34 12.09C13.68 12.62 12.84 12.88 12 12.88C11.16 12.88 10.31 12.62 9.66 12.09L6.53 9.59C6.21 9.33 6.16 8.85 6.41 8.53C6.67 8.21 7.14 8.15 7.46 8.41L10.59 10.91C11.35 11.52 12.64 11.52 13.4 10.91L16.53 8.41C16.85 8.15 17.33 8.2 17.58 8.53C17.84 8.85 17.79 9.33 17.47 9.59Z"
              fill="currentColor"
            />
          </svg>
        </div>

        <h6 class="font-semibold text-lg text-greyscale-title">{{ __('Masukkan kode verifikasi') }}</h6>

        <p class="text-sm text-greyscale-body text-center">{!! __('Kode verifikasi telah dikirim melalui <b class="font-medium">email ke your@email.com</b>') !!}</p>

        <span
          x-show="verificationNumberMsg"
          x-text="verificationNumberMsg"
          class="px-4 py-2 bg-greyscale-label text-sm rounded-full"
          :class="{ 'text-error': verificationNumberMsg }"
        ></span>

        <div class="w-full max-w-sm py-4 flex space-x-4">
          @for ($i = 0; $i < 4; $i++)
            <input
              minLength="1"
              maxLength="1"
              min="0"
              max="9"
              pattern="[0-9]{1}"
              x-model="verificationNumber{{ $i }}"
              required
              class="verification-number-input"
              :class="isVerificationNumberError && 'verification-number-input--error'"
              @keydown="onKeyDown"
              @keyup="onKeyUp"
              @focus="$el.select()"
            />
          @endfor
        </div>

        <p
          class="text-sm text-greyscale-body"
          x-html="`{{ __('Mohon tunggu dalam <b class="font-medium">${verificationNumberRequestTimeRemaining} detik</b> untuk kirim ulang') }}`"
        ></p>

        <x-button
          type="submit"
          ::disabled="!isVerificationNumberValid"
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
          isVerificationModalOpen: true,
          verificationNumber0: '-',
          verificationNumber1: '-',
          verificationNumber2: '-',
          verificationNumber3: '-',
          verificationNumberRequestTimeRemaining: verificationNumberRequestInterval,
          verificationNumberRequestCounter: undefined,
          verificationNumberMsg: 'Maaf, kode yang kamu masukkan salah :(',
          verificationNumberMsgType: 'error',
          isVerificationNumberError: true,
          get isVerificationNumberValid() {
            // concat the verification input
            const verificationNumber =
              `${this.verificationNumber0}${this.verificationNumber1}${this.verificationNumber2}${this.verificationNumber3}`;

            // convert to number and check is it NaN? if no check the length
            return !isNaN(Number(verificationNumber)) && (verificationNumber.length === 4);
          },
          closeVerificationModal() {
            this.isVerificationModalOpen = false;
          },
          openVerificationModal() {
            this.isVerificationModalOpen = true;
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
            this.onCounterStop();
          },
          onCounterStop() {
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
            e.currentTarget.value = '';

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
                nextInput.focus();
              }
            }
          },
          init() {
            this.$refs.verificationModal.addEventListener('animationend', () => {
              this.$refs.verificationModal
                .classList.remove('animate__animated', 'animate__shakeX');
            });

            Alpine.effect(() => {
              if (this.isVerificationModalOpen) {
                this.onVerificationModalOpen();
              } else {
                this.onVerificationModalClose();
              }
            });
          }
        }))

      })
    </script>
  </x-slot>
</x-layouts.auth>
