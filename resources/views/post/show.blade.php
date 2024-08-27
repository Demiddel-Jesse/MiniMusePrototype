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
                <x-profile-small :user="$post->user" :comment="null">
                    Created
                    {{ get_time_diff_string($post->created_at) }}
                    ago
                </x-profile-small>
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
            <x-tag :post="true">
                {{ $tag->name }}
            </x-tag>
            @endforeach

            @endif
            @endforeach

            @foreach ($comments as $comment)
            <x-comment :user="$comment->user" :comment="$comment">
                {{ $comment->comment }}
            </x-comment>
            @endforeach
        </div>
    </section>
</x-app-layout>
