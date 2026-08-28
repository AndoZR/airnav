<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\airport;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class berandaController extends Controller
{
    public function index()
    {
        $dataArtikel = $this->slider();
        $dataAirport = airport::all();
        return view('pengguna.home', ['dataArtikel' => $dataArtikel, 'dataAirport' => $dataAirport]);
    }

    public function slider()
    {
        $dataArtikel = Artikel::take(3)->orderBy('created_at','desc')->get();

        $filteredArtikel = [];
        foreach ($dataArtikel as $item) {
            if (strlen($item->deskripsi) >= 100) {
                $item->deskripsi = substr($item->deskripsi, 0, 100) . '...';
                $filteredArtikel[] = $item;
            }
            else {
                $filteredArtikel[] = $item;
            }
        }
        return $filteredArtikel;
    }

    private function hitungMenitBaca($text) {
        $words = str_word_count(strip_tags($text));
        return max(1, (int) ceil($words / 200));
    }

    public function artikel(Request $request) {
        $query = Artikel::query();

        // Search
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($w) use ($q) {
                $w->where('judul','like',"%$q%")->orWhere('deskripsi','like',"%$q%")->orWhere('kategori','like',"%$q%");
            });
        }
        // Filter kategori
        if ($request->filled('kategori') && $request->kategori !== 'Semua') {
            $query->where('kategori', $request->kategori);
        }

        $artikel = $query->orderByDesc('created_at')->paginate(6)->withQueryString();
        // Hitung estimasi baca dinamis per artikel (dari file html jika ada, fallback deskripsi)
        foreach ($artikel as $item) {
            try {
                $html = Storage::disk('public')->get($item->artikel.".html");
                $item->menitBaca = $this->hitungMenitBaca($html);
            } catch (\Exception $e) {
                $item->menitBaca = $this->hitungMenitBaca($item->judul.' '.$item->deskripsi);
            }
        }
        $kategoris = Artikel::select('kategori')->distinct()->pluck('kategori')->filter()->values();
        $featured = Artikel::orderByDesc('created_at')->first();
        if ($featured) {
            try {
                $html = Storage::disk('public')->get($featured->artikel.".html");
                $featured->menitBaca = $this->hitungMenitBaca($html);
            } catch (\Exception $e) {
                $featured->menitBaca = $this->hitungMenitBaca($featured->judul.' '.$featured->deskripsi);
            }
        }

        return view('pengguna.artikel', compact('artikel','kategoris','featured'));
    }

    public function detailArtikel($id) {
        $dataArtikel = Artikel::where('id', $id)->firstOrFail();
        $content = null;
        try {
            $content = Storage::disk('public')->get($dataArtikel->artikel.".html");
        } catch (\Exception $e) {
            $content = '<p class="text-muted"><em>Konten lengkap belum tersedia untuk artikel ini.</em></p>';
        }
        $menitBaca = $this->hitungMenitBaca($content);
        // Artikel terkait
        $related = Artikel::where('id','!=',$id)->where('kategori',$dataArtikel->kategori)->limit(3)->get();
        if ($related->isEmpty()) {
            $related = Artikel::where('id','!=',$id)->orderByDesc('created_at')->limit(3)->get();
        }
        return view('pengguna.detailArtikel', ['artikel' => $dataArtikel,'content'=>$content,'related'=>$related,'menitBaca'=>$menitBaca]);
    }

    public function pembelajaran($id) {
        $airport = airport::where('id',$id)->first();
        return view('pengguna.pembelajaran',['airport'=>$airport]);
    }

    public function HangNadim_ATS() {
        return view('pengguna.HangNadim_ATS');
    }
    public function HangNadim_CNS() {
        return view('pengguna.HangNadim_CNS');
    }
    public function HangNadim_Penunjang() {
        return view('pengguna.HangNadim_Penunjang');
    }
    public function HangNadim_LOCA() {
        return view('pengguna.HangNadim_LOCA');
    }
    public function HangNadim_TeamChecker() {
        return view('pengguna.HangNadim_TeamChecker');
    }

    public function TanjungPinang_ATS() {
        return view('pengguna.TanjungPinang_ATS');
    }
    public function TanjungPinang_CNS() {
        return view('pengguna.TanjungPinang_CNS');
    }
    public function TanjungPinang_Penunjang() {
        return view('pengguna.TanjungPinang_Penunjang');
    }
    public function TanjungPinang_LOCA() {
        return view('pengguna.TanjungPinang_LOCA');
    }
    public function TanjungPinang_TeamChecker() {
        return view('pengguna.TanjungPinang_TeamChecker');
    }

    public function BaganLengkap() {
        return view('pengguna.TanjungPinang_BaganLengkap');
    }

}
