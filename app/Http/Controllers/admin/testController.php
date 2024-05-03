<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\soal;
use App\Models\test;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\jawaban;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
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
            $active = test::find($request->id);
            $active->update([
                'status' => $request->status
            ]);

            return ResponseFormatter::success($active,"Status berhasil diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::success($e->getMessage(),"Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function storeTest(Request $request) {
        $validator = Validator::make($request->all(), [
            'subjek' => 'required|string|max:255',
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
            'subjek' => 'required|string|max:255',
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
        if($request->ajax()){
            $soal = soal::with('test')->where('id_test', $id)->get();
            return ResponseFormatter::success($soal,"Data Pertanyaan Received Successfuly!");
        }else{
            return view('dashboard.soal', ['id' => $id]);
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
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|max:255',
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
        return view('pengguna.test');
    }
}