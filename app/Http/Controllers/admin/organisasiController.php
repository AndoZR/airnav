<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\posisi;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\airport;
use App\Models\divisi;
use App\Models\karyawan;
use Illuminate\Support\Facades\Validator;

class organisasiController extends Controller
{
    public function airport(Request $request) {
        if($request->ajax()){
            $dataTest = airport::get();

            return ResponseFormatter::success($dataTest,"Data Airport Received Successfuly!");
        }
        return view('dashboard.organisasi');
    }

    public function divisi(Request $request, $id) {
        if($request->ajax()){
            $dataDivisi = divisi::where('id_airport',$id)->get();
            return ResponseFormatter::success($dataDivisi,"Data Divisi Received Successfuly!");
        }
        return view('dashboard.divisi',['id'=>$id]);
    }

    public function storeDivisi(Request $request) {
        $validator = Validator::make($request->all(), [
            'divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $dataDivisi = divisi::create([
                'divisi' => $request->divisi,
                'id_airport' => $request->idAirport
            ]);

            return ResponseFormatter::success($dataDivisi, "Data Divisi Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updateDivisi(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $dataDivisi = divisi::find($id);
            $dataDivisi->update([
                'divisi' => $request->divisi,
            ]);

            return ResponseFormatter::success($dataDivisi, "Data Divisi Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function deleteDivisi($id){
        try{
            $dataDivisi = divisi::find($id);
            $dataDivisi->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
    
    public function posisiIndex(Request $request) {
        if($request->ajax()){
            $dataPosisi = posisi::get();

            return ResponseFormatter::success($dataPosisi,"Data Posisi Received Successfully!");
        }
        return view('dashboard.posisi');
    }

    public function storePosisi(Request $request) {
        $validator = Validator::make($request->all(), [
            'posisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $posisi = posisi::create([
                'posisi' => $request->posisi
            ]);

            return ResponseFormatter::success($posisi, "Data Posisi Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updatePosisi(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'posisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $test = posisi::find($id);
            $test->update([
                'posisi' => $request->posisi
            ]);

            return ResponseFormatter::success($test, "Data Posisi Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function deletePosisi(Request $request, $id){
        try{
            $test = posisi::find($id);
            $test->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }

    public function karyawan(Request $request, $id) {
        if($request->ajax()){
            $dataDivisi = karyawan::where('id_airport',$id)->get();
            return ResponseFormatter::success($dataDivisi,"Data Karyawan Received Successfuly!");
        }
        return view('dashboard.divisi',['id'=>$id]);
    }

    public function storeKaryawan(Request $request) {
        $validator = Validator::make($request->all(), [
            'divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $dataDivisi = divisi::create([
                'divisi' => $request->divisi,
                'id_airport' => $request->idAirport
            ]);

            return ResponseFormatter::success($dataDivisi, "Data Divisi Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updateKaryawan(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'divisi' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $dataDivisi = divisi::find($id);
            $dataDivisi->update([
                'divisi' => $request->divisi,
            ]);

            return ResponseFormatter::success($dataDivisi, "Data Divisi Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function deleteKaryawan($id){
        try{
            $dataDivisi = karyawan::find($id);
            $dataDivisi->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
