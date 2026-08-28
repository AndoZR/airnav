<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\User;
use App\Models\airport;
use App\Models\Artikel;
use App\Models\test;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\authorizationController;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class dashboardController extends authorizationController
{
    public function __construct() {

    }
    public function index() {
        $stats = [
            'airport' => airport::count(),
            'artikel' => Artikel::count(),
            'test' => test::count(),
            'testAktif' => test::where('status', 1)->count(),
            'pengguna' => User::where('status', 4)->count(),
            'karyawan' => DB::table('karyawan')->count(),
            'divisi' => DB::table('divisi')->count(),
        ];
        $recentAirport = airport::orderByDesc('id')->limit(5)->get();
        $recentArtikel = Artikel::orderByDesc('id')->limit(5)->get();
        $recentTest = test::orderByDesc('id')->limit(5)->get();
        $recentUsers = User::where('status', 4)->orderByDesc('id')->limit(5)->get();

        return view('dashboard.main', compact('stats', 'recentAirport', 'recentArtikel', 'recentTest', 'recentUsers'));
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
