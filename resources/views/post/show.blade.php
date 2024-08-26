<x-app-layout>
    <section class="c-post">
        <div class="c-post__images">
            @foreach($post->images as $postImage)
            <div class="c-post__imgWrapper"><img src="{{ $postImage->path }}" alt="{{ $post->title }}"></div>
            @endforeach
        </div>
        <div class="c-post__text">
            <h1>{{ $post->title }}</h1>
            <div class="c-post__profile">
                <img src="{{ $post->user->profile_picture }}" alt="{{ $post->user->username }} Profile Picture">
                <p>{{ $post->user->username }}</p>
            </div>
            <div class="c-post__numbers"></div>
            <p>{{ $post->description }}</p>

            @php
            $tagsByType = $post->tags->groupBy('tag_type_id');
            @endphp

            @foreach($tagTypes as $tagType)
            @if(isset($tagsByType[$tagType->id]))
            <h3>{{ $tagType->name }}</h3>
            @foreach($tagsByType[$tagType->id] as $tag)
            <p>{{ $tag->name }}</p>
            @endforeach
            @endif
            @endforeach


        </div>
    </section>
</x-app-layout>
