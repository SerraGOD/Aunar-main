<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomologacionRequest extends FormRequest {

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
            'id' => 'required',
            'user_id' => 'required',
            'status' => 'required',
            'resolucion_actadehomologacion' => 'nullable|max:20000|mimes:pdf',
            'descripcion' => 'required|max:1200',
        ];
    }

    public function messages() {
        return [
            'status.required' => 'El campo Estado de la Gestion es requerido.',
            'id.required' => 'El campo Id es requerido.',
            'user_id.required' => 'El campo user_id es requerido.',
            'resolucion_actadehomologacion.required' => 'El campo ' . __('homologacion.inputResoActaHomo') . ' es requerido.',
            'resolucion_actadehomologacion.mimes' => 'El campo ' . __('homologacion.inputResoActaHomo') . ' debe contener un archivo de formato PDF.',
            'resolucion_actadehomologacion.max' => 'El campo ' . __('homologacion.inputResoActaHomo') . ' el peso máximo para el archivo es de 20MG.',
            'descripcion.required' => 'El campo ' . __('documentos.descripcion') . ' es requerido.',
            'descripcion.max' => 'El campo ' . __('documentos.descripcion') . ' pasa del máximo caracteres permitidos.',
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
