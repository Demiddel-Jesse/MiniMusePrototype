<?php

namespace App\Http\Controllers;

use App\Models\Paint;
use App\Models\PaintBrand;
use Illuminate\Http\Request;

class PaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Paint $paint)
    {
        $comparePaints = Paint::with(['paints' => function ($q) {
            $q->orderBy('delta', 'asc');
        }, 'paints.paint_brand'])->find($paint->id);
        return view('paint.show', ['paint' => $comparePaints]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paint $paint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paint $paint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paint $paint)
    {
        //
    }
}
