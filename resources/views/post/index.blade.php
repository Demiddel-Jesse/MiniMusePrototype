<x-app-layout>
    <section class="c-gallery__posts">
        @foreach ($posts as $post)
        <x-post-item :thumbnail="$post->thumbnail" :likes="$post->likes" :views="$post->views_total" :title="$post->title" :id="$post->id">
        </x-post-item>
        @endforeach
        {{ $posts->links() }}
    </section>
</x-app-layout>
