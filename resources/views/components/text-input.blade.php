@props(['disabled' => false])

<input 
    @disabled($disabled) 
    {{ $attributes->merge(['class' => 'w-[370px] border-gray-300 focus:border-brand-default focus:ring-brand-default rounded-md shadow-sm']) }}
>