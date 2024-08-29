<div>
    <div>
        @for ($i = 0; $i < $page && $i < $maxPage; $i++) @livewire('post-list-items', [ 'postIds'=> $postIdChunks[$i],
            ], key("chunk-{$queryCount}-{$i}"))
            @endfor
    </div>

    @if ($this->hasNextPage())
    <div class="c-gallery__loaders">
        <div x-intersect="" class="c-gallery__loaders--intersect"></div>
        <button wire:click="loadMore" class="c-button c-button__secondary c-gallery__loaders--button">Load more</button>
    </div>
    @else
    <p class="c-gallery__noMore">no more posts...</p>
    @endif
    <div wire:loading class="c-gallery__loading">
        Loading more posts...
    </div>
</div>
