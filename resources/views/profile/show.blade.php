<x-app-layout>
    @foreach ($user->posts as $post)
    <x-post-item :post="$post">
    </x-post-item>
    @endforeach
</x-app-layout>
