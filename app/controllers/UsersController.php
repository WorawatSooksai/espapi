<?php

namespace App\Controllers;

use App\Models\User;
use Leaf\Helpers\Password;
use Leaf\Auth;

class UsersController extends Controller
{
    public function index()
    {
        response()->json([
            'message' => 'UsersController@index output'
        ]);
    }
    public function register(){

        $reg = User::insert([
            "username" => app()->request()->get('username'),
            "fullname" => app()->request()->get('fullname'),
            "email" => app()->request()->get('email'),
            "password" => Password::hash(app()->request()->get('password')),
          ]);
        response()->json([
            'user' => $reg
        ]);
    }
    public function login(){
        Auth::connect("localhost",
        "db652021xxx",
        "root",
        "",
        "mysql");
        $login = auth()->login([
            'email' => app()->request()->get('email'),
            'password' => app()->request()->get('password')
        ]);
        response()->json([
            'user'=>$login
        ]);
        
    }
}
