<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{

    function registrasi(): Response
    {
        return response()->view("registrasi.registrasi", [
            "title" => "Registrasi Page"
        ]);
    }

    //Kode melakukan registrasi
    function doRegistrasi(Request $request)
    {
        //input validasi
        $user = $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|numeric|min:11',
            'nomor_sim' => 'required|numeric',
            'password' => 'required| min:4| max:7 |confirmed',
            'password_confirmation' => 'required| min:4',
        ]);

        //hashing password
        $password = Hash::make($request->input('password'));
        $user['password'] = $password;

        //check jika nomor telepon dan sim telah terdaftar
        if (User::where('nomor_sim', '=', $request->nomor_sim)->exists() && User::where('nomor_telepon', '=', $request->nomor_telepon)->exists()) {
            return redirect()->back()->withErrors('Nomor Telepon & SIM telah terdaftar');
        } else if (User::where('nomor_telepon', '=', $request->nomor_telepon)->exists()) {
            return redirect()->back()->withErrors('Nomor Telepon telah terdaftar');
        } else if (User::where('nomor_sim', '=', $request->nomor_sim)->exists()) {
            return redirect()->back()->withErrors('Nomor SIM telah terdaftar');
        } else {
            //simpan data user ke database
            $register = User::create($user);
            if ($register) {
                # code...
                return redirect()->route('login')->withSuccess('Registrasi akun berhasil');
            } else {
                # code...
                return redirect()->back()->withErrors('Registrasi akun Gagal');
            }
        }
    }
}
