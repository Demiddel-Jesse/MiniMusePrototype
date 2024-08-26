@props(['thumbnail' => $thumbnail, 'likes' => $likes, 'views' => $views, 'title' => $title, 'id' => $id])

@if(is_null($thumbnail))
@php
$thumbnail = '../images/placeholder.jpg'
@endphp
@endif

<a href="/gallery/{{ $id }}">

    <div class="c-postItem">
        <img class="c-postItem__img" src="{{ $thumbnail}}" alt="{{ $title }}">
        <div class="c-postItem__bar">
            <p class="c-postItem__barItem">
                <svg class="c-postItem__svg" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2.03555 12.3224C1.96647 12.1151 1.9664 11.8907 2.03536 11.6834C3.42372 7.50972 7.36079 4.5 12.0008 4.5C16.6387 4.5 20.5742 7.50692 21.9643 11.6776C22.0334 11.8849 22.0335 12.1093 21.9645 12.3166C20.5761 16.4903 16.6391 19.5 11.9991 19.5C7.36119 19.5 3.42564 16.4931 2.03555 12.3224Z" />
                    <path d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z" />
                </svg>
                <span>{{ $views }}</span>
            </p>
            <p class="c-postItem__barItem">
                <svg xmlns="http://www.w3.org/2000/svg" class="c-postItem__svg">
                    <path d="M7 10v12" />
                    <path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z" />
                </svg>
                <span>{{ $likes }}</span>
            </p>
        </div>
    </div>
</a>
