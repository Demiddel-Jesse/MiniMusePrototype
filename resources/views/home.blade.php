<x-guest-layout>
    <section class="c-home__gallery">
        @foreach ($posts as $post)
        <x-post-item :thumbnail="$post->thumbnail" :likes="$post->likes" :views="$post->views_total" :title="$post->title" :id="$post->id">
        </x-post-item>
        @endforeach
    </section>
</x-guest-layout>
