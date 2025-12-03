<?php

namespace App\Http\Controllers;

use App\Models\Bluray;
use App\Http\Resources\BlurayResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlurayController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data bluray
     */
    public function index()
    {
        // ambil semua data bluray
        // $blurays = ....

        // return koleksi bluray
        // return ....
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data bluray baru
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

        // Buat data bluray
        // $bluray = ....

        // return bluray yang dibuat sebagai resource
        // return ....

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data bluray berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data bluray berdasarkan ID
        // $bluray = ....

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return bluray sebagai resource
        // return ....
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data bluray yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        // Cari data bluray berdasarkan ID
        // $bluray = ....

        if (!$bluray) {
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

        // Update data bluray
        // $bluray->....

        // return bluray yang diupdate sebagai resource
        // return ....
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data bluray
     */
    public function destroy(string $id)
    {
        // Cari data bluray berdasarkan ID
        // $bluray = ....

        if (!$bluray) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Hapus data bluray
        // $bluray->....

        // return message sukses
        // return ....
    }
}
