<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "hello";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:2'
        ]);
        $id = Auth::id();
        
        $task = new Task;
        $task->title = $request->title;
        $task->user_id = $id;
        $task->save();
        
        
        $tasks = Task::where('user_id',$id)->get();
        
        

        return redirect()->route('home')->with('message','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        return view('edit',['task'=>$task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:2'
        ]);

        $task = Task::find($id);
        $task->title = $request->title;
        $task->save();
        $aid = Auth::id();
        
        
        $tasks = Task::where('user_id',$aid)->get();
        
        

        return redirect()->route('home')->with('message','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $task = Task::find($id);
        $task->delete();
        $aid = Auth::id();
        
        
        $tasks = Task::where('user_id',$aid)->get();
        
        

        return redirect()->route('home')->with('message','success');
    }
}
