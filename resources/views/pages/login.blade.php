<x-layouts.auth>
  <form
    method="POST"
    action="{{ route('login') }}"
    class="!mt-2 flex flex-col space-y-4"
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

    <div class="flex justify-between">
      <!-- Remember Me -->
      <label
        for="remember_me"
        class="inline-flex items-center"
      >
        <input
          id="remember_me"
          name="remember"
          type="checkbox"
          class="rounded border-gray-300 text-primary-100 shadow-sm focus:border-primary-30 focus:ring focus:ring-primary-20 focus:ring-opacity-50"
        >
        <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
      </label>

      <!-- Forgot Password -->
      @if (Route::has('password.request'))
        <a
          href="{{ route('password.request') }}"
          class="text-sm text-gray-400 hover:text-gray-900"
        >
          {{ __('Lupa password?') }}
        </a>
      @endif
    </div>

    <div class="w-full pt-8">
      <button
        type="submit"
        class="w-full px-2 py-2.5 bg-primary-100 font-semibold text-white rounded-full shadow-sm hover:bg-primary-90"
      >
        {{ __('Log in') }}
      </button>
    </div>
  </form>
</x-layouts.auth>
