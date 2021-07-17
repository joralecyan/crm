<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function boards($id)
    {
        $boards = Board::where('project_id', $id)->pluck('name', 'id')->toArray();
        return response()->json(['status' => 'success', 'boards' => $boards], 200);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store($id, Request $request)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        $data['order'] = Board::where('project_id', $id)->count();
        Board::create($data);
        $boards = Board::with(['tasks' => function ($q) {
            return $q->orderBy('order', 'asc');
        }])->where('project_id', $id)->orderBy('order', 'asc')->get();
        return view('projects.parts._boards', compact('boards'));
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort($id, Request $request)
    {
        foreach ($request->get('order', []) as $key => $value) {
            Board::where('id', $value)->update(['order' => $key]);
        }

        return response()->json(['status' => 'success']);
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id, Request $request)
    {
        $data = $request->all();
        $board = Board::findOrFail($id);
        $board->update($data);
        $boards = Board::with(['tasks' => function ($q) {
            return $q->orderBy('order', 'asc');
        }])->where('project_id', $board->project_id)->orderBy('order', 'asc')->get();
        return view('projects.parts._boards', compact('boards'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $board = Board::find($id);
        $project_id = $board->project_id;
        Board::destroy($id);
        $boards = Board::with(['tasks' => function ($q) {
            return $q->orderBy('order', 'asc');
        }])->where('project_id', $project_id)->orderBy('order', 'asc')->get();
        return view('projects.parts._boards', compact('boards'));
    }
}
