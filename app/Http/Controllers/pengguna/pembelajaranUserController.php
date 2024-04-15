<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;

class pembelajaranUserController extends Controller
{
    public function pembelajaran()
    {
        return view('pengguna.pembelajaran');
    }
}
