<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        // $items = Task::all();
        // desc （降順）、新しい(idの数字が大きい)ものから並べる
        $items = Task::orderBy('id', 'desc')->simplePaginate(3);

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
        $validateDate = $request->validate([
            'content' => 'required'
        ]);

        if (Task::where('content', 'LIKE', "%{$request->content}%")->get()) {
            // asc （昇順）、古い(idの数字が小さい)ものから並べる
            $tasks = Task::where('content', 'LIKE', "%{$request->content}%")->get();
            return view('find', compact('tasks'));
        } elseif (is_null(Task::where('content', 'LIKE', "%{$request->content}%")->get())) {
            return redirect()->route('find')->with('result', '作成済みタスクはありません。');
        }
    }
}