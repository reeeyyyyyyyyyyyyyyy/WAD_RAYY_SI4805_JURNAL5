<?php

namespace App\Http\Controllers;

use App\Models\Vhs;
use App\Http\Resources\VhsResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VhsController extends Controller
{
    /**
     * ===========1================
     * Buat fungsi index yang mengembalikan semua data vhs
     */
    public function index()
    {
        // ambil semua data vhs
        // $vhss = ....

        // return koleksi vhs
        // return ....
        $vhss = Vhs::all();
        return VhsResource::collection($vhss);
    }

    /**
     * ===========2================
     * Buat fungsi store untuk menambahkan data vhs baru
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
                'errors' => 'Please check your request'
            
            ], 422);
        }

        // Buat data vhs
        $vhs = Vhs::create($validator->validated());

        // return vhs yang dibuat sebagai resource
        return (new VhsResource($vhs))
        ->additional(['message'=> 'Vhs created sucessfully!'])
        ->response()
        ->setStatusCode(201);

    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data vhs berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data vhs berdasarkan ID
        $vhs = Vhs::find($id);

        if (!$vhs) {
            return response()->json([
                'success' => false,
                'message' => 'Vhs not found!'
            ], 404);
        }

        // return vhs sebagai resource
        return new VhsResource($vhs);
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data vhs yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, director dan year
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'director' => 'nullable|string',
            'year' => 'required',
        ]);

        // Cari data vhs berdasarkan ID
        $vhs = Vhs::find($id);

        if (!$vhs) {
            return response()->json([
                'success' => false,
                'message' => 'vhs not found!'
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => 'Please check your request!'
            ], 422);
        }

        //Update data vhs
        $vhs->update($validator->validated());

        // return vhs yang diupdate sebagai resource
        return (new VhsResource($vhs))
        ->additional(['message'=> 'Vhs updated sucessfully!'])
        ->response()
        ->setStatusCode(200);
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data vhs
     */
    public function destroy(string $id)
    {
        // Cari data vhs berdasarkan ID
        $vhs = Vhs::find($id);

        if (!$vhs) {
            return response()->json([
                'success' => false,
                'message' => 'Vhs not found!'
            ], 404);
        }

        // Hapus data vhs
        $vhs->delete();

        // return message sukses
        return response()->json(['message' => 'Vhs deleted successfully!'],200);
    }
}
