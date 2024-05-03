<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class berandaController extends Controller
{
    public function index()
    {
        $dataArtikel = $this->slider();
        return view('pengguna.home', ['dataArtikel' => $dataArtikel]);
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

    public function artikel() {
        $dataArtikel = Artikel::get();
    
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
    
        return view('pengguna.artikel', ['artikel' => $filteredArtikel]);
    }

    public function detailArtikel($id) {
        $dataArtikel = Artikel::where('id', $id)->first();

        return view('pengguna.detailArtikel', ['artikel' => $dataArtikel]);
    }

    public function pembelajaran() {
        return view('pengguna.pembelajaran');
    }
}
