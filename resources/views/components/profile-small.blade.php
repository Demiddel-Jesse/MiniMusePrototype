@php
$classes = 'c-profileSmall';
if ($comment) {
$classes ='c-profileSmall c-profileSmall--comment';
}

$pfp = $user->profile_picture;
if(is_null($pfp)){
$pfp = asset('images/placeholder.jpg');
}
@endphp

<a href="/{{ $user->username }}" class="{{ $classes }}">
    <img src="{{ $pfp }}" alt="{{ $user->username }} Profile Picture">
    <div class="c-profileSmall__content">
        <p class="c-profileSmall__username">{{ $user->username }}</p>
        {{ $slot }}
    </div>
</a>
