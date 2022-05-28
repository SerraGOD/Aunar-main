<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Inscription;
use App\Models\Liquidation;
use Illuminate\Support\Facades\Auth;
use App\Models\Price;
use App\Models\Pago;
use App\Models\Abonoliquidacion;

class PagoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        
        $user_id = Auth::id();
        $pagos = Pago::where('user_id', $user_id)->get();
//        dd($pagos);
    $abonoliquidacions = Abonoliquidacion::where('user_id', $user_id)->count();  
        return view('admin.estudiantes.pagos.pagos', compact('pagos','abonoliquidacions'));
    }

    public function indexTarjetas() {
        $user = Auth::user();
        $inscripcion = Inscription::where('user_id', $user->id)->first();
        $liquidacion = Liquidation::where('user_id', $user->id)->where('period', $inscripcion->periodo_academico)->first();
              
        $pagos = Pago::where('id', $user->id)->get();

        return view('admin.estudiantes.pagos.tarjetas', compact('user', 'liquidacion'));
    }

    public function indexAbonos(){
                $user = Auth::user();
                $liquidacionData = liquidation::where('user_id', $user->id)->first();        
                $user = User::where('id', $liquidacionData->user_id)->first();
                $inscripcion = Inscription::where('id', $liquidacionData->inscription_id)->first();
                $time = \Carbon\Carbon::now();
                $dateexpirationprueba = Carbon::parse('2021-10-31 11:00:00');
                $timeExpirationxinscripcion =  $dateexpirationprueba->diffInDays($time);
                //dd($timeExpirationxinscripcion);                
                $precios = Price::all();
                $valorProgram = 0;
                $valorProgramDes = 0;
                $inscrip = 0;
                $ingles = 0;
                $descuento = '1';
                $sinInscripcion = '1';
                $valorLiquidacion = 0;
        
                foreach ($precios as $valuePrec) {
                    if ($inscripcion->id == $valuePrec->programa_id) {
                        $valorProgram = $valuePrec->value_ordinary;
                        $valorProgramDes = $valuePrec->value_with_discount;
                    }
        
                    if ($valuePrec->concept == 'Incripcion nuevos') {
                        $inscrip = $valuePrec->value_ordinary;
                    }
        
                    if ($valuePrec->concept == 'Plataforma cambridge') {
                        $ingles = $valuePrec->value_ordinary;
                    }
                }
        
                if ($sinInscripcion == '1') {
                    $inscrip = 0;
                }
        
                $valorLiquidacion = (int) $valorProgram + (int) $inscrip + (int) $ingles;
        
                if ($descuento == '1') {
                    $valorLiquidacion = (int) $valorProgramDes + (int) $inscrip + (int) $ingles;
                }
        
                $numerocuota = intval($valorLiquidacion / 400000);
                $valorcuota = $valorLiquidacion/$numerocuota;
                $i;
                $numerodediasporcuota = intval($timeExpirationxinscripcion/$numerocuota);
                //dd($numerodediasporcuota );
                for($i=0;$i<$numerocuota;$i++){
                    $fechaagregada = ($i*$numerodediasporcuota)+5;
                    $timeExpiration = $time->add($fechaagregada, 'day');
                      $liquidacion = Abonoliquidacion::updateOrCreate(['id_liquidacionSerie' =>$liquidacionData->id.'.'.$i],
                      [
                                'id_liquidation' => $liquidacionData->id,
                                'user_id' => $user->id,
                                'inscription_id' => $inscripcion->id,
                                'value' => $valorcuota,
                                'dateValue' => $time,
                                'period' => $inscripcion->periodo_academico,
                                'dateExpiration' => $timeExpiration,
                    ]);
                }
                $dataAbonos  = Abonoliquidacion::where('user_id',$user->id)->get();


        return view('admin.estudiantes.pagos.abonos', compact('user', 'dataAbonos'));
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
    public function store(Request $request) {
        //
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
