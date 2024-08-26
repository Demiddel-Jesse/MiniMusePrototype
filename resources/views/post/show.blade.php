<x-app-layout>
    <section class="c-post">
        <div class="c-post__images">
            @foreach($post->images as $postImage)
            <div class="c-post__imgWrapper"><img src="{{ $postImage->path }}" alt="{{ $post->title }}"></div>
            @endforeach
        </div>
        <div class="c-post__text">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->description }}</p>
        </div>
    </section>
</x-app-layout>
