<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodoController extends Controller
{
    public function lastPeriodo()
    {
        $lastPeriodo = DB::table('periodos')
            ->where('flagActivo', '=', 1)
            ->orderBy('idPeriodo', 'desc')->first()
        ;
        return response()->json($lastPeriodo, 200, []);
    }
}
