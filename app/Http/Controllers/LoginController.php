<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    function login(): Response
    {
        return response()->view("login.login", [
            "title" => "Login Page"
        ]);
    }

    function doLogin(Request $request)
    {
        //input validasi
        $user = $request->validate([
            'hpsim' => 'required|numeric|min:11',
            'password' => 'required| min:4| max:7',
        ]);


        //Autentikasi login menggunakan nomor telepon/nomor SIM
        if (Auth::attempt(['nomor_telepon' => $user['hpsim'], 'password' => $user['password']])) {
            return redirect()->route('dashboard');
        } else if (Auth::attempt(['nomor_sim' => $user['hpsim'], 'password' => $user['password']])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->withErrors('Login akun Gagal');
        }
    }
}
