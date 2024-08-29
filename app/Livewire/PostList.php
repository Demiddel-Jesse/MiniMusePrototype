<?php

namespace app\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PostList extends Component
{
    const ITEMS_PER_PAGE = 60;

    public $postIdChunks = [];
    public $page = 1;
    public $maxPage = 1;
    public $sortDirection = 'desc';
    public $queryCount = 0;

    public function mount()
    {
        $this->prepareChunks();
    }

    public function render()
    {
        return view('livewire.post-list');
    }

    public function updatedSortDirection()
    {
        $this->prepareChunks();
    }

    public function loadMore()
    {
        if ($this->hasNextPage()) {
            $this->page++;
        }
    }

    public function prepareChunks()
    {
        $this->postIdChunks = DB::table('posts')
            ->orderBy('created_at', $this->sortDirection)
            ->pluck('id')
            ->chunk(self::ITEMS_PER_PAGE)
            ->toArray();

        $this->page = 1;

        $this->maxPage = count($this->postIdChunks);

        $this->queryCount++;
    }

    public function hasNextPage()
    {
        return $this->page < $this->maxPage;
    }
}
