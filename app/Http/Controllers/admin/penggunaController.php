<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Encryption\DecryptException;

class penggunaController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            $dataPengguna = User::where('status',2)->get();

            // for($i = 0; $i < count($dataPengguna); $i++) {
            //     try {
            //         $decrypted = Crypt::decryptString($dataPengguna[$i]['password']);
            //         $dataPengguna[$i]['password'] = $decrypted;
            //     } catch (DecryptException $e) {
            //         return ResponseFormatter::error($e, "Gagal Mendapatkan Password!");
            //     }
            // }
            
            return ResponseFormatter::success($dataPengguna, "Data Pengguna Received Successfuly!");
        }
        return view('dashboard.pengguna');
    }

    public function storePengguna(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'pass' => 'required|string|min:8|max:255'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $pengguna = User::create([
                'name' => $request->nama,
                'username' => $request->username,
                'status' => 2,
                'password' => hash::make(strval($request->pass))
            ]);

            return ResponseFormatter::success($pengguna, "Data Pengguna Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updatePengguna(Request $request){
        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'pass' => 'nullable|string|min:8|max:255'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $pengguna = User::find($request->id);
            $pengguna->update([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => hash::make(strval($request->pass))
            ]);

            return ResponseFormatter::success($pengguna, "Data Pengguna Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }
    
    public function deletePengguna(Request $request){
        try{
            $pengguna = User::find($request->id);
            $pengguna->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
