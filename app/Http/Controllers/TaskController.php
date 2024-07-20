<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index()
    {
        return Auth::user()->tasks;
    }


    public function store(Request $request)
    {
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
            'user_id' => Auth::id()
        ]);
        return $task;
    }



    public function show(string $id)
    {
        return Auth::user()->tasks->find($id);
    }

    public function update(Request $request, string $id)
    {
        $task = Auth::user()->tasks->find($id);
        $task->update($request->all());
        return $task;
    }

    public function destroy(string $id)
    {
        return Auth::user()->tasks->find($id)->delete();
    }
}


