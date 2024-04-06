<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Pengembalian;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class PengembalianMobilController extends Controller
{
    function index(): Response
    {
        $userId = Auth::user()->id;

        return response()->view("main.pengembalian_mobil", [
            "title" => "Pengembalian mobil",
            'cars' => [] // Set variabel $cars menja
        ]);
    }

    function cekMobil(Request $request)
    {
        $userId = Auth::user()->id;

        $request->validate([
            'plat_nomor' => 'required',
        ]);
        $platNomor = $request->input('plat_nomor');
        // Cek apakah mobil dengan plat nomor yang dimasukkan ada dalam database
        $cars
            =
            Rental::select('rentals.*')
            ->join('mobils', 'rentals.id_mobil', '=', 'mobils.id')
            ->join('users', 'mobils.id_user', '=', 'users.id')
            ->where('mobils.plat_nomor', $platNomor)
            ->where('rentals.id_user', $userId)
            ->get();


        if ($cars->isEmpty()) {
            // Jika mobil tidak ditemukan, berikan pesan atau lakukan tindakan sesuai kebutuhan Anda
            return response()->view("main.pengembalian_mobil", [
                "title" => "Pengembalian mobil",
                'cars' => [],
                'errorMessage' => 'Data mobil gagal ditemukan, coba masukkan plat nomor yang benar' // Add an error message
            ]);
        } else {
            // Jika mobil ditemukan, tampilkan informasi atau lakukan tindakan sesuai kebutuhan Anda
            return response()->view("main.pengembalian_mobil", [
                "title" => "Pengembalian mobil",
                'cars' => $cars,
                'successMessage' => 'Data mobil berhasil ditemukan' // Add a success message
            ]);
        }
    }

    function doReturn(Rental $rental, Request $request)
    {
        $dataPengembalian = $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat_nomor' => 'required',
            'harga_perhari' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'jumlah_hari' => 'required',
            'total_tarif' => 'required',
        ]);

        $dataPengembalian['id_user'] = Auth::user()->id;
        $simpanData = Pengembalian::create($dataPengembalian);
        // Retrieve rental data based on plat_nomor
        $rental->delete($request->input('id'));


        if ($simpanData) {

            return redirect()->back()->withSuccess('Mobil berhasil dikembalikan');
        } else {
            return redirect()->back()->withErrors('Gagal mengembalikan mobil');
        }
    }
}
