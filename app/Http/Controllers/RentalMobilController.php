<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class RentalMobilController extends Controller
{
    //

    function index(): Response
    {
        $userId = Auth::user()->id;

        return response()->view("main.rental_mobil", [
            "title" => "Rental mobil",
            'cars' => Mobil::where('id_user', '!=', $userId)->latest()->paginate(10)

        ]);
    }


    function doBooking(Request $request)
    {
        // Validasi input dari form pemesanan mobil
        $dataBooking = $request->validate([
            'tanggal_selesai' => 'required|after_or_equal:tanggal_mulai',
            'tanggal_mulai' => 'required|',
            'id_mobil' => 'required|exists:mobils,id'
        ]);

        $dataBooking['id_user'] = Auth::user()->id;

        // Cek ketersediaan mobil pada tanggal yang diminta
        $tanggalMulai = $request->input('tanggal_mulai');
        $tanggalSelesai = $request->input('tanggal_selesai');
        $idMobil = $request->input('id_mobil');

        $isAvailable = Rental::where('id_mobil', $idMobil)
            ->where(function ($query) use ($tanggalMulai, $tanggalSelesai) {
                $query->whereBetween('tanggal_mulai', [$tanggalMulai, $tanggalSelesai])
                    ->orWhereBetween('tanggal_selesai', [$tanggalMulai, $tanggalSelesai]);
            })
            ->doesntExist();


        if (!$isAvailable) {

            return redirect()->back()->withErrors('Mobil tidak tersedia pada tanggal yang diminta');
        } else {
            Rental::create($dataBooking);
            return redirect()->back()->withSuccess('Mobil berhasil ditambahkan');
        }
    }
}
