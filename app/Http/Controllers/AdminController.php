<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index(){
        $users = User::all();
        return view('admin.admin', compact('users'));
    }

    public function userTodo(Request $request){
        $id = $request->get('user_id');
        $todos = Todo::where('user_id', $id)->get();
        return view('admin.user-todo', compact('todos'));
    }

}
