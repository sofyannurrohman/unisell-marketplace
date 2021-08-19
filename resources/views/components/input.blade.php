@props(['disabled' => false])

<input
  {{ $disabled ? 'disabled' : '' }}
  {!! $attributes->merge(['class' => 'px-4 py-3 font-sans placeholder-gray-300 rounded-full shadow-sm border-gray-400 focus:border-primary-20 focus:ring focus:ring-primary-20 focus:ring-opacity-50']) !!}
>
