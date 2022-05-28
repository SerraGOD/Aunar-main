<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentsCreateNewRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'user_id' => 'required',
            'tipo_form' => 'required|max:255',
            'descripcion' => 'nullable',
            'copia_de_cedula_al_150' => 'required|max:20000|mimes:pdf',
            'certificado_de_afiliacion_a_su_eps' => 'required|max:20000|mimes:pdf',
            'registro_civil_legible' => 'required|max:20000|mimes:pdf',
            'acta_y_diploma_de_bachiller' => 'required|max:20000|mimes:pdf',
            'foto_tipo_documento_3x4_formato_jpg' => 'required|max:20000|mimes:jpeg',
            'resultados_de_prueba_saber' => 'required|max:20000|mimes:pdf',
            'ficha_de_inscripcion_entregada_por_asesor' => 'required|max:20000|mimes:pdf',
            'formato_de_tratamiento_de_datos_personales' => 'required|max:20000|mimes:pdf',
            'examen_medico_general' => 'nullable|max:20000|mimes:pdf',
            'examen_de_serologia' => 'nullable|max:20000|mimes:pdf',
            'soporte_de_pago' => 'required|max:20000|mimes:pdf',
            'carnet_de_vacunas' => 'nullable|max:20000|mimes:pdf',
        ];
    }

    public function messages() {
        return [
            'tipo_form.required' => 'El campo ' . __('documentos.tipo_form') . ' es requerido.',
            'copia_de_cedula_al_150.required' => 'El campo ' . __('documentos.copia_de_cedula') . ' es requerido.',
            'copia_de_cedula_al_150.mimes' => 'El campo ' . __('documentos.copia_de_cedula') . ' debe contener un archivo de formato PDF.',
            'copia_de_cedula_al_150.max' => 'El campo ' . __('documentos.copia_de_cedula') . ' el peso máximo para el archivo es de 20MG.',
            'certificado_de_afiliacion_a_su_eps.requiredrequired' => 'El campo ' . __('documentos.certificado_eps') . ' es requerido.',
            'certificado_de_afiliacion_a_su_eps.mimes' => 'El campo ' . __('documentos.certificado_eps') . ' debe contener un archivo de formato PDF.',
            'certificado_de_afiliacion_a_su_eps.max' => 'El campo ' . __('documentos.certificado_eps') . ' el peso máximo para el archivo es de 20MG.',
            'registro_civil_legible.required' => 'El campo ' . __('documentos.registro_civil') . ' es requerido.',
            'registro_civil_legible.mimes' => 'El campo ' . __('documentos.registro_civil') . ' debe contener un archivo de formato PDF.',
            'registro_civil_legible.max' => 'El campo ' . __('documentos.registro_civil') . ' el peso máximo para el archivo es de 20MG.',
            'acta_y_diploma_de_bachiller.required' => 'El campo ' . __('documentos.acta_diploma_bachiller') . ' es requerido.',
            'acta_y_diploma_de_bachiller.mimes' => 'El campo ' . __('documentos.acta_diploma_bachiller') . ' debe contener un archivo de formato PDF.',
            'acta_y_diploma_de_bachiller.max' => 'El campo ' . __('documentos.acta_diploma_bachiller') . ' el peso máximo para el archivo es de 20MG.',
            'foto_tipo_documento_3x4_formato_jpg.required' => 'El campo ' . __('documentos.foto_documento') . ' es requerido.',
            'foto_tipo_documento_3x4_formato_jpg.mimes' => 'El campo ' . __('documentos.foto_documento') . ' debe contener un archivo de formato JPG.',
            'foto_tipo_documento_3x4_formato_jpg.max' => 'El campo ' . __('documentos.foto_documento') . ' el peso máximo para el archivo es de 20MG.',
            'resultados_de_prueba_saber.required' => 'El campo ' . __('documentos.resultados_saber') . ' es requerido.',
            'resultados_de_prueba_saber.mimes' => 'El campo ' . __('documentos.resultados_saber') . ' debe contener un archivo de formato PDF.',
            'resultados_de_prueba_saber.max' => 'El campo ' . __('documentos.resultados_saber') . ' el peso máximo para el archivo es de 20MG.',
            'ficha_de_inscripcion_entregada_por_asesor.required' => 'El campo ' . __('documentos.ficha_inscripcion') . ' es requerido.',
            'ficha_de_inscripcion_entregada_por_asesor.mimes' => 'El campo ' . __('documentos.ficha_inscripcion') . ' debe contener un archivo de formato PDF.',
            'ficha_de_inscripcion_entregada_por_asesor.max' => 'El campo ' . __('documentos.ficha_inscripcion') . ' el peso máximo para el archivo es de 20MG.',
            'formato_de_tratamiento_de_datos_personales.required' => 'El campo ' . __('documentos.formato_tratamiento') . ' es requerido.',
            'formato_de_tratamiento_de_datos_personales.mimes' => 'El campo ' . __('documentos.formato_tratamiento') . ' debe contener un archivo de formato PDF.',
            'formato_de_tratamiento_de_datos_personales.max' => 'El campo ' . __('documentos.formato_tratamiento') . ' el peso máximo para el archivo es de 20MG.',
            'examen_medico_general.mimes' => 'El campo ' . __('documentos.examen_medico') . ' debe contener un archivo de formato PDF.',
            'examen_de_serologia.mimes' => 'El campo ' . __('documentos.examen_serologia') . ' debe contener un archivo de formato PDF.',
            'examen_de_serologia.max' => 'El campo ' . __('documentos.examen_serologia') . ' el peso máximo para el archivo es de 20MG.',
            'soporte_de_pago.required' => 'El campo ' . __('documentos.soporte_pago') . ' es requerido.',
            'soporte_de_pago.mimes' => 'El campo ' . __('documentos.soporte_pago') . ' debe contener un archivo de formato PDF.',
            'soporte_de_pago.max' => 'El campo ' . __('documentos.soporte_pago') . ' el peso máximo para el archivo es de 20MG.',
             'carnet_de_vacunas.mimes' => 'El campo ' . __('documentos.carnet_vacunas') . ' debe contener un archivo de formato PDF.',
            'carnet_de_vacunas.max' => 'El campo ' . __('documentos.carnet_vacunas') . ' el peso máximo para el archivo es de 20MG.',
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
