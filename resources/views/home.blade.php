<x-guest-layout>
    <section class="c-home__gallery">
        @foreach ($posts as $post)
        <x-post-item :post="$post">
        </x-post-item>
        @endforeach
    </section>
</x-guest-layout>
