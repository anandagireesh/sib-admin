<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role == 'admin'){

                return redirect('/');
            }

        return redirect()->back()->with('loginerr','User doesnot exist');
        }


        return redirect()->back()->with('loginerr','User doesnot exist');
    }
}
