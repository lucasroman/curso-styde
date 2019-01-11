<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        // One way
        // $users = User::all();
        // $title = 'Living Tower';
        // return view('users.index', compact('title', 'users'));

        // Other way
        return view('users.index')->with([
                                        'title' => 'Living Tower',
                                        'users' => User::all()
                                        ]);
    }

    public function show($id)
    {
        return view('users.show', compact('id'));
    }

    public function create()
    {
        return view('users.new');
    }

}
