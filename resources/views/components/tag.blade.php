@props(['active'=>$active])

@php
$classes = 'c-tag';
if($active == true){
$classes = 'c-tag c-tag--active';
}
@endphp

<button class="{{ $classes }}">
    {{ $slot }}
    <svg class="c-tag__check" width="14" height="11" xmlns="http://www.w3.org/2000/svg">
        <path d="M1 5.95833L4.69231 9.625L13 1.375" stroke="#FAFAFA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
    </svg>
</button>
