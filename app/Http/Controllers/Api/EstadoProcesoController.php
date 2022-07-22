<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\EstadoProceso;
use Exception;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class EstadoProcesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //estado de procesos
        try {
            $estadosProcesos = EstadoProceso::all();
            return response()->json(["estadosProcesos" => $estadosProcesos, "success" => true], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 500);
        }
    }
    public function pagination(Request $request)
    {
        $areas = EstadoProceso::select(["*"]);
        return DataTables::of($areas)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $estadoProceso = new EstadoProceso();
            $estadoProceso->nombre = $request->nombre;
            $estadoProceso->estado = "activo";
            $estadoProceso->save();
            return response()->json(["estadoProceso" => $estadoProceso, "success" => true, "message" => "Estado de proceso creado correctamente"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //detalle de estado de proceso
        try {
            $estadoProceso = EstadoProceso::find($id);
            return response()->json(["estadoProceso" => $estadoProceso, "success" => true], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //actualizar estado de proceso
        try {
            $estadoProceso = EstadoProceso::find($id);
            $estadoProceso->nombre = $request->nombre;
            $estadoProceso->save();
            return response()->json(["estadoProceso" => $estadoProceso, "success" => true, "message" => "Estado de proceso actualizado correctamente"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $estadoProceso = EstadoProceso::find($id);
            $estadoProceso->delete();
            return response()->json(["estadoProceso" => $estadoProceso, "success" => true, "message" => "Estado de proceso eliminado correctamente"], 200);
        } catch (Exception $e) {
            return response()->json(["message" => $e->getMessage(), "success" => false], 500);
        }
    }
}
