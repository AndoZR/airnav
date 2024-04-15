<?php

namespace App\Http\Controllers\admin;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\airport;
use Illuminate\Http\Request;

class airportController extends Controller
{
    public function index(Request $request){
        if($request->ajax()) {
            $dataAirport = airport::get();

            return ResponseFormatter::success($dataAirport, 'Data Airport Received Successfully');
        }
        return view('dashboard.airport');
    }
}
