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
            'sop' => 'mimes:pdf|max:20480',
            'loca.*' => 'mimes:pdf|max:20480', // Tambahkan validasi untuk array file 'loca'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $arrayLoca = [];
            if($request->file('loca')){
                foreach($request->file('loca') as $item){
                    $nameLOCA = time() . '_' . $item->getClientOriginalName();
                    Storage::putFileAs('public/airport/loca', $item, $nameLOCA);
                    $arrayLoca[] = $nameLOCA;
                }
            }

            $nameSOP = null;
            if($request->file('sop')){
                $sop = $request->file('sop');
                $nameSOP = time() . '_' . $sop->getClientOriginalName();
                Storage::putFileAs('public/airport/sop', $sop, $nameSOP);
            }

            $airport = airport::create([
                'name' => $request->name,
                'SOP' => $nameSOP,
                'LOCA' => json_encode($arrayLoca),
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
            'sop' => 'mimes:pdf|max:20480',
            'loca.*' => 'mimes:pdf|max:20480', // Tambahkan validasi untuk array file 'loca'
        ]);

        if ($validator->fails()) {
            return ResponseFormatter::error(null,$validator->errors(),422);
        };

        try {
            $airport = airport::find($id);
            $oldSOP = $airport->SOP;
            $nameSOP = $oldSOP;
            $oldLOCA = json_decode($airport->LOCA);

            if ($request->hasFile('sop')) {
                $sop = $request->file('sop');
                $nameSOP = time() . '_' . $sop->getClientOriginalName();
                Storage::putFileAs('public/airport/sop', $sop, $nameSOP);
                Storage::delete('public/airport/sop/' . $oldSOP);
            }

            if ($request->hasFile('loca')) {
                if(isset($oldLOCA)){
                    foreach($oldLOCA as $perLOCA){
                        Storage::delete('public/airport/loca/' . $perLOCA);
                    }
                }

                $oldLOCA = [];
                foreach($request->file('loca') as $item){
                    $nameLOCA = time() . '_' . $item->getClientOriginalName();
                    Storage::putFileAs('public/airport/loca', $item, $nameLOCA);
                    $oldLOCA[] = $nameLOCA;
                }
            }

            $airport->update([
                'name' => $request->name,
                'SOP' => $nameSOP,
                'LOCA' => json_encode($oldLOCA),
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
            foreach(json_decode($airport->LOCA) as $perLOCA){
                Storage::delete('public/airport/loca/' . $perLOCA);
            }
            $airport->delete();
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return ResponseFormatter::error($e->getMessage(), "Data gagal dihapus. Kesalahan Server", 500);
        }
    }
}
