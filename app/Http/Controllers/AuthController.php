<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {

            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('pegawai.index');
            }
        } 
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $password = $request->input('password');
        $email = $request->input('email');

        $data = [
            'email'     => $email,
            'password'  => $password,
        ];

        Auth::attempt($data);

        if (Auth::check()) {

            if (Auth::user()->level == 'admin') {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('pegawai.index');
            }
        } else {
            return redirect()->back()->with('failed', 'Login Gagal');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('auth.index');
    }
}
