@props(['align' => 'right'])

@php
switch ($align) {
case 'left':
$alignmentClasses = 'c-dropdown__align--left';
break;
case 'top':
$alignmentClasses = 'c-dropdown__align--top';
break;
case 'right':
default:
$alignmentClasses = 'c-dropdown__align--default';
break;
}
@endphp

<div x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false" class="c-dropdown">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="c-dropdown__transition--enter" x-transition:enter-start="c-dropdown__transition--enter-start" x-transition:enter-end="c-dropdown__transition--enter-end" x-transition:leave="c-dropdown__transition--leave" x-transition:leave-start="c-dropdown__transition--leave-start" x-transition:leave-end="c-dropdown__transition--leave-end" class="c-dropdown__content {{ $alignmentClasses }} " style="display: none;" @click="open = false">

        <div class="">
            {{ $content }}
        </div>
    </div>
</div>
