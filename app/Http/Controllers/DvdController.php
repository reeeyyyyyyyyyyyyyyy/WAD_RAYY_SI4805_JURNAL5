<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Http\Resources\DvdResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DvdController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data dvd
     */
    public function index()
    {
        // ambil semua data dvd
        // $dvds = ....

        // return koleksi dvd
        // return ....
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data dvd baru
     */
    public function store(Request $request)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Buat data dvd
        // $dvd = ....

        // return dvd yang dibuat sebagai resource
        // return ....

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data dvd berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data dvd berdasarkan ID
        // $dvd = ....

        if (!$dvd) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return dvd sebagai resource
        // return ....
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data dvd yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        // Cari data dvd berdasarkan ID
        // $dvd = ....

        if (!$dvd) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Update data dvd
        // $dvd->....

        // return dvd yang diupdate sebagai resource
        // return ....
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data dvd
     */
    public function destroy(string $id)
    {
        // Cari data dvd berdasarkan ID
        // $dvd = ....

        if (!$dvd) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Hapus data dvd
        // $dvd->....

        // return message sukses
        // return ....
    }
}
