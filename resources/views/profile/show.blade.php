<x-app-layout>
    <section class="c-gallery__posts">
        @foreach ($user->posts as $post)
        <x-post-item :post="$post">
        </x-post-item>
        @endforeach
    </section>
</x-app-layout>
