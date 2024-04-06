<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class ManajemenMobilController extends Controller
{
    function index(): Response
    {

        $userId = Auth::user()->id;

        return response()->view("main.manajemen_mobil", [
            "title" => "Manajemen mobil",
            'cars' => Mobil::where('id_user', $userId)->latest()->paginate(10)

        ]);
    }


    //Menambahkan data mobil
    function store(Request $request)
    {
        $dataMobil = $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat_nomor' => 'required',
            'harga_perhari' => 'required',
        ]);

        $dataMobil['status_sewa'] = false;
        $dataMobil['id_user'] =
            Auth::user()->id;

        $simpanData = Mobil::create($dataMobil);
        if ($simpanData) {
            return redirect()->back()->withSuccess('Mobil berhasil ditambahkan');
        } else {
            return redirect()->back()->withErrors('Gagal menambahkan mobil');
        }
    }


    //Mengedit data mobil
    function update(Mobil $mobil, Request $request)
    {
        $dataMobil = $request->validate([
            'merk' => 'required',
            'model' => 'required',
            'plat_nomor' => 'required',
            'harga_perhari' => 'required',
        ]);

        $dataMobil['status_sewa'] = false;
        $dataMobil['id_user'] =
            Auth::user()->id;

        $updateData = $mobil->update($dataMobil);
        if ($updateData) {
            return redirect()->back()->withSuccess('Mobil berhasil diupdate');
        } else {
            return redirect()->back()->withErrors('Gagal update mobil');
        }
    }


    //Menghapus data mobil
    public function destroy(Mobil $mobil): RedirectResponse
    {
        $mobil->delete();
        return back()->withSuccess('Mobil berhasil dihapus');
    }

    function search(Request $request)
    {
        $userId = Auth::id(); // Assuming you're using authentication

        $request->validate([
            'search_mobil' => 'required',
        ]);

        $searchInput = $request->input('search_mobil');
        // Query mobil based on either model or merk
        $mobil = Mobil::where('id_user', $userId)
            ->where(function ($query) use ($searchInput) {
                $query->where('model', 'like', "%$searchInput%")
                    ->orWhere('merk', 'like', "%$searchInput%");
            })
            ->latest()
            ->paginate(10);

        if ($mobil->isEmpty()) {
            // Jika mobil tidak ditemukan, berikan pesan atau lakukan tindakan sesuai kebutuhan Anda
            return response()->view("main.manajemen_mobil", [
                "title" => "Manajemen mobil",
                'cars' => [],
                'errorMessage' => 'Data mobil yang anda cari tidak ditemukan' // Add an error message
            ]);
        } else {
            // Jika mobil ditemukan, tampilkan informasi atau lakukan tindakan sesuai kebutuhan Anda
            return response()->view("main.manajemen_mobil", [
                "title" => "Manajemen mobil",
                'cars' => $mobil,
                'successMessage' => 'Data mobil berhasil ditemukan' // Add a success message
            ]);
        }
    }
}
