<?php

namespace App\Http\Controllers;

use App\User;
use App\Profession;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        // One way
        $users = User::paginate(15);
        return view('users.index', compact('users'));

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
        /* This user will not be saved, it is only useful for creation
        and editing views that work in the same way. The component to represent
        a form will always receive a user (empty or not) to create and edit
        views respectively */
        $user = User::make([
            'name' => '',
            'email' => '',
            'password' => '',
            'profession_id' => '',
        ]);

        $professions = Profession::all()->sortBy('title');

        return view('users.create', compact('professions', 'user'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'profession_id' => '',
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'profession_id'=> $data['profession_id'],
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $professions = Profession::all()->sortBy('title');

        return view('users.edit', compact('user', 'professions'));
    }
}
