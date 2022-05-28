<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Gestionagente;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;
use App\Models\Oportunidad;
use Carbon\Carbon;
use App\Http\Requests\OportunidaStoreRequest;

class OportunidadController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $oportunidades = Helper::updateOportu();
        return view('admin.admisiones.gestionarOportunidades', compact('oportunidades'));
    }

    public function edit($oportunida_id) {
        return view('admin.admisiones.gestionarOportunidad', compact('oportunida_id'));
    }

    public function store(OportunidaStoreRequest $request) {
        $dataOportunidad = Oportunidad::where('id', $request->id)->first();
//        dd($dataOportunidad);
        Gestionagente::create([
            'student_id' => $dataOportunidad->student_id,
            'agent_id' => $dataOportunidad->agent_id,
            'inscription_id' => $dataOportunidad->inscription_id,
            'description' => $request->descripcion,
            'status' => $request->estado,
            'creation_date' => Carbon::now(),
        ]);
        Oportunidad::where('id', $request->id)->update([
            'status' => $request->estado
        ]);
        return back();
    }

}
