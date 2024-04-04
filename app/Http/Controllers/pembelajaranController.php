<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pembelajaranController extends Controller
{
    public function index() {
        return view('dashboard.pembelajaran');
    }

}
