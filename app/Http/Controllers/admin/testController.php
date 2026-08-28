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


    // SESI PENGGUNA — PER TOWER 1-3 SUB BAB

    private function babMeta($towerId) {
        $names = [
            1 => 'Hang Nadim',
            2 => 'Tanjung Pinang',
            3 => 'TMA North',
            4 => 'TMA South',
            5 => 'Rajahaji',
            6 => 'Ranai',
            7 => 'Matak',
            8 => 'Letung',
        ];
        $tower = $names[$towerId] ?? 'Tower';
        return [
            ['judul' => $tower.' Tower — Sub Bab 1: Prosedur ATS Dasar', 'deskripsi' => 'Pemahaman prosedur standar Air Traffic Services, koordinasi dan tanggung jawab controller sesuai SOP ATS Edisi 2.'],
            ['judul' => $tower.' Tower — Sub Bab 2: Phraseology & Komunikasi', 'deskripsi' => 'Penguasaan fraseologi ICAO, komunikasi efektif pilot-controller dan penanganan situasi tidak normal.'],
            ['judul' => $tower.' Tower — Sub Bab 3: Keselamatan & Emergency', 'deskripsi' => 'Evaluasi keselamatan, manajemen emergency, dan penerapan keselamatan penerbangan berorientasi Safety First.'],
        ];
    }

    private function ensureTestPerTower($towerId) {
        $babs = $this->babMeta($towerId);
        $ids = [];
        foreach ($babs as $bab) {
            $test = test::where('subjek', $bab['judul'])->first();
            if (!$test) {
                $test = test::create([
                    'subjek' => $bab['judul'],
                    'durasi' => '00:30:00',
                    'status' => 1,
                ]);
                // buat 15 soal pool per test — random 10 akan diambil saat mulai
                $this->seedSoalPool($test->id, $bab['judul']);
            }
            $ids[] = $test->id;
        }
        return $ids;
    }

    private function seedSoalPool($testId, $subjek) {
        // Bank soal ATC real + pengetahuan umum tower — sesuai sub bab & tower spesifik
        // Tambahan wawasan umum per tower (Hang Nadim Batam, Tanjung Pinang Kepri, TMA, Natuna/Anambas)
        $towerHint = '';
        if (str_contains($subjek, 'Hang Nadim')) $towerHint = 'Hang Nadim (BTH/WIDD) Batam — runway 04/22 4.025m';
        elseif (str_contains($subjek, 'Tanjung Pinang')) $towerHint = 'Raja Haji Fisabilillah (TNJ/WIDN) Tanjung Pinang — runway 07/25';
        elseif (str_contains($subjek, 'TMA North')) $towerHint = 'TMA North — airspace Batam utara';
        elseif (str_contains($subjek, 'TMA South')) $towerHint = 'TMA South — airspace Batam selatan';
        elseif (str_contains($subjek, 'Rajahaji')) $towerHint = 'Rajahaji Bintan';
        elseif (str_contains($subjek, 'Ranai')) $towerHint = 'Ranai Natuna (RAN/WION)';
        elseif (str_contains($subjek, 'Matak')) $towerHint = 'Matak Anambas (MWK/WIOM)';
        elseif (str_contains($subjek, 'Letung')) $towerHint = 'Letung Anambas (LMU/WIDL)';

        if (str_contains($subjek, 'Sub Bab 1')) {
            $bank = [
                ['q'=>'Apa tujuan utama SOP ATS Edisi 2 di TWR?', 'opts'=>['Menjamin keselamatan, keteraturan, dan efisiensi layanan navigasi penerbangan','Hanya untuk mengisi dokumentasi administratif','Menggantikan peran pilot dalam pengambilan keputusan','Mengurangi kebutuhan komunikasi pilot-controller'], 'correct'=>0],
                ['q'=>'Siapa yang bertanggung jawab atas separasi pesawat di area TWR?', 'opts'=>['Aerodrome Controller (ADC) yang bertugas di tower','Teknisi CNS','Staf administrasi bandara','Petugas keamanan'], 'correct'=>0],
                ['q'=>'Apa tindakan awal controller saat pilot melaporkan go-around?', 'opts'=>['Instruksikan climb, berikan heading dan koordinasi dengan APP','Meminta pilot mematikan transponder','Menyuruh pesawat langsung landing kembali tanpa instruksi','Mengabaikan dan menunggu pilot meminta instruksi'], 'correct'=>0],
                ['q'=>'Bagaimana koordinasi yang benar antara TWR dan APP untuk pesawat departing?', 'opts'=>['TWR memberikan release dan estimasi, APP menyiapkan spacing','TWR tidak perlu koordinasi jika cuaca cerah','APP yang harus menelepon TWR setiap 10 menit','Koordinasi hanya via catatan kertas'], 'correct'=>0],
                ['q'=>'Apa fungsi utama ATIS?', 'opts'=>['Menyampaikan informasi cuaca, runway in use, dan status fasilitas secara otomatis berulang','Menggantikan clearance dari ATC','Sebagai radar pengganti','Untuk memanggil kendaraan di apron'], 'correct'=>0],
                ['q'=>'Kapan runway incursion harus dilaporkan sebagai kejadian keselamatan?', 'opts'=>['Ketika ada pesawat, kendaraan atau orang tidak sah masuk ke runway area tanpa clearance','Hanya jika terjadi tabrakan','Jika pesawat terlambat takeoff 5 menit','Tidak perlu dilaporkan'], 'correct'=>0],
                ['q'=>'Apa prinsip wake turbulence separation untuk pesawat medium di belakang heavy?', 'opts'=>['Berikan spacing lebih besar sesuai kategori wake (contoh 2 menit atau 5 NM)','Tidak perlu separation tambahan','Cukup berikan 10 detik','Wake turbulence hanya berlaku di atas 10.000 kaki'], 'correct'=>0],
                ['q'=>'Bagaimana prosedur transfer of control yang benar?', 'opts'=>['Melakukan identifikasi, koordinasi, dan serah terima tanggung jawab secara jelas antar unit','Langsung memindahkan frekuensi tanpa koordinasi','Memberikan instruksi baru tanpa konfirmasi','Transfer hanya boleh dilakukan oleh teknisi'], 'correct'=>0],
                ['q'=>'Apa konten mandatory dalam ATC clearance untuk pesawat IFR berangkat?', 'opts'=>['Aircraft identification, clearance limit, route, level, squawk, dan informasi tambahan','Hanya callsign dan runway','Cukup menyebutkan angin','Hanya memberikan squawk'], 'correct'=>0],
                ['q'=>'Apa perbedaan utama procedural control vs surveillance control?', 'opts'=>['Procedural mengandalkan laporan posisi, surveillance menggunakan radar/ADS-B','Tidak ada perbedaan','Procedural lebih modern','Surveillance tidak butuh clearance'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan VIP flight sesuai SOP?', 'opts'=>['Berikan prioritas, koordinasi flow, dan informasi trafik terkait','Abaikan karena tidak ada aturan khusus','Minta VIP menghubungi pilot langsung','Tunda semua penerbangan lain 1 jam'], 'correct'=>0],
                ['q'=>'Apa langkah mitigasi saat visibility menurun di bawah minima?', 'opts'=>['Terapkan low visibility procedures, tingkatkan separasi, dan informasikan pilot','Tetap berikan clearance visual approach','Suruh pilot menebak jarak','Matikan lampu runway'], 'correct'=>0],
                ['q'=>'Apa dokumentasi wajib setelah shift TWR berakhir?', 'opts'=>['Mengisi e-Logbook, mencatat kejadian penting dan serah terima kepada shift berikutnya','Tidak perlu mencatat jika tidak ada kejadian','Hanya foto tower','Cukup mengingat-ingat'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan bird strike yang dilaporkan pilot?', 'opts'=>['Informasikan ke unit terkait, inspeksi runway, dan NOTAM jika perlu','Suruh pilot membersihkan sendiri','Abaikan karena burung akan pergi','Tutup bandara selama 1 minggu'], 'correct'=>0],
                ['q'=>'Apa pentingnya LOA/LOCA antar unit?', 'opts'=>['Menstandarkan prosedur koordinasi, batas tanggung jawab, dan transfer point','Hanya formalitas','Tidak berpengaruh pada operasional','Hanya untuk arsip'], 'correct'=>0],
            ];
        } elseif (str_contains($subjek, 'Sub Bab 2')) {
            $bank = [
                ['q'=>'Fraseologi ICAO yang benar untuk takeoff clearance adalah?', 'opts'=>['“(Callsign), wind (arah/kecepatan), runway (nomor), cleared for takeoff”','“Silakan take off kalau sudah siap”','“Takeoff approved, good luck”','“Oke, berangkat”'], 'correct'=>0],
                ['q'=>'Apa arti instruksi “Line up and wait”?', 'opts'=>['Masuk runway dan berhenti menunggu takeoff clearance selanjutnya','Langsung takeoff tanpa menunggu','Keluar dari runway','Menunggu di taxiway'], 'correct'=>0],
                ['q'=>'Bagaimana readback yang benar untuk clearance yang mengandung level?', 'opts'=>['Pilot harus readback lengkap termasuk level, heading, dan squawk yang diberikan','Cukup kata “Roger”','Tidak perlu readback','Hanya ulangi callsign'], 'correct'=>0],
                ['q'=>'Kapan controller harus menggunakan frase “Go around”?', 'opts'=>['Ketika pendaratan tidak aman dan pilot perlu membatalkan approach untuk climb kembali','Saat pesawat sudah parkir','Untuk menyuruh pesawat mempercepat taxi','Saat cuaca cerah saja'], 'correct'=>0],
                ['q'=>'Apa tujuan penggunaan standard phraseology?', 'opts'=>['Mencegah kesalahpahaman dan menjaga komunikasi ringkas serta jelas','Agar terdengar keren','Untuk memperpanjang komunikasi','Tidak ada tujuan'], 'correct'=>0],
                ['q'=>'Bagaimana cara menangani komunikasi failure (radio failure)?', 'opts'=>['Terapkan prosedur COM failure, gunakan light signal, dan koordinasi dengan unit terkait','Diamkan pesawat','Suruh pilot menelepon tower','Abaikan'], 'correct'=>0],
                ['q'=>'Apa fungsi squawk dalam komunikasi?', 'opts'=>['Kode transponder unik untuk identifikasi pesawat di radar','Kode untuk memesan makanan','Nomor telepon pilot','Tidak ada fungsi'], 'correct'=>0],
                ['q'=>'Bagaimana frase untuk transfer ke frekuensi selanjutnya yang benar?', 'opts'=>['“(Callsign), contact (unit) on (frekuensi)”','“Pindah frekuensi sana”','“Cari frekuensi sendiri”','“Hubungi siapa saja”'], 'correct'=>0],
                ['q'=>'Apa yang harus dilakukan jika pilot tidak readback dengan benar?', 'opts'=>['Controller mengkoreksi dan meminta readback ulang hingga benar','Biarkan saja','Marahi pilot','Ganti frekuensi'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan komunikasi saat emergency “MAYDAY”?', 'opts'=>['Beri prioritas penuh, kosongkan trafik, dan koordinasikan bantuan','Minta pesawat menunggu','Jawab “Standby” terus-menerus','Abaikan karena terlalu sibuk'], 'correct'=>0],
                ['q'=>'Apa arti “Hold short of runway 27”?', 'opts'=>['Berhenti sebelum memasuki runway 27 dan menunggu clearance','Masuk runway 27','Melintasi runway secepat mungkin','Putar balik'], 'correct'=>0],
                ['q'=>'Kapan menggunakan “Expedite” dalam instruksi?', 'opts'=>['Saat membutuhkan kepatuhan segera untuk alasan separasi atau keselamatan','Untuk basa-basi','Saat santai','Tidak pernah digunakan'], 'correct'=>0],
                ['q'=>'Bagaimana koordinasi phraseology TWR-APP untuk inbound?', 'opts'=>['“Estimate (titik) at (waktu), level (ketinggian)” dan konfirmasi','Hanya bilang “Ada pesawat datang”','Tidak perlu phraseology khusus','Kirim WA'], 'correct'=>0],
                ['q'=>'Apa pentingnya penggunaan callsign lengkap?', 'opts'=>['Menghindari salah identifikasi antar pesawat dengan callsign mirip','Tidak penting','Agar terdengar panjang','Hanya untuk formalitas'], 'correct'=>0],
                ['q'=>'Bagaimana mengakhiri komunikasi dengan benar?', 'opts'=>['Akhiri dengan callsign atau instruksi yang jelas dan tunggu readback','Langsung matikan radio','Diam tanpa konfirmasi','Berikan instruksi setengah-setengah'], 'correct'=>0],
            ];
        } else {
            $bank = [
                ['q'=>'Kapan fase emergency INCERFA dinyatakan?', 'opts'=>['Ketika ada keraguan terhadap keselamatan pesawat atau overdue 30 menit','Saat pesawat sedang boarding','Setiap jam secara otomatis','Tidak pernah'], 'correct'=>0],
                ['q'=>'Apa tindakan awal saat menerima laporan engine failure setelah takeoff?', 'opts'=>['Berikan prioritas, tanyakan niat pilot, dan siapkan bantuan darurat','Suruh pilot segera mendarat di mana saja tanpa panduan','Abaikan','Minta pilot menghubungi teknisi'], 'correct'=>0],
                ['q'=>'Bagaimana mitigasi runway excursion saat hujan deras?', 'opts'=>['Informasikan kondisi runway, braking action, dan tawarkan alternatif','Diamkan saja','Suruh pilot mempercepat landing','Matikan lampu approach'], 'correct'=>0],
                ['q'=>'Apa langkah TWR saat terjadi bird activity tinggi?', 'opts'=>['Berikan warning ke pilot, koordinasi dengan wildlife control, dan terbitkan NOTAM jika perlu','Suruh burung pindah','Tidak ada prosedur','Tutup tower'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan fuel emergency (MINIMUM FUEL / MAYDAY FUEL)?', 'opts'=>['Beri prioritas penanganan, direct routing, dan siapkan prioritas pendaratan','Minta pesawat holding 1 jam','Suruh pesawat cari SPBU di udara','Abaikan'], 'correct'=>0],
                ['q'=>'Apa prosedur saat terjadi komunikasi failure di TWR?', 'opts'=>['Gunakan light gun signal, koordinasi via telepon, dan terapkan prosedur COM failure ICAO','Teriak dari tower','Tunggu sampai radio normal tanpa tindakan','Suruh pesawat mendarat sendiri'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan pesawat yang melaporkan hydraulic failure?', 'opts'=>['Tanyakan kebutuhan pilot, siapkan runway panjang, dan siagakan ARFF','Suruh pilot memperbaiki di udara','Abaikan','Minta pesawat kembali ke parkir tanpa bantuan'], 'correct'=>0],
                ['q'=>'Apa fungsi Safety Management System (SMS) di AirNav?', 'opts'=>['Mengidentifikasi bahaya, menilai risiko, dan menerapkan mitigasi berkelanjutan','Hanya untuk laporan keuangan','Tidak ada fungsi','Untuk dekorasi'], 'correct'=>0],
                ['q'=>'Kapan NOTAM harus diterbitkan terkait keselamatan?', 'opts'=>['Saat ada penutupan runway, navigasi aid unserviceable, atau hazard','Hanya saat libur','Setiap 5 menit','Tidak perlu NOTAM'], 'correct'=>0],
                ['q'=>'Bagaimana koordinasi dengan ARFF saat emergency?', 'opts'=>['Berikan detail jenis emergency, posisi, souls on board, dan fuel remaining','Hanya bilang “Ada emergency”','Tidak perlu koordinasi','Suruh ARFF menebak'], 'correct'=>0],
                ['q'=>'Apa langkah setelah kejadian near miss?', 'opts'=>['Laporkan, dokumentasikan, dan lakukan investigasi sesuai Just Culture','Sembunyikan','Hapus rekaman','Abaikan'], 'correct'=>0],
                ['q'=>'Bagaimana penanganan wind shear yang dilaporkan?', 'opts'=>['Teruskan laporan ke pesawat lain, tawarkan approach alternatif, dan informasikan meteorologi','Diamkan','Suruh pilot tidak peduli','Matikan radar'], 'correct'=>0],
                ['q'=>'Apa tindakan saat terjadi intrusi drone di CTR?', 'opts'=>['Hentikan operasi yang terdampak, informasikan pilot, dan koordinasi dengan otoritas','Biarkan drone lewat','Suruh pesawat mengejar drone','Tidak ada prosedur'], 'correct'=>0],
                ['q'=>'Bagaimana penerapan Just Culture dalam pelaporan keselamatan?', 'opts'=>['Mendorong pelaporan tanpa menyalahkan, fokus pada pembelajaran sistem','Menghukum semua kesalahan','Menyembunyikan laporan','Tidak relevan'], 'correct'=>0],
                ['q'=>'Apa prioritas utama controller saat emergency?', 'opts'=>['Keselamatan jiwa dan pesawat, kemudian keteraturan trafik','Kecepatan handling administrasi','Menghemat bahan bakar maskapai','Estetika komunikasi'], 'correct'=>0],
            ];
        }
        foreach ($bank as $idx => $item) {
            $soal = soal::create([
                'id_test' => $testId,
                'pertanyaan' => ($idx+1).'. '.$item['q'],
            ]);
            foreach ($item['opts'] as $k => $jaw) {
                jawaban::create([
                    'id_soal' => $soal->id,
                    'jawaban' => $jaw,
                    'nilai' => ($k === $item['correct']) ? 1 : 0,
                ]);
            }
        }
    }

    public function tower($id) {
        $airport = \App\Models\airport::find($id);
        if (!$airport) abort(404);
        $testIds = $this->ensureTestPerTower((int)$id);
        $tests = test::with('hasilTest')->whereIn('id', $testIds)->orderBy('id')->get();
        // urutan konsisten sesuai bab
        return view('pengguna.testTower', ['airport'=>$airport, 'tests'=>$tests]);
    }

    public function userIndex() {
        // Tampilkan lama (Image 2) sudah tidak dipakai — arahkan ke tower Hang Nadim sebagai default premium view
        return redirect()->route('test.tower', ['id'=>1]);
    }

    public function mulai($id) {
        $test = test::find($id);
        if (!$test) abort(404);
        $durasi = $test->durasi ?? '00:30:00';
        // paksa 30 menit sesuai permintaan
        if ($durasi !== '00:30:00') {
            $durasi = '00:30:00';
        }

        $cek = hasilTest::where('id_Test', $id)
        ->where('id_user', Auth::user()->id)
        ->first();

        if ($cek == null){
            $hasil = hasilTest::create([
                'id_test' => $id,
                'id_user' => Auth::user()->id,
                'waktu_mulai' => now(),
            ]);

            $dataTest = soal::with('jawaban')->where('id_test',$id)->get()->shuffle()->take(10)->values();
            // acak jawaban per soal
            foreach ($dataTest as $soalItem) {
                $soalItem->setRelation('jawaban', $soalItem->jawaban->shuffle()->values());
            }
            return view('pengguna.mulai',['dataTest'=>$dataTest, 'idTest'=>$id, 'idHasil'=>$hasil->id, 'durasi'=>$durasi, 'test'=>$test]);
        } else if (!isset($cek->hasil)){
            $dataTest = soal::with('jawaban')->where('id_test',$id)->get()->shuffle()->take(10)->values();
            foreach ($dataTest as $soalItem) {
                $soalItem->setRelation('jawaban', $soalItem->jawaban->shuffle()->values());
            }
            return view('pengguna.mulai',['dataTest'=>$dataTest, 'idTest'=>$id, 'idHasil'=>$cek->id, 'durasi'=>$durasi, 'test'=>$test]);
        } else {
            $message = 'Anda sudah mengerjakan test! Hasil Anda: '.$cek->hasil;
            // coba redirect ke tower jika subjek mengandung tower
            return redirect()->back()->with('message', $message);
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
        $hasilRow = hasilTest::where('id_test',$id)->where('id_user', auth()->user()->id)->first();
        if (!$hasilRow) $hasilRow = hasilTest::where('id_test',$id)->first();
        $jawabanArray = json_decode($hasilRow->jawaban ?? '[]', true) ?: [];
        $hasilSkor = $hasilRow->hasil ?? 0;
        $allSoal = soal::with('jawaban')->where('id_test',$id)->get();
        // Filter hanya soal yang pernah dijawab (10 soal) — jika jawaban kosong tampilkan 10 acak pertama agar tidak 15
        if (!empty($jawabanArray)) {
            $dataSoal = $allSoal->filter(function($soal) use ($jawabanArray){
                foreach($soal->jawaban as $j){ if(in_array($j->id, $jawabanArray)) return true; }
                return false;
            })->values();
            // Jika filter menghasilkan 0 (karena jawabanDipilih menyimpan id soal bukan id jawaban di versi lama), fallback tampilkan 10 pertama
            if ($dataSoal->isEmpty()) {
                $dataSoal = $allSoal->take(10);
            }
        } else {
            $dataSoal = $allSoal->take(10);
        }
        $test = test::find($id);
        $towerId = 1;
        if ($test) {
            foreach (range(1,8) as $tid) {
                foreach ($this->babMeta($tid) as $bab) {
                    if ($bab['judul'] === $test->subjek) { $towerId = $tid; break 2; }
                }
            }
        }
        return view('pengguna.lihatJawaban',['dataSoal'=>$dataSoal, 'idTest'=>$id, 'jawabanDipilih'=>$jawabanArray, 'towerId'=>$towerId, 'test'=>$test, 'skor'=>$hasilSkor]);
    }

    // public function duration($id) {
    //     $test = Test::find($id);
    //     $waktuMulai = $test->waktuMulai;
    //     $durasi = $test->durasi;
    //     return ['waktuMulai' => $waktuMulai, 'durasi' => $durasi];
    // }
}