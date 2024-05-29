<?php

namespace App\Http\Controllers\admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class elogbookController extends Controller
{
    public function index() {
        return view('pengguna.elogbook');
    }

    public function insertLogbook() {
        
    }

}

