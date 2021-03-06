<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $items = Task::all();
        $items = Task::simplePaginate(3);
        // dd($items);
        return view('index', ['items' => $items]);
    }

    public function confirm(Request $request)
    {
        $this->validate($request, Task::$rules);

        $content = $request->content;
        $deadline = $request->deadline;

        $items = [
            'content' => $content,
            'deadline' => $deadline,
        ];
        return view('confirm', $items);
    }

    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);

        $task = $request->all();
        // dd($task);
        Task::create($task);
        return redirect('/');
    }

    public function update(Request $request)
    {

        $items = $request->all();
        unset($items['_token']);

        Task::where('id', $request->id)->update($items);
        return redirect('/');
    }

    public function delete(Request $request)
    {

        Task::find($request->id)->delete();
        return redirect('/');
    }

    public function tofind()
    {
        return view('find');
    }

    public function find(Request $request)
    {
        // シングルクォーテーションは文字列として認識される
        $tasks = Task::where('content', 'LIKE', "%{$request->content}%")->get();

        $items = [
            'content' => $request->content,
            'tasks' => $tasks,
        ];
        // dd($items);
        // return view('find', ['items' => $items]);
        return view('find', $items);
    }
}