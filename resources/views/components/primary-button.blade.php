<button {{ $attributes->merge(['type' => 'submit', 'class' => 'c-button c-button__primary']) }}>
    {{ $slot }}
</button>
