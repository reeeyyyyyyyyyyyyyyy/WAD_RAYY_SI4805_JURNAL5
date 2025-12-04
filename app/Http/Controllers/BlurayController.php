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
        $blurays = Bluray::all();

        // return koleksi bluray
        return BlurayResource::collection($blurays);
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data bluray baru
     */
    public function store(Request $request)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'director' => 'nullable|string',
            'year' => 'required',
            
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => 'Please check your request'()
            ], 422);
        }

        // Buat data bluray
        $bluray = Bluray::create($validator->validated());

        // return bluray yang dibuat sebagai resource
        return (new BlurayResource($bluray))
                ->additional (['message' => 'Bluray created successfully'])
                ->response()
                ->setStatusCode(201);
    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data bluray berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data bluray berdasarkan ID
        $bluray = Bluray::find($id);

        if (!$bluray) {
            return response()->json([
                'success' => false,
                'message' => 'Bluray not found'
            ], 404);
        }

        // return bluray sebagai resource
        return new BlurayResource($bluray);
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data bluray yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'director' => 'nullable|string',
            'year' => 'required',
        ]);

        // Cari data bluray berdasarkan ID
        $bluray = Bluray::find($id);

        if (!$bluray) {
            return response()->json([
                'success' => false,
                'message' => 'Bluray not found'
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => 'Please check your request'
            ], 422);
        }

        // Update data bluray
        $bluray->update($validator->validated());

        // return bluray yang diupdate sebagai resource
        return (new BlurayResource($bluray))
                    ->additional (['message' => 'Bluray update successfully'])
                    ->response()
                    ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data bluray
     */
    public function destroy(string $id)
    {
        // Cari data bluray berdasarkan ID
        $bluray = Bluray::find($id);


        if (!$bluray) {
            return response()->json([
                'success' => false,
                'message' => 'Bluray not found!'
            ], 404);
        }

        // Hapus data bluray
        $bluray->delete();

        // return message sukses
        return response()->json(['massage' => 'Bluray deleted successfully'], 200);
    }
}
