<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use App\Helpers\Helper;
use App\Http\Requests\DocumentsCreateNewRequest;
use App\Http\Requests\DocumentsCreateHomologRequest;
use App\Models\Documentos_user;
use App\Helpers\ActionValidate;

class cargadocumentoController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($typeForm = '1') {
        $user = Auth::user();
        $dataDocuments = Documentos_user::where('user_id',$user->id)->first();      
        
        return view('admin.estudiantes.cargadedocumentos.cargadocumentos', compact('typeForm','dataDocuments'));
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
    public function storeNew(DocumentsCreateNewRequest $request) {

        $copia_de_cedula_al_150 = Helper::uploadFile($request->file('copia_de_cedula_al_150'), $request->user_id);
        $certificado_de_afiliacion_a_su_eps = Helper::uploadFile($request->file('certificado_de_afiliacion_a_su_eps'), $request->user_id);
        $registro_civil_legible = Helper::uploadFile($request->file('registro_civil_legible'), $request->user_id);
        $acta_y_diploma_de_bachiller = Helper::uploadFile($request->file('acta_y_diploma_de_bachiller'), $request->user_id);
        $foto_tipo_documento_3x4_formato_jpg = Helper::uploadFile($request->file('foto_tipo_documento_3x4_formato_jpg'), $request->user_id);
        $resultados_de_prueba_saber = Helper::uploadFile($request->file('resultados_de_prueba_saber'), $request->user_id);
        $ficha_de_inscripcion_entregada_por_asesor = Helper::uploadFile($request->file('ficha_de_inscripcion_entregada_por_asesor'), $request->user_id);
        $formato_de_tratamiento_de_datos_personales = Helper::uploadFile($request->file('formato_de_tratamiento_de_datos_personales'), $request->user_id);
        $examen_medico_general = Helper::uploadFile($request->file('examen_medico_general'), $request->user_id);
        $examen_de_serologia = Helper::uploadFile($request->file('examen_de_serologia'), $request->user_id);
        $soporte_de_pago = Helper::uploadFile($request->file('soporte_de_pago'), $request->user_id);

        if (ActionValidate::validFile104600(ActionValidate::querryProgram($request->user_id, 'Codigo'))) {
            $carnet_vacunas = Helper::uploadFile($request->file('carnet_de_vacunas'), $request->user_id);
        }

        Documentos_user::updateOrCreate(['user_id' => $request->user_id], [
            'tipo_form' => $request->tipo_form,
            'descripcion' => $request->descripcion,
            'copia_de_cedula' => $copia_de_cedula_al_150,
            'certificado_eps' => $certificado_de_afiliacion_a_su_eps,
            'registro_civil' => $registro_civil_legible,
            'acta_diploma_bachiller' => $acta_y_diploma_de_bachiller,
            'foto_documento' => $foto_tipo_documento_3x4_formato_jpg,
            'resultados_saber' => $resultados_de_prueba_saber,
            'ficha_inscripcion' => $ficha_de_inscripcion_entregada_por_asesor,
            'formato_tratamiento' => $formato_de_tratamiento_de_datos_personales,
            'examen_medico' => $examen_medico_general,
            'examen_serologia' => $examen_de_serologia,
            'soporte_pago' => $soporte_de_pago,
            'actualizacion_activa' => '0',
        ]);

        if (ActionValidate::validFile104600(ActionValidate::querryProgram($request->user_id, 'Codigo'))) {
            Documentos_user::updateOrCreate(['user_id' => $request->user_id], [
                'carnet_vacunas' => $carnet_vacunas,
            ]);
        }
//        dd($as);
//        return back()->withErrors($request)->withInput();
        return redirect()->route('escritorio');
//        return $request;
    }

    public function storeHomolog(DocumentsCreateHomologRequest $request) {

        $copia_de_cedula_al_150 = Helper::uploadFile($request->file('copia_de_cedula_al_150'), $request->user_id);
        $certificado_de_afiliacion_a_su_eps = Helper::uploadFile($request->file('certificado_de_afiliacion_a_su_eps'), $request->user_id);
        $registro_civil_legible = Helper::uploadFile($request->file('registro_civil_legible'), $request->user_id);
        $acta_y_diploma_de_bachiller = Helper::uploadFile($request->file('acta_y_diploma_de_bachiller'), $request->user_id);
        $foto_tipo_documento_3x4_formato_jpg = Helper::uploadFile($request->file('foto_tipo_documento_3x4_formato_jpg'), $request->user_id);
        $resultados_de_prueba_saber = Helper::uploadFile($request->file('resultados_de_prueba_saber'), $request->user_id);
        $ficha_de_inscripcion_entregada_por_asesor = Helper::uploadFile($request->file('ficha_de_inscripcion_entregada_por_asesor'), $request->user_id);
        $formato_de_tratamiento_de_datos_personales = Helper::uploadFile($request->file('formato_de_tratamiento_de_datos_personales'), $request->user_id);
        $examen_medico_general = Helper::uploadFile($request->file('examen_medico_general'), $request->user_id);
        $examen_de_serologia = Helper::uploadFile($request->file('examen_de_serologia'), $request->user_id);
        $soporte_de_pago = Helper::uploadFile($request->file('soporte_de_pago'), $request->user_id);
        $resolución_y_acta_de_homologación = Helper::uploadFile($request->file('resolución_y_acta_de_homologación'), $request->user_id);
        $certificado_de_notas = Helper::uploadFile($request->file('certificado_de_notas'), $request->user_id);
        $contenido_tematico = Helper::uploadFile($request->file('contenido_tematico'), $request->user_id);

        if (ActionValidate::validFile104600(ActionValidate::querryProgram($request->user_id, 'Codigo'))) {
            $carnet_vacunas = Helper::uploadFile($request->file('carnet_de_vacunas'), $request->user_id);
        }

        Documentos_user::updateOrCreate(['user_id' => $request->user_id], [
            'tipo_form' => $request->tipo_form,
            'descripcion' => $request->descripcion,
            'copia_de_cedula' => $copia_de_cedula_al_150,
            'certificado_eps' => $certificado_de_afiliacion_a_su_eps,
            'registro_civil' => $registro_civil_legible,
            'acta_diploma_bachiller' => $acta_y_diploma_de_bachiller,
            'foto_documento' => $foto_tipo_documento_3x4_formato_jpg,
            'resultados_saber' => $resultados_de_prueba_saber,
            'ficha_inscripcion' => $ficha_de_inscripcion_entregada_por_asesor,
            'formato_tratamiento' => $formato_de_tratamiento_de_datos_personales,
            'examen_medico' => $examen_medico_general,
            'examen_serologia' => $examen_de_serologia,
            'soporte_pago' => $soporte_de_pago,
            'resolucion_acta_homologacion' => $resolución_y_acta_de_homologación,
            'certificado_notas' => $certificado_de_notas,
            'contenidos_tematicos' => $contenido_tematico,
            'actualizacion_activa' => '0',
        ]);

        if (ActionValidate::validFile104600(ActionValidate::querryProgram($request->user_id, 'Codigo'))) {
            Documentos_user::updateOrCreate(['user_id' => $request->user_id], [
                'carnet_vacunas' => $carnet_vacunas,
            ]);
        }
//        dd($as);
//        return back()->withErrors($request)->withInput();
        return redirect()->route('escritorio');
//        return $request;
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
    public function update(Request $request) {
        dd($request);
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

    public function typeForm(Request $request) {
        switch ($request->Tipo_de_Solicitud_Selecion) {
            case 1:
                $typeForm = '1';
                break;
            case 2:
                $typeForm = '2';
                break;
        }

        return redirect()->route('cargadocumentos.index', compact('typeForm'));
    }

}
