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

        $title = 'Living Tower';

        return view('users.index', compact('title', 'users'));
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
