<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\artikel;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class artikelController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $dataArtikel = artikel::get();
            
            return ResponseFormatter::success($dataArtikel, "Data Artikel Received Successfuly!");
        }

        return view('dashboard.artikel');
    }

    public function storeArtikel(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $artikel = artikel::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return ResponseFormatter::success($artikel, "Data Artikel Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updateArtikel(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $artikel = artikel::find($request->id);
            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
            ]);

            return ResponseFormatter::success($artikel, "Data Artikel Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }
    
    public function deleteArtikel(Request $request){
        try{
            $artikel = artikel::find($request->id);
            $artikel->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
