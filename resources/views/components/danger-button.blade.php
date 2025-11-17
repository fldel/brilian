<button 
    {{ $attributes->merge(['type' => 'submit', 'class' => 'pixel-button relative rounded-md transition-all duration-200']) }}
    style="
        --btn-main: #FF6B6B;      /* warna merah utama */
        --btn-hover: #FF5252;     /* warna saat hover */
        --btn-shadow: #B80000;    /* bayangan bawah */
        --btn-border: #4A0000;    /* warna border */
        background-color: var(--btn-main);
        border: 3px solid var(--btn-border);
        box-shadow: 0 6px 0 var(--btn-shadow);
        color: #fff;
        padding: 10px 22px;
        position: relative;
        top: 0;
        font-weight: normal;
    "
    onmouseover="this.style.backgroundColor='var(--btn-hover)'"
    onmouseout="this.style.backgroundColor='var(--btn-main)'"
    onmousedown="this.style.top='3px'; this.style.boxShadow='0 3px 0 var(--btn-shadow)'"
    onmouseup="this.style.top='0'; this.style.boxShadow='0 6px 0 var(--btn-shadow)'"
>
    {{ $slot }}
</button>
