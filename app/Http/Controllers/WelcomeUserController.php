<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeUserController extends Controller
{
    public function __invoke($name, $nickname = null)
    {
        // Convert "nAmE" to "Name"
        $name = ucfirst(strtolower($name));

        if ($nickname) {
            $nickname = ucfirst(strtolower($nickname));
            return "Welcome user {$name} your nickname is '{$nickname}'.";
        } else {
            return "Welcome user {$name} you have not nickname.";
        }
    }
}
