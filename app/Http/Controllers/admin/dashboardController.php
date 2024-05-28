<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\authorizationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class dashboardController extends authorizationController
{
    public function __construct() {

    }
    public function index() {
        $inst = new authorizationController('showMain',110);
        $access = $inst->checkAccess();
        var_dump($access);
        return view('dashboard.main');
    }

    public function akun() {
        $userData = auth()->user();
        return view('dashboard.adminAkun',['user' => $userData]);
    }

    public function edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'password' => 'nullable|string|min:8|max:255',
            'konfirm' => 'nullable|string|min:8|max:255'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        if ($request->password !== $request->konfirm) {
            $validator->getMessageBag()->add('konfirm', 'Konfirmasi password tidak cocok');
            return ResponseFormatter::error(null, $validator->errors(), 422);
        };

        try {
            $pengguna = User::where('username',auth()->user()->username);

            $pengguna->update([
                'name' => $request->nama,
                'username' => $request->username,
                'password' => hash::make(strval($request->password))
            ]);

            return ResponseFormatter::success($pengguna, "Data Pengguna Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }
}
