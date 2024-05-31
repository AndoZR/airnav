<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\elogbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\select;
use function PHPUnit\Framework\isNull;

class elogbookController extends Controller
{
    private ?string $logbookUID;

    public function __construct(Request $request)
    {
        $bulan = $request->get('bulan');
        $tahun = $request->get('tahun');
        $user = DB::table("elogbook")->select('uid')->where([
            ['month', '=', $bulan],
            ['year', '=', $tahun],
        ])->first();
        if (is_null($user)) {
            $this->createLogbook();
        } else {
            $this->logbookUID = $user;
        }
    }

    public function getLogbook(Request $request){
        
    }

    public function insertLogbook(Request $request)
    {
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
        return;
    }

    public function createLogbook()
    {
        $transaction = DB::transaction(function () {
            // Menjalankan query INSERT
            DB::statement("INSERT INTO `elogbook`(`no`) VALUES (null)");

            // Mengambil LAST_INSERT_ID
            DB::statement("SET @logbook = (SELECT LAST_INSERT_ID())");

            // Menjalankan query UPDATE
            DB::statement("UPDATE `elogbook` SET `uid`= RPAD(CONCAT(@logbook, CURDATE() + 0), 12, 0) WHERE `no` = @logbook");

            // Menjalankan query SELECT untuk mendapatkan uid
            $result = DB::select("SELECT `uid` FROM `elogbook` WHERE `no` = @logbook");
            // Mengembalikan hasil query SELECT
            return $result[0]->uid;
        });
        return $transaction;
    }
}
