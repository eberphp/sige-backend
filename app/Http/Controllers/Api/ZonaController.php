<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ZonaController extends Controller
{
    public function showZona($idDepartamento, $idProvincia, $idDistrito)
    {
        $zonas = DB::table('zonas')
            ->where('idDepartamento', '=', $idDepartamento)
            ->where('idProvincia', '=', $idProvincia)
            ->where('idDistrito', '=', $idDistrito)
            ->where('estado', '=', 'activo')
            ->get();
        return $zonas;
    }
}
