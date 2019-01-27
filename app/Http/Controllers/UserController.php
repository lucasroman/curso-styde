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
        $professions = Profession::all()->sortBy('title');

        return view('users.create', compact('professions'));
    }

    public function store()
    {
        $data = request()->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'profession_id'=> $data['profession_id'],
        ]);

        return redirect()->route('users.index');
    }
}
