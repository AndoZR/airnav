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
        $cabang = $request->get('cabang');
        $tower = $request->get('tower');
        $query = DB::table("elogbook")->select(['uid', 'month', 'year', 'cabang', 'tower', 'created_at'])->where('user_id', '=', $uid_user);
        if ($cabang && in_array($cabang, ['batam','tanjung'])) {
            $query->where(function($q) use ($cabang){
                $q->where('cabang', '=', $cabang)->orWhereNull('cabang');
            });
        }
        if ($tower) {
            // tangani beda suffix: "Tanjung Pinang" vs "Tanjung Pinang Tower"
            $base = str_replace(' Tower','', $tower);
            $query->where(function($q) use ($tower, $base){
                $q->where('tower', '=', $tower)->orWhere('tower', '=', $base)->orWhere('tower', 'like', '%'.$base.'%');
            });
        }
        $dataset = $query->orderBy('created_at','desc')->get();
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
        return view('pengguna.elogbook');
    }

    public function elogbookForm(Request $request) {
        $logbook_id = $request->input('logbook_id');
        $logbook_bulan = $request->input('bulan');
        $logbook_tahun = $request->input('tahun');
        $tower = $request->input('tower') ?? $request->query('tower') ?? 'Tanjung Pinang';
        $cabang = $request->input('cabang') ?? $request->query('cabang') ?? 'tanjung';
        return view('pengguna.logbookForm',['logbook_id' => $logbook_id,'logbook_bulan' => $logbook_bulan,'logbook_tahun' => $logbook_tahun, 'tower'=>$tower, 'cabang'=>$cabang]);
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
        $tower = $request->get('tower') ?? 'Tanjung Pinang';
        $cabang = $request->get('cabang') ?? 'tanjung';
        $remark = $request->get('remark') ?? '';
        $ctrHour = $request->get('ctrHour');
        $ctrMinute = $request->get('ctrMinute');
        $assHour = $request->get('assHour');
        $assMinute = $request->get('assMinute');
        $restHour = $request->get('restHour');
        $restMinute = $request->get('restMinute');
        
        $base = [
                'no' => 0,
                'elogbook_uid' => $logbookID,
                'username' => $namaUser,
                'user_id' => auth()->user()->id ?? null,
                'day' => $tanggal,
                'month' => $bulan,
                'year' => $tahun,
                'unit' => $unit,
                'cabang' => $cabang,
                'tower' => $tower,
                'remark' => $remark,
            ];
        if ($duty == 'morning') {
            DB::table('elogbook_harian')->insert(array_merge($base, [
                'morning_ctr_hour' => $ctrHour,
                'morning_ctr_minute' => $ctrMinute,
                'morning_ass_hour' => $assHour ,
                'morning_ass_minute' => $assMinute,
                'morning_rest_hour' => $restHour,
                'morning_rest_minute' => $restMinute,
            ]));
        }
        elseif($duty == 'afternoon') {
            DB::table('elogbook_harian')->insert(array_merge($base, [
                'afternoon_ctr_hour' => $ctrHour,
                'afternoon_ctr_minute' => $ctrMinute,
                'afternoon_ass_hour' => $assHour ,
                'afternoon_ass_minute' => $assMinute,
                'afternoon_rest_hour' => $restHour,
                'afternoon_rest_minute' => $restMinute,
            ]));
        }
        elseif($duty == 'night') {
            DB::table('elogbook_harian')->insert(array_merge($base, [
                'night_ctr_hour' => $ctrHour,
                'night_ctr_minute' => $ctrMinute,
                'night_ass_hour' => $assHour ,
                'night_ass_minute' => $assMinute,
                'night_rest_hour' => $restHour,
                'night_rest_minute' => $restMinute,
            ]));
        }

        return redirect()->route('logbook.rekap');
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
        $cabang = $request->input('cabang') ?? $request->query('cabang') ?? 'batam';

        $tower = $request->input('tower') ?? $request->query('tower') ?? 'Tanjung Pinang';
        $transaction = DB::transaction(function () use ($nama, $user_id, $tahun, $bulan, $cabang, $tower) {
            // Menjalankan query INSERT — sertakan cabang & tower agar filter tidak hilang
            $namaEsc = addslashes($nama);
            $towerEsc = addslashes($tower);
            DB::statement(sprintf("INSERT INTO `elogbook`(`no`,`nama`,`user_id`,`month`,`year`,`cabang`,`tower`) VALUES (null,'%s','%s','%s','%s','%s','%s')", $namaEsc, $user_id, $bulan, $tahun, $cabang, $towerEsc));

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
