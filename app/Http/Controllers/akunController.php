<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class akunController extends Controller
{
    public function index() {
        return view('pengguna.akun');
    }
}
