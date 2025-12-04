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
        $dvdaudios = dvdaudio::all();
        return DvdaudioResource::collection($dvdaudios);
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
            'title'=> 'required|string|max:255',
            'artist'=> 'required|string|max:255',
            'year'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
                'message'=>'please check your request',
                'error'=>$validator->errors()
            ], 422);
        }

        // Buat data dvdaudio
        // $dvdaudio = ....
        $dvdaudios = Dvdaudio::create($validator->validated());
        
        // return dvdaudio yang dibuat sebagai resource
        // return ....
        return (new DvdaudioResource($dvdaudios))
        ->aditional(['messages'=> 'Dvdaudio created successfully'])
        ->response()
        ->setStatusCode(201);
    }

    /**
     * ===========3================
     * Buat fungsi show untuk menampilkan satu data dvdaudio berdasarkan ID
     */
    public function show(string $id)
    {
        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....
        $dvdaudio=Dvdaudio::find($id);

        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
            'message'=>'Dvdaudio not found'
            ], 404);
        }

        // return dvdaudio sebagai resource
        // return ....
        return new DvdaudioResources($dvdaudio);
    }

    /**
     * ===========4================
     * Buat fungsi update untuk mengubah data dvdaudio yang ada
     */
    public function update(Request $request, string $id)
    {
        // Request body berisi title, artist dan year
        $validator = Validator::make($request->all(), [
             'title'=> 'sometimes|required|string|max:255',
            'artist'=> 'sometimes|required|string|max:255',
            'year'=> 'sometimes|required',
        ]);

        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....
        $dvdaudio = Dvdaudio::find($id);
        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                // 'message' => ....
                 'message'=>'Dvdaudio not found'
            ], 404);
        }


        if ($validator->fails()) {
            return response()->json([
                // 'success' => false,
                // 'errors' => ....
                 'message'=>'please check your request',
                'error'=>$validator->errors()
            ], 422);
        }

        // Update data dvdaudio
        // $dvdaudio->....
        $dvdaudio->update($validator->validated());
        // return dvdaudio yang diupdate sebagai resource
        // return ....
        return (new DvdaudioResource($dvdaudio))
        ->aditional(['messages'=> 'Dvdaudio created successfully'])
        ->response()
        ->setStatusCode(201);
    }

    /**
     * ===========5================
     * Buat fungsi destroy untuk menghapus data dvdaudio
     */
    public function destroy(string $id)
    {
        // Cari data dvdaudio berdasarkan ID
        // $dvdaudio = ....
        $dvdaudio=Dvdaudio::find($id);
        if (!$dvdaudio) {
            return response()->json([
                // 'success' => false,
                 'message'=>'Dvdaudio not found'
            ], 404);
        }

        // Hapus data dvdaudio
        // $dvdaudio->....
        $dvdaudio->delete();
        // return message sukses
        // return ....
        return response()->json([
                 'message'=>'Dvdaudio deleted successfully'
            ], 200);
    }
}
