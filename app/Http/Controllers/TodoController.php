<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $items = Task::all();
        // dd($items);
        return view('index', ['items' => $items]);
    }

    public function confirm(Request $request)
    {
        $this->validate($request, Task::$rules);
        // $data = $request->all();
        $content = $request->content;
        $deadline = $request->deadline;
        $data = [
            'content' => $content,
            'deadline' => $deadline
        ];
        return view('confirm', $data);
    }

    public function create(Request $request)
    {
        $this->validate($request, Task::$rules);
        $task = $request->all();
        dd($task);
        Task::create($task);
        return redirect('/');
    }

    public function update(Request $request)
    {
        $this->validate($request, Task::$rules);
        $items = $request->all();
        unset($items['_token']);
        Task::where('id', $request->id)->update($items);
        return redirect('/');
    }

    public function delete(Request $request)
    {
        $this->validate($request, Task::$rules);
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
        $items = Task::where('content', 'LIKE', "%{$request->content}%")->get();
        // $item = Task::find($request->input);
        // dd($item);

        // $items = [
        //     'content' => $request->content,
        //     'item' => $item,
        // ];

        // return veiw('/', ['items' => $items]);
        return view('find', $items);
    }
}