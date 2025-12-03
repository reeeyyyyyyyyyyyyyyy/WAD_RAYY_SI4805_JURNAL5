<?php

namespace App\Http\Controllers;

use App\Models\Vinyl;
use App\Http\Resources\VinylResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VinylController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data vinyl
     */
    public function index()
    {
        // ambil semua data vinyl
        // $vinyls = ....

        // return koleksi vinyl
        // return ....
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data vinyl baru
     */
    public function store(Request $request)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
            ], 422);
        }

        // Buat data vinyl
        // $vinyl = ....

        // return vinyl yang dibuat sebagai resource
        // return ....

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data vinyl berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data vinyl berdasarkan ID
        // $vinyl = ....

        if (!$vinyl) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return vinyl sebagai resource
        // return ....
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data vinyl yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        // Cari data vinyl berdasarkan ID
        // $vinyl = ....

        if (!$vinyl) {
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

        // Update data vinyl
        // $vinyl->....

        // return vinyl yang diupdate sebagai resource
        // return ....
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data vinyl
     */
    public function destroy(string $id)
    {
        // Cari data vinyl berdasarkan ID
        // $vinyl = ....

        if (!$vinyl) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Hapus data vinyl
        // $vinyl->....

        // return message sukses
        // return ....
    }
}
