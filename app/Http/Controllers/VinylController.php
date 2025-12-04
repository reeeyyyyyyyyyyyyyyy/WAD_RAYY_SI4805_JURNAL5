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
        $vinyls = Vinyl::all();

        // return koleksi vinyl
        return VinylResource::collection($vinyls);
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data vinyl baru
     */
    public function store(Request $request)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'artist'=> 'required|string|max:255',
            'year' => 'required|integer|max:4' . date('Y')
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please check your request',
                'errors' => $validator->errors()
            ], 422);
        }

        // Buat data vinyl
        $vinyl = Vinyl::create($validator->validated());

        // return vinyl yang dibuat sebagai resource
        return (new VinylResource($vinyl))
                    ->additional(['message' => 'New vinyl created successfully'])
                    ->response()
                    ->setStatusCode(201);
    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data vinyl berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data vinyl berdasarkan ID
        $vinyl = Vinyl::find($id);

        if (!$vinyl) {
            return response()->json([
                'success' => false,
                'message' => 'Vinyl not found'
            ], 404);
        }

        // return vinyl sebagai resource
        return new VinylResource($vinyl);
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data vinyl yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'artist'=> 'required|string|max:255',
            'year' => 'required|integer|max:4' . date('Y')
        ]);

        // Cari data vinyl berdasarkan ID
        $vinyl = Vinyl::find($id);

        if (!$vinyl) {
            return response()->json([
                'success' => false,
                'message' => "Vinyl not found"
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Please check your update',
                'errors' => $validator->errors()
            ], 422);
        }

        // Update data vinyl
        $vinyl-> update($validator->validated());

        // return vinyl yang diupdate sebagai resource
        return (new VinylResource($vinyl))
                    ->additional(['message' => 'Vinyl updated successfully'])
                    ->response()
                    ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data vinyl
     */
    public function destroy(string $id)
    {
        // Cari data vinyl berdasarkan ID
        $vinyl = Vinyl::find($id);

        if (!$vinyl) {
            return response()->json([
                'success' => false,
                'message' => "Vinyl not found"
            ], 404);
        }

        // Hapus data vinyl
        $vinyl->delete();

        // return message sukses
        return response()->json(['message' => 'Vinyl deleted successfully'], 200);
    }
}
