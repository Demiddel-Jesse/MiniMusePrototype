<div>
    <div>
        @for ($i = 0; $i < $page && $i < $maxPage; $i++) @livewire('post-list-items', [ 'postIds'=> $postIdChunks[$i],
            ], key("chunk-{$queryCount}-{$i}"))
            @endfor
    </div>

    @if ($this->hasNextPage())
    <div x-intersect="$wire.loadMore" class="h-12 -translate-y-44"></div>
    <button wire:click="loadMore">Load more</button>
    @else
    <p>no more posts...</p>
    @endif



    <!-- RESEARCH: infinite scroll
        -->
    {{-- @if($posts->hasMorePages())

        <button wire:click.prevent="loadMore" class="c-button c-button__secondary">Load more</button>
        @else
        <p class="c-gallery__noMore">Looks like there are no more posts...</p>
        @endif --}}
    <div wire:loading>
        Loading more posts...
    </div>

</div>
