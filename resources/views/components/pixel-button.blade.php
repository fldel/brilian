@props([
    'mainColor' => '#96A0FF',  
    'hoverColor' => '#7B84E0', 
    'shadowColor' => '#004AAD', 
    'borderColor' => '#001E45', 
])

<button {{ $attributes->merge(['class' => 'pixel-button']) }}
    style="
        --btn-main: {{ $mainColor }};
        --btn-hover: {{ $hoverColor }};
        --btn-shadow: {{ $shadowColor }};
        --btn-border: {{ $borderColor }};
    ">
    {{ $slot }}
</button>