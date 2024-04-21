<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\artikel;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class artikelController extends Controller
{
    public function indexArtikel(Request $request) {
        // if ($request->ajax()) {
        //     $dataArtikel = artikel::get();
            
        //     return ResponseFormatter::success($dataArtikel, "Data Artikel Received Successfuly!");
        // }

        $postArtikel = artikel::get();

        return view('dashboard.artikel',['postArtikel' => $postArtikel]);
    }

    public function storeArtikel(Request $request){
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file' => 'required|mimes:png,jpg,jpeg|max:5120', // 5 MB = 5120 KB
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $file = $request->file('file');
            $storage = Storage::putFileAs('public/artikel', $file, time() . '_' .  $file->getClientOriginalName());

            $artikel = artikel::create([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file' => time() . '_' . $request->file->getClientOriginalName(),
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
            'file' => 'mimes:png,jpg,jpeg|max:5120', // 5 MB = 5120 KB
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $file = $request->file('file');
            $storage = Storage::putFileAs('public/artikel', $file, time() . '_' .  $file->getClientOriginalName());

            $artikel = artikel::find($request->id);

            // hapus file sebelum update
            $deteleFile = Storage::delete('public/artikel/'.$artikel->file);

            $artikel->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'file' => time() . '_' . $request->file->getClientOriginalName(),
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
            $deteleFile = Storage::delete('public/artikel/'.$artikel->file);
            $artikel->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
