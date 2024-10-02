@props(['align' => 'right'])

@php
switch ($align) {
case 'left':
$alignmentClasses = 'c-dropdownProfile__align--left';
break;
case 'top':
$alignmentClasses = 'c-dropdownProfile__align--top';
break;
case 'right':
default:
$alignmentClasses = 'c-dropdownProfile__align--default';
break;
}
@endphp

<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" class="c-dropdownProfile">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="c-dropdownProfile__transition--enter" x-transition:enter-start="c-dropdownProfile__transition--enter-start" x-transition:enter-end="c-dropdownProfile__transition--enter-end" x-transition:leave="c-dropdownProfile__transition--leave" x-transition:leave-start="c-dropdownProfile__transition--leave-start" x-transition:leave-end="c-dropdownProfile__transition--leave-end" class="c-dropdownProfile__content {{ $alignmentClasses }} " style="display: none;" @click="open = false">


        {{ $content }}
    </div>
</div>
