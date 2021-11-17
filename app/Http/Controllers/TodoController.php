<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statusComplete(Todo $todo, $id)
    {
        $todo = Todo::find($id);
        $todo->status = 0;
        $todo->save();
        return back();
    }

    public function statusActive(Todo $todo, $id)
    {
        $todo = Todo::find($id);
        $todo->status = 1;
        $todo->save();
        return back();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = auth()->user()->id;
        $todo = $request->get('todo');
        Todo::create([
            "user_id" => $userId,
            "todo" => $todo,
            "status" => 1
        ]);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        $userId = auth()->user()->id;
        $todos = Todo::where('user_id', $userId)->where('status', 1)->orderBy('id', 'DESC')->simplePaginate(10);
       
        return view('todo.index', compact('todos'));
    }

    public function showComplete(){
        $userId = auth()->user()->id;
        $todos = Todo::where('user_id', $userId)->where('status', 0)->orderBy('id', 'DESC')->simplePaginate(10);
       
        return view('todo.completed-todo', compact('todos'));
    }

    public function allShowTodo(){
        $userId = auth()->user()->id;
        $todos = Todo::where('user_id', $userId)->orderBy('id', 'DESC')->simplePaginate(10);
       
        return view('todo.all-todo', compact('todos'));
    }

    public function activeShowTodo(){
        $userId = auth()->user()->id;
        $todos = Todo::where('user_id', $userId)->where('status', 1)->orderBy('id', 'DESC')->simplePaginate(10);
       
        return view('todo.active-todo', compact('todos'));
    }

    public function search(Request $request){
        $search = $request->get('search');
        $todos = DB::table('todos')->where('todo','LIKE','%'.$search.'%')->simplePaginate(10);
        return view('todo.search-todo', compact('todos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo, $id)
    {   
        $todo = Todo::find($id);
        return view('todo.update-todo', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        $todo = Todo::find($request->get('id'));
        $todo->todo = $request->get('todo');

        $todo->save();

        return back()->with('todo_updated', 'Post has been updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo, $id)
    {
        try {
            $post= $todo->findOrFail($id);
            $post->delete();                
                                            
                                    
            return back()->with('success', 'Veri başarıyla silindi');

           
           } catch (ModelNotFoundException $e) {
             return back()->with('unsuccessful', 'Veri bulunamadı');
             
           }
    }
}
