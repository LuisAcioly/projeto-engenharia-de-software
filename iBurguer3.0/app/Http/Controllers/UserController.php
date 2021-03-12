<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public static function index()
   {   
        $user = Auth::user();

        if($user->email == 'iburguer.system@gmail.com'){
            $tasks = Task::paginate();

            return view('admin.view', compact('tasks'));
        }
        else {
            $tasks = Task::where('usermail', $user->email)->paginate();

            return view('task.view', compact('tasks'));
        }
   }

   public static function link()
   {   
        $user = Auth::user();

        if($user->email == 'iburguer.system@gmail.com'){
            return view('admin.link');
        }
        
   }

   public static function profile_link()
   {   
        $user = Auth::user();

        if($user->email != 'iburguer.system@gmail.com'){
            return view('admin.profile_link');
        }
        
   }

   /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }
}
