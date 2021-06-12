<?php

namespace App\Http\Controllers;

use App\Http\Requests\PositionRequest;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::withCount('users')->sortable(['id' => 'desc'])->paginate(m_per_page());
        return response()->view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PositionRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PositionRequest $request)
    {
        Position::create($request->all());
        flash()->success(__('Position created'));
        return response()->redirectToRoute('positions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $position)
    {
        return response()->view('positions.show', compact('position'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $position)
    {
        return response()->view('positions.edit', compact('position'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param PositionRequest $request
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PositionRequest $request, Position $position)
    {
        $position->update($request->all());
        flash()->success(__('Position updated'));
        return response()->redirectToRoute('positions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Position $position
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Position $position)
    {
        $position->users()->update(['position_id' => null]);
        $position->delete();
        flash()->success(__('Position deleted'));
        return response()->redirectToRoute('positions.index');
    }
}
