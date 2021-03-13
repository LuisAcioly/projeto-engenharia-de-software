<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Burguer;
use App\Models\Drink;
use Illuminate\Http\Request;
use Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {   
        $tasks = Task::where('usermail', Auth::user()->email)->paginate();

        return view('task.view', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $burguers = Burguer::paginate();

        $drinks = Drink::paginate();

        return view('task.add', compact('burguers'), compact('drinks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task;

        $task->usermail = Auth::user()->email;
        $task->burguer = $request->burguer;
        $task->drink = $request->drink;
        $task->status = 'Entregue';
        $task->save();

        return view('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('id', $id)->first();

        return view('admin.show_task', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   
        $task = Task::where('id', $request->id)->first();

        $task->status = $request->status;
        $task->save();

        return redirect()->route('show.task', $task->id)->with('message', 'Pedido atualizado');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}