<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PageController
{
    public function logout()
    {
        Auth::logout();
        return view('welcome');
    }
}