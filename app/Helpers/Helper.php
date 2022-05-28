<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;

use Illuminate\Support\Facades\URL;
use App\Models\Inscription;
use App\Models\Program;
use App\Models\Oportunidad;
use App\Models\User;
use App\Models\Documentos_user;
use App\Models\Hojadevida;
use App\Models\Homologacion;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use App\Models\Liquidation;
use App\Models\Price;
use App\Models\Abonoliquidacion;

class Helper {

    public static function uploadFile($fileInput, $id_user) {
        $nameFile = str_replace(' ', '_', $fileInput->getClientOriginalName());
        $ruteFile = 'Documents/' . $id_user . '/' . $nameFile;
        Storage::disk('aunar')->put($ruteFile, \File::get($fileInput));

        $file = "/storage/app/aunar/{$ruteFile}";
//        $url = Storage::disk('aunar')->url("app/aunar/{$ruteFile}");
        $url = /* Request::root() . */ $file;
//        return response()->download($file);
        return $url;
    }

    public static function setNameProgramById($program_id) {
        $program = Program::where('id', $program_id)->first();
//        dd($program->Nombre);
        return $program->Nombre;
    }

    public static function estadoinscription($indice) {
        $estado = (object) array(
                    '1' => 'Prospecto',
                    '2' => 'Aspirante',
                    '3' => 'Orden de liquidacion',
                    '4' => 'Proceso de matricula',
                    '5' => 'Matriculado',
        );
        return $estado->{$indice};
    }

    public static function estadoOportunidad($indice) {
        $estadoOportunidad = (object) array(
                    '1' => 'Por gestionar',
                    '2' => 'Primer contacto telefónico',
                    '3' => 'Contacto telefónico adicional',
                    '4' => 'Apoyo a inscripción',
                    '5' => 'Apoyo generación de liquidación',
                    '6' => 'Apoyo de carga de documentos',
                    '7' => 'Cierre de atención'
        );

        return $estadoOportunidad->{$indice};
    }

    public static function estadohojadevida($indice) {
        $estado = (object) array(
                    '1' => 'Por Gestionar',
                    '2' => 'Primer Validación',
                    '3' => 'Validación Adicional',
                    '4' => 'Aprobado'
        );
        return $estado->{$indice};
    }

    public static function estadohomologacion($indice) {
        $estadoHomolo = (object) array(
                    '1' => 'Por Homologar',
                    '2' => 'En Revisión',
                    '3' => 'Homologado',
        );
        return $estadoHomolo->{$indice};
    }

    public static function consultDataOpportuni($oportunidad_id) {
        $getDataopportunity = Oportunidad::where('id', $oportunidad_id)->get();
        $id_ins = $getDataopportunity['0']['inscription_id'];
        $getDataInscription = Inscription::where('id', $id_ins)->first();
        $getDataUser = User::where('id', $getDataopportunity['0']['student_id'])->first();
        $dataOpportunity = (object) array(
                    'id' => $oportunidad_id,
                    'user_id' => $getDataUser->id,
                    'name' => $getDataInscription->pri_nombre . ' ' . $getDataInscription->seg_nombre . ' ' . $getDataInscription->pri_apellido . ' ' . $getDataInscription->seg_apellido,
                    'movil' => $getDataUser->movil,
                    'program' => Helper::setNameProgramById($getDataInscription->programa_id),
                    'academicDay' => $getDataInscription->jornada,
                    'edad' => Helper::calcularedad($getDataInscription->fecha_nacimientos),
                    'estado' => Helper::estadoinscription($getDataInscription->status),
                    'gestion' => Helper::estadoOportunidad($getDataopportunity['0']['status']),
                    'departamento' => $getDataInscription->deparatamento_recidencia,
                    'municipio' => $getDataInscription->municipio_recidencia,
                    'direccion' => $getDataInscription->direcion_recidencia,
                    'colegio' => $getDataInscription->colegio
        );
        return $dataOpportunity;
    }

    public static function consultDataHv($hv_id) {
        $getDataHv = Hojadevida::where('id', $hv_id)->get();
        $getDataInscription = Inscription::where('id', $getDataHv['0']['inscription_id'])->first();
        $getDataUser = User::where('id', $getDataHv['0']['student_id'])->first();
        $dataOpportunity = (object) array(
                    'id' => $hv_id,
                    'user_id' => $getDataUser->id,
                    'name' => $getDataInscription->pri_nombre . ' ' . $getDataInscription->seg_nombre . ' ' . $getDataInscription->pri_apellido . ' ' . $getDataInscription->seg_apellido,
                    'movil' => $getDataUser->movil,
                    'program' => Helper::setNameProgramById($getDataInscription->programa_id),
                    'academicDay' => $getDataInscription->jornada,
                    'edad' => Helper::calcularedad($getDataInscription->fecha_nacimientos),
                    'estado' => Helper::estadoinscription($getDataInscription->status),
                    'gestion' => Helper::estadohojadevida($getDataHv['0']['status']),
                    'departamento' => $getDataInscription->deparatamento_recidencia,
                    'municipio' => $getDataInscription->municipio_recidencia,
                    'direccion' => $getDataInscription->direcion_recidencia,
                    'colegio' => $getDataInscription->colegio
        );
        return $dataOpportunity;
    }

    public static function calcularedad($fecha_nacimiento) {
        $nacimiento = new \DateTime($fecha_nacimiento);
        $ahora = new \DateTime(date("Y-m-d"));
        $diferencia = $ahora->diff($nacimiento);
        return $diferencia->format("%y");
    }

    public static function consulDataDocumentsbyuserid($user_id) {

        $getDatadocuments = Documentos_user::where('user_id', $user_id)->first();

        $datadocuments = (object) array(
                    'user_id' => $getDatadocuments->user_id,
                    'copia_de_cedula' => $getDatadocuments->copia_de_cedula,
                    'certificado_eps' => $getDatadocuments->certificado_eps,
                    'registro_civil' => $getDatadocuments->registro_civil,
                    'acta_diploma_bachiller' => $getDatadocuments->acta_diploma_bachiller,
                    'foto_documento' => $getDatadocuments->foto_documento,
                    'resultados_saber' => $getDatadocuments->resultados_saber,
                    'ficha_inscripcion' => $getDatadocuments->ficha_inscripcion,
                    'formato_tratamiento' => $getDatadocuments->formato_tratamiento,
                    'examen_medico' => $getDatadocuments->examen_medico,
                    'examen_serologia' => $getDatadocuments->examen_serologia,
                    'soporte_pago' => $getDatadocuments->soporte_pago,
                    'res_acta_homo' => $getDatadocuments->resolucion_acta_homologacion,
                    'certificado_notas' => $getDatadocuments->certificado_notas,
                    'contenidos_tematicos' => $getDatadocuments->contenidos_tematicos,
                    'carnet_vacunas' => $getDatadocuments->carnet_vacunas
        );
        return $datadocuments;
    }

    public static function valRegisHV($inscrip_id) {
        $countHv = Hojadevida::where('inscription_id', $inscrip_id)->get()->count();
//        dd($countHv);
        if ($countHv != 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public static function updateOportu() {
        $user_id = Auth::id();
        $user_profile = Auth::user()->profile;
        $estado = Helper::estadoinscription($user_profile);

        $dbinscripciones = Inscription::where('status', '1')->where('asignado_agente', '0')->get();
        //dd($dbinscripciones);
        $agentes = User::where('profile', '2')->where('status', '1')->get();
        //dd($agentes[0]->id);
        $numeroAgentes = User::where('profile', '2')->where('status', '1')->count();
        //dd($numeroAgentes);
        $repartidor = array();
        foreach ($dbinscripciones as $items) {

            $repartidor[] = $items->id;
            //dd($repartidor);
            $datosUser[$items->id] = $items->user_id;
        }
        //dd($repartidor);
        if (count($repartidor) >= $numeroAgentes) {
            $valorrepartidor = count($repartidor) / $numeroAgentes;
            //dd($valorrepartidor);
            $repartidorvista = array_chunk($repartidor, $valorrepartidor, true);

            //dd($repartidorvista);
            $i = 0;

            while ($i < $numeroAgentes) {

                foreach ($repartidorvista[$i] as $itemsrepartidor) {
                    //dd($itemsrepartidor);
                    if ((Oportunidad::where('inscription_id', $itemsrepartidor)->count()) == '0') {
                        //dd($itemsrepartidor);
                        Oportunidad::updateOrCreate([
                            'agent_id' => $agentes[$i]->id,
                            'inscription_id' => $itemsrepartidor,
                            'student_id' => $datosUser[$itemsrepartidor],
                            'status' => '1',
                            'creation_date' => Carbon::now(),
                        ]);
                        Inscription::where('id', $itemsrepartidor)->update([
                            'asignado_agente' => $agentes[$i]->id,
                        ]);
                    }
                }
                $i++;
            }
        }
        $inscripcionesvista = Inscription::where('status', '1')->where('asignado_agente', $user_id)->get();

        foreach ($inscripcionesvista as $items) {

            $repartidoroportunidades[] = $items->id;
        }
        $oportunidades = Oportunidad::whereIn('inscription_id', $repartidoroportunidades)->get();

        return $oportunidades;
    }

    public static function porcentajedeOperacioncionesporAgente($value, $meta) {

        $valor = ($value / $meta) * 100;
        $valorporcentaje = number_format($valor, 2);
        $valorporcentajeentero = number_format($valor);


        $datavalorporcentaje = (object) array(
                    "1" => array(
                        'valor' => $valorporcentaje,
                        'fondo' => 'bg-danger bg-gradient'
                    ),
                    "2" => array(
                        'valor' => $valorporcentaje,
                        'fondo' => 'bg-warning bg-gradient'
                    ),
                    "3" => array(
                        'valor' => $valorporcentaje,
                        'fondo' => 'bg-warning bg-gradient'
                    ),
                    "4" => array(
                        'valor' => $valorporcentaje,
                        'fondo' => 'bg-success bg-gradient'
                    ),
        );


        if ($valorporcentajeentero < 39 && $valorporcentajeentero >= 0) {
            $indice = '1';
        }
        if ($valorporcentajeentero < 59 && $valorporcentajeentero > 39) {
            $indice = '2';
        }
        if ($valorporcentajeentero < 79 && $valorporcentajeentero > 59) {
            $indice = '3';
        }
        if ($valorporcentajeentero < 100 && $valorporcentajeentero > 79) {
            $indice = '4';
        }

        return $datavalorporcentaje->{$indice};
    }

    public static function consultDataHomologacion($inscription_id) {
        $getDataInscription = Inscription::where('id', $inscription_id)->first();
        $getDataUser = User::where('id', $getDataInscription->user_id)->first();
        $getDataopportunity = Oportunidad::where('inscription_id', $inscription_id)->first();
        $datahomologacion = (object) array(
                    'id' => $inscription_id,
                    'user_id' => $getDataUser->id,
                    'name' => $getDataInscription->pri_nombre . ' ' . $getDataInscription->seg_nombre . ' ' . $getDataInscription->pri_apellido . ' ' . $getDataInscription->seg_apellido,
                    'movil' => $getDataUser->movil,
                    'program' => Helper::setNameProgramById($getDataInscription->programa_id),
                    'academicDay' => $getDataInscription->jornada,
                    'edad' => Helper::calcularedad($getDataInscription->fecha_nacimientos),
                    'estado' => Helper::estadoinscription($getDataInscription->status),
                    'departamento' => $getDataInscription->deparatamento_recidencia,
                    'municipio' => $getDataInscription->municipio_recidencia,
                    'direccion' => $getDataInscription->direcion_recidencia,
                    'colegio' => $getDataInscription->colegio,
                    'jornada' => $getDataInscription->jornada,
                    'homologacion' => $getDataInscription->homologacion,
        );
        return $datahomologacion;
    }

    public static function updateHomologacion() {
        $getDataInscription = Inscription::all();
        foreach ($getDataInscription as $item) {
            $getIdDataInscripcion[] = $item->id;
        }
//        dd($getIdDataInscripcion);
        $getDocuments = Documentos_user::WhereIn('user_id', $getIdDataInscripcion)->where('tipo_form', 2)->get();
//        dd($getDocuments);
        foreach ($getDocuments as $items) {
//            dd(Homologacion::where('student_id', '=', $items->user_id)->get()->count());
            if (Homologacion::where('student_id', '=', $items->user_id)->get()->count() == '0') {
                Homologacion::updateOrCreate(['student_id' => $items->user_id], [
                    'inscription_id' => $items->id,
                    'status' => '1',
                    'creation_date' => Carbon::now(),
                ]);
            }
        }

        return '';
    }

    public static function consulDataPagoByUser_id($user_id) {
//        dd($user_id);
        $getDataUser = User::where('id', $user_id)->first();
//        dd($getDataUser);
        $getDataInscription = Inscription::where('user_id', $user_id)->first();
//        dd($getDataInscription);
        $getDataopportunity = Oportunidad::where('student_id', $user_id)->first();
        $dataPago = (object) array(
                    'inscription_id' => $getDataInscription->id,
                    'user_id' => $user_id,
                    'name' => $getDataInscription->pri_nombre . ' ' . $getDataInscription->seg_nombre . ' ' . $getDataInscription->pri_apellido . ' ' . $getDataInscription->seg_apellido,
                    'movil' => $getDataUser->movil,
                    'program' => Helper::setNameProgramById($getDataInscription->programa_id),
                    'jornada' => $getDataInscription->jornada,
                    'estado' => Helper::estadoinscription($getDataInscription->status),
                    'documentoIdenti' => $getDataUser->document,
                );
        return $dataPago;
    }

    public static function consultDataAbonosFactura($id_Abono){
                $liquidacionAbonoData = Abonoliquidacion:: where('id',$id_Abono)->first();                
                $user = User::where('id', $liquidacionAbonoData->user_id)->first();
                $inscripcion = Inscription::where('id', $liquidacionAbonoData->inscription_id)->first();
                $time = \Carbon\Carbon::now();            
                $timeExpiration =  $liquidacionAbonoData->dateExpiration;              
                                                  
                $numeroOrden = str_pad($liquidacionAbonoData->id, 6, "0", STR_PAD_LEFT);
                $value = str_pad($liquidacionAbonoData->value, 8, "0", STR_PAD_LEFT);
                $date = $time->format('Ymd');

                $dataAbonos = (object) array(
                    'id_Abonos' => $liquidacionAbonoData->id,
                    'id_AbonoSerie' =>$liquidacionAbonoData->id_liquidacionSerie,
                    'name' => $inscripcion->pri_nombre . ' ' . $inscripcion->seg_nombre . ' ' . $inscripcion->pri_apellido . ' ' . $inscripcion->seg_apellido,
                    'type_Document' => $user->type_document,
                    'document' => $user->document,
                    'program' => Helper::setNameProgramById($inscripcion->programa_id),
                    'jornada' =>$inscripcion->jornada,
                    'direccion' =>$inscripcion->direcion_recidencia,
                    'numeroOrden' => $numeroOrden,
                    'valorFactura' => $value,
                    'dateFactura' =>$date,
                    'dateNow'=>$time,
                    'dateExpiration' => $timeExpiration,
                    'value' => $liquidacionAbonoData->value,
                );
                return $dataAbonos;
    }
    public static function consultValueInt($value){
    
        $valor=intval($value);
        $valor = "$ ".$valor;
        return $valor;
    }

}
