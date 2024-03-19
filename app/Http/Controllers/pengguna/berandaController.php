<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\artikel;
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
        $dataArtikel = artikel::take(3)->orderBy('created_at','desc')->get();
        return $dataArtikel;
    }
}
