<?php

namespace App\Http\Controllers;

use App\Models\DvdAudio;
use App\Http\Resources\DvdaudioResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DvdaudioController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data dvdaudio
     */
    public function index()
    {
        // ambil semua data dvdaudio
        // $dvdaudios = ....

        // return koleksi dvdaudio
        // return ....
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data dvdaudio baru
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

        // Buat data dvdaudio
        // $dvdaudio = ....

        // return dvdaudio yang dibuat sebagai resource
        // return ....

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data dvdaudio berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....

        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // return dvdaudio sebagai resource
        // return ....
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data dvdaudio yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            
        ]);

        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....

        if (!$dvdaudio) {
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

        // Update data dvdaudio
        // $dvdaudio->....

        // return dvdaudio yang diupdate sebagai resource
        // return ....
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data dvdaudio
     */
    public function destroy(string $id)
    {
        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....

        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            ], 404);
        }

        // Hapus data dvdaudio
        // $dvdaudio->....

        // return message sukses
        // return ....
    }
}
