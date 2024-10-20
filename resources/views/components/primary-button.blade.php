<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'flex w-full justify-center rounded-md bg-white px-3 py-1.5 text-sm font-semibold leading-6 text-primary-dark shadow-sm focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:bg-white']) }}>
    {{ $slot }}
</button>
