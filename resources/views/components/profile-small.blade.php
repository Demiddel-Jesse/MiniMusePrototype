@props(['user' => $user, 'comment' => $comment])

@php
$classes = 'c-profileSmall';
if ($comment) {
$classes ='c-profileSmall c-profileSmall--comment';
}
@endphp

<div class="{{ $classes }}">
    <img src="{{ $user->profile_picture }}" alt="{{ $user->username }} Profile Picture">
    <div class="c-profileSmall__content">
        <p class="c-profileSmall__username">{{ $user->username }}</p>
        {{ $slot }}
    </div>
</div>
