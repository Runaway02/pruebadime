<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use \Yajra\Datatables\Datatables;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $empleados = DB::select('SELECT * FROM empleados');
            return DataTables::of($empleados)
            ->addColumn('action',function($empleados){
                $acciones = '<a href="" class="btn btn-info btn-sm"> Editar </a>'; 
                $acciones .= '&nbsp;&nbsp;<button type="button" name="delete" id="" class="btn btn-danger btn-sm"> Eliminar </button>'; 
                return $acciones;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
        $areas = Area::all();
        $roles = Role::all();

        return view('empleado.index', compact('areas'), compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //$datosEmpleado = request()->except('_token');
        //Empleado::insert($datosEmpleado);
        
        $empleado = DB::select('INSERT INTO empleados(nombre, email, sexo, area_id, boletin, descripcion) VALUES(?,?,?,?,?,?)',[$request->nombre,$request->email,$request->sexo,$request->area_id, $request->boletin,$request->descripcion]);
        return back();

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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }
}
