<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    public $amount = 18;

    public function render()
    {
        $posts = Post::where('published', '=', 1)->where('NSFW', '=', '0')->latest()->paginate($this->amount);

        return view('livewire.show-posts', ['posts' => $posts]);
    }
}
