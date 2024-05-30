<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\elogbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class elogbookController extends Controller
{
    private ?string $logbookUID;

    public function __construct(Request $request) {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        print($bulan);
        print($tahun);
        $user = DB::table("elogbook")->where([
            ['month', '=', $bulan],
            ['year', '=', $tahun],
        ])->value('uid')->first();
        if (notNullValue($user)){
            $this->logbookUID = $user;
        }
        else {

        }
        
    }

    public function insertLogbook(Request $request) {
        $namaUser = $request->get('namaUser');
        $nomorNIK = $request->get('NomorNik');
        $tanggal =  $request->get('tanggal');
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        $duty = $request->get('duty');
        $unit = $request->get('unit');
        $ctrHour = $request->get('ctrHour');
        $ctrMinute = $request->get('ctrMinute');
        $assHour = $request->get('assHour');
        $assMinute = $request->get('assMinute');
        $restHour = $request->get('restHour');
        $restMinute = $request->get('restMinute');
    }

    public function createLogbook() {
        
    }

}

