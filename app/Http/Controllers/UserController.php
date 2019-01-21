<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {
        // One way
        $users = User::paginate(15);
        $title = 'Living Tower';
        return view('users.index', compact('title', 'users'));

        // Another way
        // return view('users.index')->with([
        //                                 'title' => 'Living Tower',
        //                                 'users' => User::all(),
        //                                 ]);
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store()
    {
        return 'Processing information...';
    }
}
