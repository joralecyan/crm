<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Board;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort($id, Request $request)
    {
        foreach ($request->get('order', []) as $key => $value) {
            Task::where('id', $value)->update(['order' => $key, 'board_id' => $id]);
        }
        return response()->json(['status' => 'success']);
    }

    /**
     * @param TaskRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function store(TaskRequest $request)
    {
        $task = Task::create($request->all());
        $board = $task->board;
        $boards = Board::with(['tasks' => function ($q) {
            return $q->orderBy('order', 'asc');
        }])->where('project_id', $board->project_id)->orderBy('order', 'asc')->get();
        return view('projects.parts._boards', compact('boards'));
    }
}
