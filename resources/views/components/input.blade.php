@props(['disabled' => false])

<input
  {{ $disabled ? 'disabled' : '' }}
  {!! $attributes->merge(['class' => 'px-4 py-3 font-sans placeholder-gray-300 rounded-full shadow-sm border-gray-400 transition-all focus:border-primary-70 focus:ring focus:ring-primary-50 focus:ring-opacity-50 invalid:border-error invalid:ring-error invalid:ring-opacity-50']) !!}
>
