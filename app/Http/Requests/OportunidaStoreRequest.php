<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OportunidaStoreRequest extends FormRequest {

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
            'estado' => 'required',
            'descripcion' => 'required|max:1200',
        ];
    }

    public function messages() {
        return [
            'id.required' => 'El campo Id es requerido.',
            'estado.required' => 'El campo ' . __('oportunidad.estadoG') . ' es requerido.',
            'descripcion.required' => 'El campo ' . __('oportunidad.descrip') . ' es requerido.',
            'descripcion.max' => 'El campo ' . __('oportunidad.descrip') . ' pasa del máximo caracteres permitidos.',
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
