<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
    public function __invoke($locale)
    {
        /* Set the language ($locale) to application in the session.
           The middleware "Localization" will set the language selected
           in each request*/
        session()->put('locale', $locale);
        return back();
    }
}
