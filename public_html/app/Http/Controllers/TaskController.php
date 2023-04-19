<?php

namespace App\Http\Controllers;

use Session;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function completed_tasks()
    {
        $tasks = Task::where([
                            ['user_id', Auth::user()->id],
                            ['completed', '=', 1]
                        ])
                    ->get();

        return view('task.task', compact('tasks'));
    }

    public function incomplete_tasks()
    {
        $tasks = Task::where([
                            ['user_id', Auth::user()->id],
                            ['completed', '=', 0],
                            ['days', '<', 0]
                        ])
                    ->get();

        return view('task.task', compact('tasks'));
    }

    public function create()
    {
        return view ('task.add-task');
    }

    public function store(Request $request)
    {
        Task::create([
            'task_name'=>request('task_name'),
            'deadline'=>request('deadline'),
            'user_id'=>Auth::user()->id
        ]);

        session()->flash('message', 'Task has been added!');

        return redirect('/task');
        //return redirect()->back()->with('alert', 'Task Added');
    }

    public function show(Task $task)
    {
        $tasks = Task::whereIn('user_id', [Auth::user()->id])
                        ->get();

        return view('task.task', compact('tasks'));
    }

    public function edit($id)
    {
        $task = Task::find($id);

        return view('task.edit-task', compact('task'));
    }

    public function update($id)
    {
        $task = Task::find($id);

        $task->update([
            'task_name'=>request('task_name'),
            'deadline'=>request('deadline'),
            'completed'=>request('completed')
        ]);

        session()->flash('message', 'Task has been updated!');

        /* $users = DB::table('users')
                ->whereColumn('updated_at', '>', 'created_at')
                ->get(); */

        return redirect('/task');
    }

    public function complete(Task $task)
    {
        $task->update([
            'completed'=>request()->has('completed')
        ]);

        return back();
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->back();
    }
}
