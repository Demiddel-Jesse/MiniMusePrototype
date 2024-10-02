<?php

namespace App\View\Components;

use App\Models\PaintBlockLine;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Closure;

class PaintBlock extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public int $paintBlockId) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $paintBlock = \App\Models\PaintBlock::with('paint_block_lines.paints')->find($this->paintBlockId);

        return view('components.paint-block', ['paintBlock' => $paintBlock]);
    }
}
