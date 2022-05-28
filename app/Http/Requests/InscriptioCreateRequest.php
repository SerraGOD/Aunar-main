<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptioCreateRequest extends FormRequest {

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
            'user_id' => 'nullable|unique:inscriptions',
            'pri_nombre' => 'required|max:255',
            'seg_nombre' => 'required|max:255',
            'pri_apellido' => 'required|max:255',
            'seg_apellido' => 'required|max:255',
            'fecha_nacimientos' => 'required|max:255',
            'municipio_nacimiento' => 'required|max:255',
            'deparatamento_nacimiento' => 'required|max:255',
            'pais_nacimiento' => 'required|max:255',
            'fecha_expedicion' => 'required|max:255',
            'municipio_expedicion' => 'required|max:255',
            'deparatamento_expedicion' => 'required|max:255',
            'pais_expedicion' => 'required|max:255',
            'genero' => 'required|max:255',
            'direcion_recidencia' => 'required|max:255',
            'municipio_recidencia' => 'required|max:255',
            'deparatamento_recidencia' => 'required|max:255',
            'pais_recidencia' => 'required|max:255',
            'discapacidad' => 'required|max:255',
            'numero_de_hijos' => 'required|max:255|numeric',
            'programa_id' => 'required|max:255',
            'periodo_academico_a' => 'required|max:255',
            'periodo_academico_b' => 'required|max:255',
            'periodo_academico' => 'required|max:255',
            'jornada' => 'required|max:255',
            'fecha_saber' => 'required|max:255|date',
            'codigo_saber' => 'required|numeric',
            'puntaje_saber' => 'required|numeric',
            'colegio' => 'required|max:255',
            'estado_civil' => 'required|max:255',
            'rh' => 'required|max:255',
            'libreta_militar' => 'required|numeric',
            'estrato' => 'required|max:255',
            'nivel_academico' => 'required|max:255',
            'eps' => 'required|max:255',
            'sisben' => 'required|max:255',
        ];
    }

    public function messages() {
        return [
            'user_id.unique' => 'El usuario ya tiene un registro de inscripción.',
            'pri_nombre.required' => 'El campo ' . __('inscripcion.pri_nombre') . ' es requerido.',
            'seg_nombre.required' => 'El campo ' . __('inscripcion.seg_nombre') . ' es requerido.',
            'pri_apellido.required' => 'El campo ' . __('inscripcion.pri_apellido') . ' es requerido.',
            'seg_apellido.required' => 'El campo ' . __('inscripcion.seg_apellido') . ' es requerido.',
            'fecha_nacimientos.required' => 'El campo ' . __('inscripcion.fecha_nacimientos') . ' es requerido.',
            'municipio_nacimiento.required' => 'El campo ' . __('inscripcion.municipio_nacimiento') . ' es requerido.',
            'deparatamento_nacimiento.required' => 'El campo ' . __('inscripcion.deparatamento_nacimiento') . ' es requerido.',
            'pais_nacimiento.required' => 'El campo ' . __('inscripcion.pais_nacimiento') . ' es requerido.',
            'fecha_expedicion.required' => 'El campo ' . __('inscripcion.fecha_expedicion') . ' es requerido.',
            'municipio_expedicion.required' => 'El campo ' . __('inscripcion.municipio_expedicion') . ' es requerido.',
            'deparatamento_expedicion.required' => 'El campo ' . __('inscripcion.deparatamento_expedicion') . ' es requerido.',
            'pais_expedicion.required' => 'El campo ' . __('inscripcion.pais_expedicion') . ' es requerido.',
            'estado_civil.required' => 'El campo ' . __('inscripcion.estado_civil') . ' es requerido.',
            'rh.required' => 'El campo ' . __('inscripcion.rh') . ' es requerido.',
            'genero.required' => 'El campo ' . __('inscripcion.genero') . ' es requerido.',
            'libreta_militar.required' => 'El campo ' . __('inscripcion.libreta_militar') . ' es requerido.',
            'libreta_militar.numeric' => 'El campo ' . __('inscripcion.libreta_militar') . ' debe ser un numero.',
            'estrato.required' => 'El campo ' . __('inscripcion.estrato') . ' es requerido.',
            'direcion_recidencia.required' => 'El campo ' . __('inscripcion.direcion_recidencia') . ' es requerido.',
            'municipio_recidencia.required' => 'El campo ' . __('inscripcion.municipio_recidencia') . ' es requerido.',
            'deparatamento_recidencia.required' => 'El campo ' . __('inscripcion.deparatamento_recidencia') . ' es requerido.',
            'pais_recidencia.required' => 'El campo ' . __('inscripcion.pais_recidencia') . ' es requerido.',
            'discapacidad.required' => 'El campo ' . __('inscripcion.discapacidad') . ' es requerido.',
            'numero_de_hijos.required' => 'El campo ' . __('inscripcion.numero_de_hijos') . ' es requerido.',
            'programa_id.required' => 'El campo ' . __('inscripcion.programa_id') . ' es requerido.',
            'periodo_academico.required' => 'El campo ' . __('inscripcion.periodo_academico') . ' es requerido.',
            'jornada.required' => 'El campo ' . __('inscripcion.jornada') . ' es requerido.',
            'fecha_saber.required' => 'El campo ' . __('inscripcion.fecha_saber') . ' es requerido.',
            'codigo_saber.required' => 'El campo ' . __('inscripcion.codigo_saber') . ' es requerido.',
            'codigo_saber.numeric' => 'El campo ' . __('inscripcion.codigo_saber') . ' debe ser un numero.',
            'puntaje_saber.required' => 'El campo ' . __('inscripcion.puntaje_saber') . ' es requerido.',
            'puntaje_saber.numeric' => 'El campo ' . __('inscripcion.puntaje_saber') . ' debe ser un numero.',
            'colegio.required' => 'El campo ' . __('inscripcion.colegio') . ' es requerido.',
            'nivel_academico.required' => 'El campo ' . __('inscripcion.nivel_academico') . ' es requerido.',
            'eps' => 'El campo ' . __('inscripcion.eps') . ' es requerido.',
            'sisben' => 'El campo ' . __('inscripcion.sisben') . ' es requerido.',
        ];
    }

    public function attributes() {
        return [
                //
        ];
    }

}
