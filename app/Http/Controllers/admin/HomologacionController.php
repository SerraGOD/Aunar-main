<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Oportunidad;
use App\Models\Gestionagente;
use App\Models\Documentos_user;
use App\Models\Hojadevida;
use App\Models\Homologacion;
use App\Models\Gestionhomologacion;
use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use App\Helpers\StatusOportunidad;
use App\Helpers\Helper;
use App\Http\Requests\HomologacionRequest;
use Auth;

class HomologacionController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        Helper::updateHomologacion();
        $getDataHomologacion = Homologacion::where('status', '<>', '3')->get();

        return view('admin.homologacion.gestionHomologacion', compact('getDataHomologacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomologacionRequest $request) {
        $user_idacademic = Auth::id();
        $acta = '';
        if($request->file('resolucion_actadehomologacion') != null){
        $acta = Helper::uploadFile($request->file('resolucion_actadehomologacion'), $request->user_id);
        }
        $getDataHomologacion = Homologacion::where('id', $request->id)->first();
        $getDataInscription = Inscription::where('id', $getDataHomologacion->inscription_id)->first();

        Gestionhomologacion::create([
            'academic_id' => $user_idacademic,
            'inscription_id' => $getDataInscription->id,
            'student_id' => $request->user_id,
            'status' => $request->status,
            'acta_homologacion' => $acta,
            'descripcion' => $request->descripcion,
            'creation_date' => Carbon::now(),
        ]);
        Homologacion::where('inscription_id', $request->id)->update([
            'academic_id' => $user_idacademic,
            'status' => $request->status,
        ]);
        return back();
    }

}
