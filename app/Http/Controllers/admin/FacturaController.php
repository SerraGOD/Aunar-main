<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Inscription;
use App\Models\Liquidation;
use App\Models\Price;
use App\Models\Abonoliquidacion;
use App\Helpers\Helper;

class FacturaController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
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

    public function htmlStream($user_id) {
//        dd($user_id);
        $user = User::where('id', $user_id)->first();
        $inscripcion = Inscription::where('user_id', $user_id)->first();
        $time = \Carbon\Carbon::now();
        $timeExpiration = $time->add(5, 'day');
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

        $liquidacion = Liquidation::updateOrCreate(['user_id' => $user_id, 'period' => $inscripcion->periodo_academico], [
                    'inscription_id' => $inscripcion->id,
                    'value' => $valorLiquidacion,
                    'dateValue' => $time,
                    'period' => $inscripcion->periodo_academico,
                    'dateExpiration' => $timeExpiration,
        ]);
        $numeroOrden = str_pad($liquidacion->id, 6, "0", STR_PAD_LEFT);
        $value = str_pad($liquidacion->value, 8, "0", STR_PAD_LEFT);
        $date = $time->format('Ymd');
//        dd($numeroOrden);
        $barcode = new BarcodeGenerator();
        $barcode->setText("(415)7709998742406(8020)0700" . $user->document . $numeroOrden . "(3900)" . $value . "(96)" . $date);
        // $barcode->setType(BarcodeGenerator::Gs1128);
        // $barcode->setNoLengthLimit(true);
        // $barcode->setAllowsUnknownIdentifier(true);
        // $barcode->setScale(1);
        // $barcode->setThickness(50);
        // $barcode->setFontSize(8);
        // $code = $barcode->generate();
        $code = '';
         Inscription::where('id', $inscripcion->id)->update([
                'status' => '3',
            ]);
//        dd($code);
        return view('admin.estudiantes.pagos.factura', compact('code', 'time', 'timeExpiration', 'user', 'inscripcion', 'liquidacion'));
    }

    public function abonoLiquidacion($id_Abono) {
                
                $barcode = new BarcodeGenerator();
                $barcode->setText("(415)7709998742406(8020)0700" . Helper::consultDataAbonosFactura($id_Abono)->document . Helper::consultDataAbonosFactura($id_Abono)->numeroOrden . "(3900)" . Helper::consultDataAbonosFactura($id_Abono)->value. "(96)" . Helper::consultDataAbonosFactura($id_Abono)->dateFactura);
                // $barcode->setType(BarcodeGenerator::Gs1128);
                // $barcode->setNoLengthLimit(true);
                // $barcode->setAllowsUnknownIdentifier(true);
                // $barcode->setScale(1);
                // $barcode->setThickness(50);
                // $barcode->setFontSize(8);
                // $code = $barcode->generate();
                $code = '';                
                return view('admin.estudiantes.pagos.abonosFactura', compact('code','id_Abono'));
            }

}
