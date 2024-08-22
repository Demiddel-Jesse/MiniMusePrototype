<button {{ $attributes->merge(['type' => 'submit', 'class' => 'c-button__primary']) }}>
    {{ $slot }}
</button>
