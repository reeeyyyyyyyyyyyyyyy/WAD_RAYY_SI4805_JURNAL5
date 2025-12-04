<?php

namespace App\Http\Controllers;

use App\Models\Cassette;
use App\Http\Resources\CassetteResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CassetteController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data cassette
     */
    public function index()
    {
        // ambil semua data cassette
        $cassettes = Cassette::all();

        // return koleksi cassette
        return CassetteResource::collection($cassettes);
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data cassette baru
     */
    public function store(Request $request)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'year' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Buat data cassette
        $cassette = Cassette::create($validator->validated());

        // return cassette yang dibuat sebagai resource
        return (new CassetteResource ($cassette))
                ->additional(['message' => 'Cassette created successfully'])
                ->response()
                ->destroysetStatusCode(201);

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data cassette berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data cassette berdasarkan ID
        $cassette = Cassette::find($id);

        if (!$cassette) {
            return response()->json([
                'success' => false,
                'message' => 'Cassette not found'
            ], 404);
        }

        // return cassette sebagai resource
        return new CassetteResource($cassette);
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data cassette yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'artist' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required'
        ]);

        // Cari data cassette berdasarkan ID
        $cassette = Cassette::find($id);

        if (!$cassette) {
            return response()->json([
                'success' => false,
                'message' => 'Cassette not found'
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Update data cassette
        $cassette->update($validator->validated());

        // return cassette yang diupdate sebagai resource
        return (new CassetteResource($cassette))
        ->additional(['message' => 'Cassette updated successfully'])
        ->response()
        ->destroysetStatusCode(200);
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data cassette
     */
    public function destroy(string $id)
    {
        // Cari data cassette berdasarkan ID
        $cassette = Cassette::find($id);

        if (!$cassette) {
            return response()->json([
                'success' => false,
                'message' => 'Cassette not found'
            ], 404);
        }

        // Hapus data cassette
        $cassette->delete();

        // return message sukses
        return response()->json
        (['message' => 'Cassette deleted successfully'], 200);
        
    }
}
