<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DatosEmpresa;
use App\Models\RedesSociales;
use App\Models\Slider;
use App\Models\Boton;
use App\Models\Publicacion;
use App\Models\Servicio;
use App\Models\Subpublicacion;
use App\Models\Testimonio;
use App\Models\Titulo;

class WebController extends Controller
{

    public function index()
    {
        $id = 2;
        $publications = Publicacion::where('idUsuario', $id)->with('images')->orderBy('orden', 'asc')->get();

        $services = Servicio::where('idUsuario', $id)->orderBy('nombre', 'asc')->get();
        $buttons = Boton::where('idUsuario', $id)->orderBy('orden', 'asc')->get();
        $data = DatosEmpresa::where('idUsuario', $id)->first();
        $networks = RedesSociales::where('idUsuario', $id)->first();
        $sliders = Slider::where('idUsuario', $id)->orderBy('orden', 'asc')->get();
        $testimonials = Testimonio::where('idUsuario', $id)->orderBy('orden', 'asc')->get();
        $title = Titulo::where('idUsuario', $id)->first();

        return $this->info(
            compact(
                'data',
                'networks',
                'sliders',
                'buttons',
                'services',
                'publications',
                'testimonials',
                'title'
            )
        );
    }

    public function subpublicaciones($id, $idPublicacion)
    {
        //dd($idPublicacion);
        $subpublicaciones = Subpublicacion::where('idPublicacion', $idPublicacion)->orderBy('orden', 'asc')->get();
        //dd($publicaciones[0]->modeloBloque == 'Bloque 1');
        $servicios = Servicio::where('idUsuario', $id)->orderBy('nombre', 'asc')->get();
        $botones = Boton::where('idUsuario', $id)->orderBy('orden', 'asc')->get();
        $datos = DatosEmpresa::where('idUsuario', $id)->first();
        $redes = RedesSociales::where('idUsuario', $id)->first();
        $sliders = Slider::where('idUsuario', $id)->orderBy('orden', 'asc')->get();
        $titulo = Titulo::where('idUsuario', $id)->first();
        return view('web.pages.subpublicaciones')->with(compact('datos', 'redes', 'sliders', 'botones', 'servicios', 'subpublicaciones', 'titulo'));
    }
}
