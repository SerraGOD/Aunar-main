<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Inscription;
use App\Models\User;
use App\Models\Gestionagente;
use App\Models\Oportunidad;
use App\Helpers\Helper;

class ListadogeneralController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        Helper::updateOportu();
        $inscripcionesvista = Inscription::where('status', '1')->get();
        foreach ($inscripcionesvista as $items) {

            $repartidoroportunidades[] = $items->id;
        }
        $oportunidades = Oportunidad::whereIn('inscription_id', $repartidoroportunidades)->get();

        return view('admin.admisiones.listadoGeneral', compact('oportunidades'));
    }

}
