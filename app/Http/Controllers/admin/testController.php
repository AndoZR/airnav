<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\soal;
use App\Models\test;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\hasilTest;
use App\Models\jawaban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class testController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()){
            $dataTest = test::get();

            return ResponseFormatter::success($dataTest,"Data Ujian Received Successfuly!");
        }
        return view('dashboard.test');
    }

    public function activeTest(Request $request) {
        try{
            $soal = soal::where('id_test',$request->id)->first();
            if($soal == null){
                return ResponseFormatter::error($soal,"Soal belum dibuat!",422);
            }else{
                $active = test::find($request->id);
                $active->update([
                    'status' => $request->status
                ]);
    
                return ResponseFormatter::success($active,"Status berhasil diubah!");
            }
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::success($e->getMessage(),"Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function storeTest(Request $request) {
        $validator = Validator::make($request->all(), [
            'subjek' => 'required|string',
            'durasi' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $test = test::create([
                'subjek' => $request->subjek,
                'durasi' => $request->durasi,
                'status' => 0,
            ]);

            return ResponseFormatter::success($test, "Data Ujian Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updateTest(Request $request){
        $validator = Validator::make($request->all(), [
            'subjek' => 'required|string',
            'durasi' => 'required',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $test = test::find($request->id);
            $test->update([
                'subjek' => $request->subjek,
                'durasi' => $request->durasi,
            ]);

            return ResponseFormatter::success($test, "Data Ujian Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }
    
    public function deleteTest(Request $request){
        try{
            $test = test::find($request->id);
            $test->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }

    public function soalIndex($id, Request $request) {
        $status = test::where('id',$id)->first();
        if($request->ajax()){
            $soal = soal::with('test')->where('id_test', $id)->get();
            return ResponseFormatter::success($soal,"Data Pertanyaan Received Successfuly!");
        }else{
            return view('dashboard.soal', ['id' => $id, 'status' => $status->status]);
        }
    }

    public function getJawaban($id, Request $request) {
        if($request->ajax()){
            $jawaban = jawaban::where('id_soal', $id)->get();
            return ResponseFormatter::success($jawaban,"Data Jawaban Received Successfuly!");
        }
    }

    public function storeSoal(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'pertanyaan' => 'required|string',
            'jawaban' => 'required',
            'correct' => 'required',
        ],[
            'correct.required' => 'Opsi yang benar belum dipilih!'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $correct = $request->correct;
            $soal = soal::create([
                'id_test' => $id,
                'pertanyaan' => $request->pertanyaan,
            ]);

            foreach ($request->jawaban as $item) {
                $nilai = ($item == $correct) ? 1 : 0;
                $jawaban = jawaban::create([
                    'id_soal' => $soal->id,
                    'jawaban' => $item,
                    'nilai' => $nilai,
                ]);
            }
            return ResponseFormatter::success($soal, "Data Soal Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    // public function updateSoal(Request $request){
    //     $validator = Validator::make($request->all(), [
    //         'subjek' => 'required|string|max:255',
    //         'durasi' => 'required',
    //     ]);

    //     if ($validator->fails()) {
    //         return ResponseFormatter::error(null,$validator->errors(),422);
    //     };

    //     try {
    //         $test = test::find($request->id);
    //         $test->update([
    //             'subjek' => $request->subjek,
    //             'durasi' => $request->durasi,
    //         ]);

    //         return ResponseFormatter::success($test, "Data Ujian Berhasil Diubah!");
    //     } catch (Exception $e) {
    //         Log::error($e->getMessage());
    //         return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
    //     }
    // }
    
    public function deleteSoal(Request $request){
        try{
            $soal = soal::find($request->id);
            $soal->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }


    // SESI PENGGUNA

    public function userIndex() {
        $test = test::with('hasilTest')->where('status',1)->get();
        // dd($test);
        return view('pengguna.test', ['test'=>$test]);
    }

    public function mulai($id) {
        $durasi = test::where('id',$id)->value('durasi');

        $cek = hasilTest::where('id_Test', $id)
        ->where('id_user', Auth::user()->id)
        ->first();

        if ($cek == null){
            $hasil = hasilTest::create([
                'id_test' => $id,
                'id_user' => Auth::user()->id,
                'waktu_mulai' => now(),
            ]);

            $dataTest = soal::with('jawaban')->where('id_test',$id)->get();
            return view('pengguna.mulai',['dataTest'=>$dataTest, 'idTest'=>$id, 'idHasil'=>$hasil->id, 'durasi'=>$durasi]);
        } else if (!isset($cek->hasil)){
            $dataTest = soal::with('jawaban')->where('id_test',$id)->get();
            return view('pengguna.mulai',['dataTest'=>$dataTest, 'idTest'=>$id, 'idHasil'=>$cek->id, 'durasi'=>$durasi]);
        } else {
            $message = 'Anda sudah mengerjakan test!';
            return redirect()->route('test.userIndex')->with('message', $message);
        }
    }

    public function selesai($id, Request $request) {
        $jawabanDipilih = json_decode($request->input('jawabanDipilih'), true);

        $total = 0;
        foreach($request->except(['_token','idHasil','jawabanDipilih']) as $key => $item){
            $total += $item;
        }

        try{
            $hasil = hasilTest::where('id',$request->idHasil)->first();
            $hasil->update([
                'hasil' => $total*10,
                'waktu_selesai' => now(),
                'jawaban' => $jawabanDipilih
            ]);

            return ResponseFormatter::success($hasil, "Data hasil Test Berhasil Disimpan!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function lihatJawaban($id) {
        $dataSoal = soal::with('jawaban')->where('id_test',$id)->get();
        $hasil = hasilTest::where('id_test',$id)->value('jawaban');
        $jawabanArray = json_decode($hasil, true);
        return view('pengguna.lihatJawaban',['dataSoal'=>$dataSoal, 'idTest'=>$id, 'jawabanDipilih'=>$jawabanArray]);
    }

    // public function duration($id) {
    //     $test = Test::find($id);
    //     $waktuMulai = $test->waktuMulai;
    //     $durasi = $test->durasi;
    //     return ['waktuMulai' => $waktuMulai, 'durasi' => $durasi];
    // }
}