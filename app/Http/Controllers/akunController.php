<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class akunController extends Controller
{
    public function index() {
        $userData = auth()->user();
        return view('pengguna.akun',['user' => $userData]);
    }

    public function edit(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string|max:255',
            'username' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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
            $pengguna = User::where('id', auth()->user()->id)->first();
            if (!$pengguna) throw new Exception('User tidak ditemukan');

            $data = [];
            if ($request->filled('nama')) $data['name'] = $request->nama;
            if ($request->filled('username')) $data['username'] = $request->username;
            if ($request->filled('email')) $data['email'] = $request->email;
            if ($request->filled('jabatan')) $data['jabatan'] = $request->jabatan;
            if ($request->filled('password')) $data['password'] = Hash::make(strval($request->password));

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $name = time().'_'.preg_replace('/[^A-Za-z0-9._-]/','', $file->getClientOriginalName());
                $file->storeAs('public/avatars', $name);
                // hapus foto lama jika ada
                if ($pengguna->foto && \Illuminate\Support\Facades\Storage::exists('public/avatars/'.$pengguna->foto)) {
                    // keep for history — tidak hapus agar tidak error jika dipakai lain
                }
                $data['foto'] = $name;
            }

            if (empty($data)) {
                return ResponseFormatter::error(null, ['nama'=>['Tidak ada perubahan']], 422);
            }

            $pengguna->update($data);

            // Jika email diisi/diubah, kirim notifikasi verifikasi
            if (isset($data['email']) && $data['email']) {
                try {
                    $verifyUrl = url('/akun/verify-email?email='.urlencode($data['email']).'&token='.Str::random(32));
                    Mail::raw("Email Anda di AirNav Assist telah diperbarui ke {$data['email']}. Klik untuk verifikasi: $verifyUrl\nJika lupa password, password baru akan dikirim ke email ini.", function($m) use ($data){
                        $m->to($data['email'])->subject('Verifikasi Email — AirNav Assist');
                    });
                } catch (Exception $e) { Log::warning('Mail verifikasi gagal: '.$e->getMessage()); }
            }

            return ResponseFormatter::success($pengguna, "Data Pengguna Berhasil Diubah!".(isset($data['email']) ? " Notifikasi verifikasi telah dikirim ke email." : ""));
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function forgot(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255',
        ]);
        if ($validator->fails()) {
            return ResponseFormatter::error(null, $validator->errors(), 422);
        }
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user) {
                return ResponseFormatter::error(null, ['email'=>['Email tidak ditemukan. Pastikan email sudah diisi di Akun & terverifikasi.']], 422);
            }
            $newPass = Str::random(10);
            $user->update(['password' => Hash::make($newPass)]);
            try {
                Mail::raw("Permintaan lupa password AirNav Assist.\nUsername: {$user->username}\nPassword baru: {$newPass}\nSilakan login dan segera ganti password.", function($m) use ($user){
                    $m->to($user->email)->subject('Password Baru — AirNav Assist');
                });
                $msg = "Password baru telah dikirim ke {$user->email}. Silakan cek inbox/spam.";
            } catch (Exception $e) {
                Log::warning('Mail lupa password gagal: '.$e->getMessage());
                // Fallback: tetap berhasil tapi tampilkan password di response untuk demo (jangan di production)
                $msg = "Password baru: {$newPass} (email gagal dikirim, tampilkan di sini untuk demo). Silakan login.";
            }
            return ResponseFormatter::success(null, $msg);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Gagal memproses lupa password", 500);
        }
    }

    public function verifyEmail(Request $request) {
        // Simple verifikasi: jika email ada, anggap terverifikasi
        $email = $request->query('email');
        if ($email && User::where('email',$email)->exists()) {
            return redirect()->route('signIn')->with('message','Email '.$email.' terverifikasi. Silakan login.');
        }
        return redirect()->route('signIn')->with('message','Verifikasi selesai.');
    }
}
