@props(['active'])

@php
$classes = ($active ?? false)
? 'c-nav__link c-nav__link--active'
: 'c-nav__link ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
