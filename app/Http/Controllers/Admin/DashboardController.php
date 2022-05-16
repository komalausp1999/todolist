<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function index(){
        $users=DB::table('users')
        ->join('todos','users.id','=','todos.user_id')->get();
        // var_dump($users);
            
        return view('admin.dashboard',compact('users'));
        
    }
}
