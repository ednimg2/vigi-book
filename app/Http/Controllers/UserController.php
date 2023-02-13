<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function show(): View|RedirectResponse
    {
        //PAKEICIAM I MIDDLEWARE
//        if (!Auth::user()) {
//            return redirect(route('login'));
//        }

        return view('user/show', ['user' => Auth::user()]);
    }
}
