<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.master')
@section('title') @lang('inscripcion.name') @endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title'){{trans("inscripcion.name")}}  @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("inscripcion.name"))}} @endslot
@endcomponent 
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if(session()->has('message'))
                <div class="alert alert-success" role="alert">
                    <i class="uil-user-check"></i> {{ session()->get('message') }} <a href="{{route('cargadocumentos.index')}}">Ir a documentos</a>
                </div>
                @endif
                {!! Form::open(['route' => 'inscripcion.store']) !!}
                <input id="user_id" type="hidden" name="user_id" value="{{ Auth::id() }}" required>
                <div id="basic-example">
                    <!-- Seller Details -->
                    <h3>@lang('inscripcion.tap_uno')</h3>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('pri_nombre', null , ['placeholder' => 'Requerido'], __('inscripcion.pri_nombre')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('seg_nombre', null , ['placeholder' => 'Requerido'], __('inscripcion.seg_nombre')) }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('pri_apellido', null , ['placeholder' => 'Requerido'], __('inscripcion.pri_apellido')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('seg_apellido', null , ['placeholder' => 'Requerido'], __('inscripcion.seg_apellido')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('fecha_nacimientos', __('inscripcion.fecha_nacimientos'), ['class' => 'control-label']) }}
                                    {{ Form::date('fecha_nacimientos', \Carbon\Carbon::now(), array_merge(['class' => 'form-control'])) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('pais_nacimiento', __('inscripcion.pais_nacimiento'), ['class' => 'control-label']) }}
                                    {{ Form::select('pais_nacimiento', $paises, @old('pais_nacimiento'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('deparatamento_nacimiento', null , ['placeholder' => 'Requerido'], __('inscripcion.deparatamento_nacimiento')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('municipio_nacimiento', null , ['placeholder' => 'Requerido'], __('inscripcion.municipio_nacimiento')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('fecha_expedicion', __('inscripcion.fecha_expedicion'), ['class' => 'control-label']) }}
                                    {{ Form::date('fecha_expedicion', \Carbon\Carbon::now(), array_merge(['class' => 'form-control'])) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('pais_expedicion', __('inscripcion.pais_expedicion'), ['class' => 'control-label']) }}
                                    {{ Form::select('pais_expedicion', $paises, @old('pais_expedicion'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('deparatamento_expedicion', null , ['placeholder' => 'Requerido'], __('inscripcion.deparatamento_expedicion')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('municipio_expedicion', null , ['placeholder' => 'Requerido'], __('inscripcion.municipio_expedicion')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('direcion_recidencia', null , ['placeholder' => 'Requerido'], __('inscripcion.direcion_recidencia')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('pais_recidencia', __('inscripcion.pais_recidencia'), ['class' => 'control-label']) }}
                                    {{ Form::select('pais_recidencia', $paises, @old('pais_recidencia'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('deparatamento_recidencia', null , ['placeholder' => 'Requerido'], __('inscripcion.deparatamento_recidencia')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('municipio_recidencia', null , ['placeholder' => 'Requerido'], __('inscripcion.municipio_recidencia')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('genero', __('inscripcion.genero'), ['class' => 'control-label']) }}
                                    {{ Form::select('genero', ['Hombre'=>'Hombre', 'Mujer'=>'Mujer'], @old('genero'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Company Document -->
                    <h3>@lang('inscripcion.tap_dos')</h3>
                    <section>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('programa_id', __('inscripcion.programa_id'), ['class' => 'control-label']) }}
                                    {{ Form::select('programa_id', $programas, @old('programa_id'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('periodo_academico', __('inscripcion.periodo_academico'), ['class' => 'control-label']) }}
                                    <div class="row">
                                        <div class="col-6">
                                            {{ Form::number('periodo_academico_a', $now->year,  ['class' => 'form-control', 'min'=>"1900", 'max'=>"2099", 'step'=>"1", "id"=>"periodo_academico_a"]) }}
                                        </div>
                                        <div class="col-6">
                                            {{ Form::select('periodo_academico_b', ['1'=>'Primero', '2'=>'Segundo'], @old('periodo_academico_b'), ['class' => 'form-control mb-3', 'placeholder' => 'Selecione una opcion', "id"=>"periodo_academico_b"]) }}
                                            <input id="periodo_academico" type="hidden" name="periodo_academico" value="{{ old('periodo_academico') }}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('jornada', __('inscripcion.jornada'), ['class' => 'control-label']) }}
                                    {{ Form::select('jornada', ['Diurna'=>'Diurna', 'Nocturna'=>'Nocturna', 'Sabatina'=>'Sabatina'], @old('jornada'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('fecha_saber', __('inscripcion.fecha_saber'), ['class' => 'control-label']) }}
                                    {{ Form::date('fecha_saber', \Carbon\Carbon::now(), array_merge(['class' => 'form-control'])) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('codigo_saber', null , ['placeholder' => 'Requerido'], __('inscripcion.codigo_saber')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('puntaje_saber', null , ['placeholder' => 'Requerido'], __('inscripcion.puntaje_saber')) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::gText('colegio', null , ['placeholder' => 'Requerido'], __('inscripcion.colegio')) }}
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    {{ Form::label('nivel_academico', __('inscripcion.nivel_academico'), ['class' => 'control-label']) }}
                                    {{ Form::select('nivel_academico', ['Básica primaria'=>'Básica primaria', 'Secundaria'=>'Secundaria', 'Técnico'=>'Técnico', 'Tecnólogo'=>'Tecnólogo', 'Profesional'=>'Profesional', 'Analfabetismo'=>'Analfabetismo'], @old('nivel_academico'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Bank Details -->
                    <h3>@lang('inscripcion.tap_tres')</h3>
                    <section>
                        <div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('estado_civil', __('inscripcion.estado_civil'), ['class' => 'control-label']) }}
                                        {{ Form::select('estado_civil', ['Soltero'=>'Soltero', 'Casado'=>'Casado', 'Separado'=>'Separado', 'Viudo'=>'Viudo', 'Unión libre'=>'Unión libre'], @old('estado_civil'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('rh', __('inscripcion.rh'), ['class' => 'control-label']) }}
                                        {{ Form::select('rh', ['A+'=>'A+', 'A-'=>'A-', 'B+'=>'B+', 'B-'=>'B-', 'AB+'=>'AB+', 'AB-'=>'AB-', 'O+'=>'O+', 'O-'=>'O-'], @old('rh'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('estrato', __('inscripcion.estrato'), ['class' => 'control-label']) }}
                                        {{ Form::select('estrato', ['1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6'], @old('estrato'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('discapacidad', __('inscripcion.discapacidad'), ['class' => 'control-label']) }}
                                        {{ Form::select('discapacidad', ['No Aplica'=>'No Aplica', 'Sordera Profunda'=>'Sordera Profunda', 'Hipoacusia'=>'Hipoacusia', 'Ceguera'=>'Ceguera', 'Baja Visión'=>'Baja Visión', 'Sordoceguera'=>'Sordoceguera', 'Intelectual'=>'Intelectual', 'Psicosocial'=>'Psicosocial', 'Múltiple'=>'Múltiple', 'Física o Motora'=>'Física o Motora', 'Parálisis Cerebral'=>'Parálisis Cerebral', 'Lesión Neuromuscular'=>'Lesión Neuromuscular', 'Deficiencia Cognitiva (Retardo En El Desarrollo)'=>'Deficiencia Cognitiva (Retardo En El Desarrollo)'], @old('discapacidad'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('numero_de_hijos', __('inscripcion.numero_de_hijos'), ['class' => 'control-label']) }}
                                        {{ Form::select('numero_de_hijos', ['0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6 a 10'=>'6 a 10', '11 a 20'=>'11 a 20'], @old('numero_de_hijos'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::gText('libreta_militar', null , ['placeholder' => 'Requerido'], __('inscripcion.libreta_militar')) }}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::gText('eps', null , ['placeholder' => 'Requerido'], __('inscripcion.eps')) }}
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        {{ Form::label('sisben', __('inscripcion.sisben'), ['class' => 'control-label']) }}
                                        {{ Form::select('sisben', ['Si'=>'Si', 'No'=>'No'], @old('sisben'), ['class' => 'form-control', 'placeholder' => 'Selecione una opcion']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                {!! Form::close() !!}
            </div>
            <!-- end card                         body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

@endsection
@section('script')
<!-- jquery-steps js -->
<script src="{{ URL::asset('/assets/libs/jquery-steps/jquery-steps.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('/js/pages/inscripcion.js') }}"></script>
<script src="{{ URL::asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/node-waves/waves.min.js') }}"></script>
@endsection