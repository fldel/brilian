<a {{ $attributes->merge([
    'class' => '
        block w-full px-3 py-2 
        text-2xl font-cave text-black 
        hover:bg-gray-100 rounded-2xl 
        transition whitespace-nowrap
    '
]) }}>
    {{ $slot }}
</a>
