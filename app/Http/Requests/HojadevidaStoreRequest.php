<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HojadevidaStoreRequest extends FormRequest {

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
            'status' => 'required',
            'correciones' => 'nullable|max:1200',
        ];
    }

    public function messages() {
        return [
            'id.required' => 'El campo Id es requerido.',
            'status.required' => 'El campo ' . __('hv.gestion') . ' es requerido.',
            'correciones.max' => 'El campo ' . __('hv.rObsevaciones') . ' pasa del máximo caracteres permitidos.',
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
