<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index(){
  //fetching the data of a particular user by his Id
       $todos= Todo::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('home',['todos'=>$todos]);
    }
    public function add(Request $request){
        /**Checks if the request is ajax or not */
        if($request->ajax()){
           
            $todo = new Todo;
            $todo->user_id=Auth::id();
            $todo->title = $request->title;
            $todo->save();
            $last_todo = Todo::where('id',$todo->id)->get();
            return view('ajaxData',['todos'=>$last_todo]);
        }
    }
    // public function update(Request $request, $id){
    //     if($request->ajax()){
    //         $todo = Todo::find($id);
    //         $todo->title = $request->title;
    //         $todo->save();
    //         return "OK";
    //     }
    // }
    public function delete(Request $request,$id){
        if($request->ajax()){
            $todo = Todo::find($id);
            $todo->delete();
            return "OK";
        }
    }
    public function done(Request $request,$id){
        if($request->ajax()){
            $todo = Todo::find($id);
            $todo->status = 1;
            $todo->save();
            return "OK";
        }
    }


}