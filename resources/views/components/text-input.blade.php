@props(['disabled' => false])

<input @disabled($disabled)
    {{ $attributes->merge(['class' => 'border border-border-color placeholder:text-muted-color bg-transparent rounded-lg']) }}>
