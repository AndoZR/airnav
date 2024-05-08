<?php

namespace App\Http\Controllers\admin;

use Exception;
use App\Models\airport;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class airportController extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
            $dataAirport = airport::get();

            return ResponseFormatter::success($dataAirport, 'Data Airport Received Successfully');
        }
        return view('dashboard.airport');
    }

    public function storeAirport(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sop' => 'required|mimes:pdf|max:5120',
            'loca' => 'required|mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $sop = $request->file('sop');
            $loca = $request->file('loca');

            $nameSOP = time() . '_' . $sop->getClientOriginalName();
            $nameLOCA = time() . '_' . $loca->getClientOriginalName();
            
            Storage::putFileAs('public/airport/sop', $sop, $nameSOP);
            Storage::putFileAs('public/airport/loca', $loca, $nameLOCA);

            $airport = airport::create([
                'name' => $request->name,
                'SOP' => $nameSOP,
                'LOCA' => $nameLOCA,
            ]);

            return ResponseFormatter::success($airport, "Data Airport Berhasil Dibuat!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }

    public function updateAirport(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'sop' => 'mimes:pdf|max:5120',
            'loca' => 'mimes:pdf|max:5120',
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $airport = airport::find($id);
            $oldSOP = $airport->SOP;
            $oldLOCA = $airport->LOCA;
            $nameSOP = $oldSOP;
            $nameLOCA = $oldLOCA;

            if ($request->hasFile('sop')) {
                $sop = $request->file('sop');
                $nameSOP = time() . '_' . $sop->getClientOriginalName();
                Storage::putFileAs('public/airport/sop', $sop, $nameSOP);
                Storage::delete('public/airport/sop/' . $oldSOP);
            }

            if ($request->hasFile('loca')) {
                $loca = $request->file('loca');
                $nameLOCA = time() . '_' . $loca->getClientOriginalName();
                Storage::putFileAs('public/airport/loca', $loca, $nameLOCA);
                Storage::delete('public/airport/loca/' . $oldLOCA);
            }

            $airport->update([
                'name' => $request->name,
                'SOP' => $nameSOP,
                'LOCA' => $nameLOCA,
            ]);

            return ResponseFormatter::success($airport, "Data Ujian Berhasil Diubah!");
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal disimpan. Kesalahan Server", 500);
        }
    }
    
    public function deleteAirport($id){
        try{
            $airport = airport::find($id);
            Storage::delete('public/airport/sop/' . "$airport->SOP");
            Storage::delete('public/airport/loca/' . "$airport->LOCA");
            $airport->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
