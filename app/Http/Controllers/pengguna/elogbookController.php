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
        ])->get();
        if (is_null($user)) {
            // $this->createLogbook();
        } else {
            $this->logbookUID = $user;
        }
    }

    public function getRekapTahunan(Request $request)
    {
        $uid_user = $request->get('uniq_id');
        $tahun = $request->get('year');
        $dataset = DB::table("elogbook")->select(['uid', 'month', 'year', 'created_at'])->where([
            ['user_id', '=', $uid_user]
            // ['year', '=', $tahun],
        ])->get();
        return response($dataset);
    }

    public function getRekapBulanan(Request $request)
    {
        $elogbook_id = $request->get('elogbook_id');
        $dataset = DB::table("elogbook_harian")->select(['day','unit','morning_ctr_hour','morning_ctr_minute','morning_ass_hour','morning_ass_minute','morning_rest_hour','morning_rest_minute','afternoon_ctr_hour','afternoon_ctr_minute','afternoon_ass_hour','afternoon_ass_minute','afternoon_rest_hour','afternoon_rest_minute','night_ctr_hour','night_ctr_minute','night_ass_hour','night_ass_minute','night_rest_hour','night_rest_minute'])->where('elogbook_uid', '=', $elogbook_id)->get();
        return response($dataset);
    }

    public function elogbook()
    {

        $bulan = "05";
        $tahun = "2024";
        $username = "05";
        // $user = DB::table("elogbook")->select('uid')->where([
        //     ['month', '=', $bulan],
        //     ['year', '=', $tahun],
        //     ['username','=',$username],
        // ])->first();

        // $dataset = DB::table('elogbook')->where('username', '=', $username)->get();
        $dataset = [];
        return view('pengguna.elogbook', ['elogbook' => $dataset, 'elogbookID' => '0', 'bulan' => '0', 'tahun' => '0']);
    }

    public function getLogbook(Request $request)
    {
    }

    public function insertLogbook(Request $request)
    {
        $namaUser = $request->get('namaUser');
        $logbookID = $request->get('logbookID');
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
        
        if ($duty == 'morning') {
            DB::table('elogbook_harian')->insert([
                'no' => 0,
                'elogbook_uid' => $logbookID,
                'username' => $namaUser,
                'day' => $tanggal,
                'month' => $bulan,
                'year' => $tahun,
                'morning_ctr_hour' => $ctrHour,
                'morning_ctr_minute' => $ctrMinute,
                'morning_ass_hour' => $assHour ,
                'morning_ass_minute' => $assMinute,
                'morning_rest_hour' => $restHour,
                'morning_rest_minute' => $restMinute,
                'unit' => $unit
            ]);
        }
        elseif($duty == 'afternoon') {
            DB::table('elogbook_harian')->insert([
                'no' => 0,
                'elogbook_uid' => $logbookID,
                'username' => $namaUser,
                'day' => $tanggal,
                'month' => $bulan,
                'year' => $tahun,
                'afternoon_ctr_hour' => $ctrHour,
                'afternoon_ctr_minute' => $ctrMinute,
                'afternoon_ass_hour' => $assHour ,
                'afternoon_ass_minute' => $assMinute,
                'afternoon_rest_hour' => $restHour,
                'afternoon_rest_minute' => $restMinute,
                'unit' => $unit
            ]);
        }
        elseif($duty == 'night') {
            DB::table('elogbook_harian')->insert([
                'no' => 0,
                'elogbook_uid' => $logbookID,
                'username' => $namaUser,
                'day' => $tanggal,
                'month' => $bulan,
                'year' => $tahun,
                'night_ctr_hour' => $ctrHour,
                'night_ctr_minute' => $ctrMinute,
                'night_ass_hour' => $assHour ,
                'night_ass_minute' => $assMinute,
                'night_rest_hour' => $restHour,
                'night_rest_minute' => $restMinute,
                'unit' => $unit
            ]);
        }

        return;
    }

    public function formLogbook()
    {
        return view('pengguna.logbookFormYear');
    }

    public function createLogbook(Request $request)
    {
        $nama = $request->input('nama_user');
        $user_id = $request->input('user_id');
        $tahun = $request->input('tahun');
        $bulan = $request->input('bulan');

        $transaction = DB::transaction(function () use ($nama, $user_id, $tahun, $bulan) {
            // Menjalankan query INSERT
            DB::statement(sprintf("INSERT INTO `elogbook`(`no`,`nama`,`user_id`,`month`,`year`) VALUES (null,'%s','%s','%s','%s')", $nama, $user_id, $bulan, $tahun));

            // Mengambil LAST_INSERT_ID
            DB::statement("SET @logbook = (SELECT LAST_INSERT_ID())");

            // Menjalankan query UPDATE
            DB::statement("UPDATE `elogbook` SET `uid`= RPAD(CONCAT(@logbook, CURDATE() + 0), 12, 0) WHERE `no` = @logbook");

            // Menjalankan query SELECT untuk mendapatkan uid
            $result = DB::select("SELECT `uid` FROM `elogbook` WHERE `no` = @logbook");
            // Mengembalikan hasil query SELECT
            return $result[0]->uid;
        });
        return redirect()->route('logbook.rekap');
    }
}
