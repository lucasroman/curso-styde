<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = [
                'Sub-Zero',
                'Reptile',
                'Scorpion',
                'Liu Kang',
                'Raiden',
                'Johnny Cage',
                'Kitana',
                'Shang Tsung',
            ];

        $title = 'Users list';

        return view('users', compact('title', 'users'));
    }

    public function show($id)
    {
        $title = "User's details";

        return view('user', compact('title', 'id'));
    }

    public function create()
    {
        $title = 'New user';

        return view('new', compact('title'));
    }

}
