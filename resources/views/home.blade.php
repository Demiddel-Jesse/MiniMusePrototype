<x-guest-layout>
    <section class="c-gallery__posts">
        @foreach ($posts as $post)
        <x-post-item :post="$post">
        </x-post-item>
        @endforeach
    </section>
</x-guest-layout>
