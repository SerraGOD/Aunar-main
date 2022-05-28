<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Openpay;
use Exception;
use OpenpayApiError;
use OpenpayApiAuthError;
use OpenpayApiRequestError;
use OpenpayApiConnectionError;
use OpenpayApiTransactionError;
use Illuminate\Http\JsonResponse;
use CodeItNow\BarcodeBundle\Utils\BarcodeGenerator;
use App\Models\User;
use App\Models\Inscription;
use App\Models\Liquidation;
use App\Models\Program;
use App\Models\Pago;
use Carbon\Carbon;
use App\Helpers\Sed;

require_once '../vendor/autoload.php';

class OpenPayController extends Controller {

    function __construct() {
        
    }
    /**
     * Create charge in OpenPay
     * https://www.openpay.mx/docs/api/?php#con-id-de-tarjeta-o-token
     * 
     */
    public function store(Request $request) {
        $respuestas = (object) array(
                    "pago_exitoso" => array(
                        'mensaje' => 'Muchas Gracias, Su pago se ha completado con exito.',
                        'error' => '0',
                        'color-text' => 'text-success',
                        'color-fondo' => 'bg-soft-success',
                        'icon' => 'uil-check-circle'),
                    "error_medio_pago" => array(
                        'mensaje' => 'Ha ocurrido un error con tu medio de pago',
                        'error' => '2',
                        'color-text' => 'text-danger',
                        'color-fondo' => 'bg-soft-danger',
                        'icon' => 'uil-exclamation-octagon'),
                    "fondos_insuficientes" => array(
                        'mensaje' => 'Fondos Insuficientes',
                        'error' => '3',
                        'color-text' => 'text-danger',
                        'color-fondo' => 'bg-soft-danger',
                        'icon' => 'uil-exclamation-octagon'),
                    "pago_ejecutado" => array(
                        'mensaje' => 'El número de orden ya tiene un pago registrado, verifique con su entidad si ya registra el pago, o comuníquese con el área financiera para verificar el inconveniente.',
                        'error' => '5',
                        'color-text' => 'text-warning',
                        'color-fondo' => 'bg-soft-warning',
                        'icon' => 'uil-exclamation-triangle'),
                    "no_completado" => array(
                        'mensaje' => 'No se ha logrado completar el pago, al parecer hay un error entre el comercio y el sistema financiero, por favor no se desespere contante a su entidad financiera para corroborar que no tengan ningún cargo en su cuenta.',
                        'error' => '1',
                        'color-text' => 'text-danger',
                        'color-fondo' => 'bg-soft-danger',
                        'icon' => 'uil-exclamation-octagon'),
                    "no_conexion" => array(
                        'mensaje' => 'Se presenta un fallo con tu conexión, por favor revisa si tiene acceso a la red de internet o existe una restricción, e intenta de nuevo.',
                        'error' => '5',
                        'color-text' => 'text-warning',
                        'color-fondo' => 'bg-soft-warning',
                        'icon' => 'uil-exclamation-triangle'),
                    "no_respuesta" => array(
                        'mensaje' => 'No se presenta respuesta para este servicio de pagos, por favor verifique su ancho de banda, punto de conexión ya que no hay respuesta del sistema financiero.',
                        'error' => '6',
                        'color-text' => 'text-warning',
                        'color-fondo' => 'bg-soft-warning',
                        'icon' => 'uil-exclamation-triangle'),
                    "no_autenticacion" => array(
                        'mensaje' => 'El comercio no puede conectarse al servicio de pagos, por favor verifique el estado de su navegador y/o punto de red, ya que puede que no sea fiable sus conexiones.',
                        'error' => '6',
                        'color-text' => 'text-warning',
                        'color-fondo' => 'bg-soft-warning',
                        'icon' => 'uil-exclamation-triangle'),
        );

        $user = User::where('id', $request->user_id)->first();
        $inscripcion = Inscription::where('user_id', $request->user_id)->first();
        $liquidacion = Liquidation::where('user_id', $request->user_id)->where('period', $inscripcion->periodo_academico)->first();
        $program = Program::where('id', $inscripcion->programa_id)->first();
//            dd($liquidacion);
        $estado = "pago_exitoso";
        try {
            // create instance OpenPay
            $openpay = \Openpay::getInstance('mbpnecurd3xny4z7dtwr', 'sk_b122651daeb54553b818ae9c83339deb', 'CO');

//            Openpay::setProductionMode(env('false'));
            // create object customer
            $customer = array(
                'name' => $inscripcion->pri_nombre . ' ' . $inscripcion->seg_nombre,
                'last_name' => $inscripcion->pri_apellido . ' ' . $inscripcion->seg_apellido,
                'phone_number' => $request->numberPhone,
                'email' => $request->email
            );

            $customer = array(
                'name' => $inscripcion->pri_nombre . ' ' . $inscripcion->seg_nombre,
                'last_name' => $inscripcion->pri_apellido . ' ' . $inscripcion->seg_apellido,
                'phone_number' => $request->numberPhone,
                'email' => $request->email);

            // create object charge
            $chargeRequest = array(
                'method' => 'card',
                'source_id' => $request->token_id,
                'amount' => (int) '100',
                'currency' => 'COP',
                "iva" => "0",
                'description' => 'Pago Aunar Villavicencio ' . $program->Nombre,
                'order_id' => 'AunarVill107' . $liquidacion->id,
                'device_session_id' => $request->deviceIdHiddenFieldName,
                'customer' => $customer
            );

            $charge = $openpay->charges->create($chargeRequest);
            $charge2 = $openpay->charges->get($charge->id);
            $res = Pago::create([
                        'user_id' => $request->user_id,
                        'liquidacion_id' => $liquidacion->id,
                        'transfer_id' => Sed::encryption($charge->id, $user->document),
                        'amount' => $charge2->serializableData['amount'],
                        'authorization' => Sed::encryption($charge2->authorization, $user->document),
                        'method' => $charge2->serializableData['method'],
                        'operation_type' => $charge2->operation_type,
                        'transaction_type' => $charge2->transaction_type,
                        'pay_type' => Sed::encryption($charge2->card->type, $user->document),
                        'pay_brand' => Sed::encryption($charge2->card->brand, $user->document),
                        'pay_holder_name' => Sed::encryption($charge2->card->serializableData['holder_name'], $user->document),
                        'pay_allows_charges' => $charge2->card->allows_charges,
                        'pay_allows_payouts' => $charge2->card->allows_payouts,
                        'pay_bank_name' => Sed::encryption($charge2->card->bank_name, $user->document),
                        'status' => Sed::encryption($charge2->status, $user->document),
                        'currency' => Sed::encryption($charge2->currency, $user->document),
                        'creation_date' => Carbon::parse($charge2->creation_date)->format('Y-m-d H:i:s'),
                        'operation_date' => Carbon::parse($charge2->serializableData['operation_date'])->format('Y-m-d H:i:s'),
                        'description' => $charge2->serializableData['description'],
                        'error_message' => $charge2->serializableData['error_message'],
                        'order_id' => Sed::encryption($charge2->serializableData['order_id'], $user->document),
            ]);

            $dataTrans = (object) array('pago' => $charge2->serializableData['amount'], 'id_trans' => $charge->id, 'datePay' => Carbon::parse($charge2->serializableData['operation_date'])->format('Y-m-d H:i:s'), 'descrip' => $charge2->serializableData['description'], 'order' => $charge2->serializableData['order_id']);
            if ($charge->id) {
                return view('admin.estudiantes.pagos.alertpago', compact('respuestas', 'estado', 'dataTrans'));
            }
        } catch (OpenpayApiTransactionError $e) {

            if ($e->getErrorCode() == '1006') {
                $dataTrans = (object) array('pago' => '--', 'id_trans' => '--', 'datePay' => '--', 'descrip' => '!Ya hay un pago registrado¡', 'order' => 'AunarVill' . $liquidacion->id);
                $estado = "pago_ejecutado";
                return view('admin.estudiantes.pagos..alertpago', compact('respuestas', 'estado', 'dataTrans'));
            }
            return response()->json([
                        'error' => [
                            'category' => $e->getCategory(),
                            'error_code' => $e->getErrorCode(),
                            'description' => $e->getMessage(),
                            'http_code' => $e->getHttpCode(),
                            'request_id' => $e->getRequestId()
                        ]
            ]);
        } catch (OpenpayApiRequestError $e) {

            $dataTrans = (object) array('pago' => '--', 'id_trans' => '--', 'datePay' => '--', 'descrip' => '--', 'order' => '--');
            $estado = "no_completado";
            return view('admin.estudiantes.pagos.alertpago', compact('respuestas', 'estado', 'dataTrans'));
        } catch (OpenpayApiConnectionError $e) {

            $dataTrans = (object) array('pago' => '--', 'id_trans' => '--', 'datePay' => '--', 'descrip' => '--', 'order' => '--');
            $estado = "no_conexion";
            return view('admin.estudiantes.pagos.alertpago', compact('respuestas', 'estado', 'dataTrans'));
        } catch (OpenpayApiAuthError $e) {

            $dataTrans = (object) array('pago' => '--', 'id_trans' => '--', 'datePay' => '--', 'descrip' => '--', 'order' => '--');
            $estado = "no_autenticacion";
            return view('admin.estudiantes.pagos.alertpago', compact('respuestas', 'estado', 'dataTrans'));
        } catch (OpenpayApiError $e) {

            $dataTrans = (object) array('pago' => '--', 'id_trans' => '--', 'datePay' => '--', 'descrip' => '--', 'order' => '--');
            $estado = "no_respuesta";
            return view('admin.estudiantes.pagos.alertpago', compact('respuestas', 'estado', 'dataTrans'));
        } catch (Exception $e) {
            return response()->json([
                        'error' => [
                            'category' => $e->getCategory(),
                            'error_code' => $e->getErrorCode(),
                            'description' => $e->getMessage(),
                            'http_code' => $e->getHttpCode(),
                            'request_id' => $e->getRequestId()
                        ]
            ]);
        }
    }

    public function token() {
        return view('admin.estudiantes.pagos.generarToken');
    }

    public function getToken(Request $request) {
        return $request;
    }

}