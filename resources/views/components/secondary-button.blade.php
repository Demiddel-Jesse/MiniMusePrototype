<button {{ $attributes->merge(['type' => 'submit', 'class' => 'c-button__secondary']) }}>
    {{ $slot }}
</button>
