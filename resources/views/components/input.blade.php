@props(['disabled' => false, 'error' => false])

<input
  {{ $disabled ? 'disabled' : '' }}
  {!! $attributes->class(['px-4 py-3 font-sans placeholder-gray-300 rounded-full shadow-sm transition-all focus:border-primary-70 focus:ring focus:ring-primary-50 focus:ring-opacity-50', 'border-gray-400' => !$error, 'border-error ring-error ring-opacity-50' => $error])->merge() !!}
>
