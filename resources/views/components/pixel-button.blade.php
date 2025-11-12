@props([
    'mainColor' => '#96A0FF',  
    'hoverColor' => '#7B84E0', 
    'shadowColor' => '#004AAD', 
    'borderColor' => '#001E45', 
])

<button 
    {{ $attributes->merge(['class' => 'pixel-button relative rounded-md transition-all duration-200']) }}
    style="
        --btn-main: {{ $mainColor }};
        --btn-hover: {{ $hoverColor }};
        --btn-shadow: {{ $shadowColor }};
        --btn-border: {{ $borderColor }};
        background-color: var(--btn-main);
        border: 3px solid var(--btn-border);
        box-shadow: 0 6px 0 var(--btn-shadow);
        color: #fff;
        padding: 10px 22px;
        position: relative;
        top: 0;
        font-weight: normal; /* ini yg bikin gak bold lagi */
    "
    onmouseover="this.style.backgroundColor='var(--btn-hover)'"
    onmouseout="this.style.backgroundColor='var(--btn-main)'"
    onmousedown="this.style.top='3px'; this.style.boxShadow='0 3px 0 var(--btn-shadow)'"
    onmouseup="this.style.top='0'; this.style.boxShadow='0 6px 0 var(--btn-shadow)'"
>
    {{ $slot }}
</button>
