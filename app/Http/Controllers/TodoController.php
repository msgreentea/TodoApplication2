<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TodoController extends Controller
{
    public function index()
    {
        $items = Task::all();
        return view('index', ['items' => $items]);
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
    public function find(Request $request)
    {
        // シングルクォーテーションは文字列として認識される
        $item = Task::where('content', 'LIKE', "%{$request->content}%")->first();
        // dd($item);
        $items = [
            'find' => $request->find,
            'item' => $item,
        ];
        // return veiw('/', ['items' => $items]);
        return redirect('/');
    }
}