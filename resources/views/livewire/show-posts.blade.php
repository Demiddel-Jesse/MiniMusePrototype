<div>
    <section class="c-gallery__posts">
        @foreach ($posts as $post)
        <x-post-item :post="$post">
        </x-post-item>
        @endforeach
    </section>
    @if($posts->hasMorePages())
    <span x-intersect="$wire.loadMore()"></span>
    @else
    <p class="c-gallery__noMore">Looks like there are no more posts...</p>
    @endif
</div>
