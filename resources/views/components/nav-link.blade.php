@props(['active'])

@php
$classes = ($active ?? false)
? 'c-nav__link'
: 'c-nav__link c-nav__link--active';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
