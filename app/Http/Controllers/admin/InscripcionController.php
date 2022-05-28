<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App;
use Auth;
use App\Http\Requests\InscriptioCreateRequest;
use App\Models\Countrie;
use App\Models\Program;
use App\Models\Inscription;
use App\Models\Oportunidad;
use App\Models\Alert;

class InscripcionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
//        cargar paises
        $paisesDb = Countrie::get()->toArray();
        $paises = array();
        foreach ($paisesDb as $key => $value) {
            $paises[$value['pais']] = $value['pais'];
        }
//        cargar programas
        $programasDb = Program::all();
//        dd($programasDb);
        foreach ($programasDb as $keyPro => $valuePro) {
            $programas[$valuePro['id']] = $valuePro['Nombre'];
        }
//        dd($programas);

        $now = Carbon::now();

        return view('admin.estudiantes.inscripciones.index', compact('paises', 'programas', 'now'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InscriptioCreateRequest $request) {
//        dd($request);
        Inscription::create([
            'user_id' => $request->user_id,
            'pri_nombre' => $request->pri_nombre,
            'seg_nombre' => $request->seg_nombre,
            'pri_apellido' => $request->pri_apellido,
            'seg_apellido' => $request->seg_apellido,
            'fecha_nacimientos' => $request->fecha_nacimientos,
            'municipio_nacimiento' => $request->municipio_nacimiento,
            'deparatamento_nacimiento' => $request->deparatamento_nacimiento,
            'pais_nacimiento' => $request->pais_nacimiento,
            'fecha_expedicion' => $request->fecha_expedicion,
            'municipio_expedicion' => $request->municipio_expedicion,
            'deparatamento_expedicion' => $request->deparatamento_expedicion,
            'pais_expedicion' => $request->pais_expedicion,
             'estado_civil' => $request->estado_civil,
            'rh' => $request->rh,
            'genero' => $request->genero,
            'libreta_militar' => $request->libreta_militar,
            'estrato' => $request->estrato,
            'direcion_recidencia' => $request->direcion_recidencia,
            'municipio_recidencia' => $request->municipio_recidencia,
            'deparatamento_recidencia' => $request->deparatamento_recidencia,
            'pais_recidencia' => $request->pais_recidencia,
            'discapacidad' => $request->discapacidad,
            'numero_de_hijos' => $request->numero_de_hijos,
            'programa_id' => $request->programa_id,
            'periodo_academico' => $request->periodo_academico,
            'jornada' => $request->jornada,
            'fecha_saber' => $request->fecha_saber,
            'codigo_saber' => $request->codigo_saber,
            'puntaje_saber' => $request->puntaje_saber,
            'colegio' => $request->colegio,
            'nivel_academico' => $request->nivel_academico,
            'eps'=>$request->eps,
            'sisben'=>$request->sisben
        ]);
        Alert::create([            
            'alert_user_id' => $request->user_id,
            'alert_name' => 'Inscripcion_success',
            'alert_description' => 'Inscripcion del estudiante ha sido completada',
            'alert_category' =>'1',
            'alert_type' =>'1',
            'alert_send_type' => '1',
            'alert_see_report' => '1',
        ]);
        $message = "Registro completado.";
        return back()->with(compact('message'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
