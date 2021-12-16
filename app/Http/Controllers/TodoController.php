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
        // $task = Task::find($request->id);
        $items = $request->all();
        unset($items['_token']);
        Task::where('id', $request->id)->update($items);
        dd($items);
        return redirect('/');
    }
    public function delete(Request $request)
    {
        $this->validate($request, Task::$rules);
        $items  = $request->all();
        unset($items['_token']);
        Task::where('id', $request->id)->update($items);
        return redirect('/');
    }
}