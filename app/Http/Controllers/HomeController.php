<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Rental;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    //fungsi autentikasi user saat login
    public function auth(Request $request): RedirectResponse
    {
        if (Auth::check()) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login');
        }
    }

    //fungsi menampilkan halaman dashboard
    function dashboard(Request $request)
    {

        $title = "Selamat Datang di Rental Car";
        $userId = Auth::user()->id;
        $username = Auth::user()->username;

        $rentals = Rental::with('mobil.user')->where('id_user', '=', $userId)->latest()->paginate(10);
        $pengembalians = Pengembalian::where('id_user', '=', $userId)->latest()->paginate(10);


        return view('main.dashboard', compact('title', 'username', 'rentals', 'pengembalians'));
    }

    function doLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
