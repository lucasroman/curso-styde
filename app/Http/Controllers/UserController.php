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
        return "User's detail: {$id}";
    }

    public function create()
    {
        return 'Create new user';
    }

}
