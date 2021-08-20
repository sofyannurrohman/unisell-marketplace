<button
  {{ $attributes->merge(['type' => 'button', 'class' => 'px-2 py-2.5 bg-primary-100 font-semibold text-white rounded-full shadow-sm inline-flex justify-center items-center hover:bg-primary-90']) }}
>
  {{ $slot }}
</button>
