<button {{ $attributes->merge(['type' => 'submit', 'class' => 'c-button c-button__secondary']) }}>
    {{ $slot }}
</button>
