<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('css')
<link href="http://minible-v-light.laravel.themesbrand.com/assets/libs/datatables/datatables.min.css" rel="stylesheet" type="text/css">
<style>
    p{
        padding-top: 10px;
        font-size: 20px;
        font-weight: 900;
    }
</style>
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title'){{trans("reportesAdmicionesC.name2")}}  @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("reportesAdmicionesC.name2"))}} @endslot
@endcomponent 


<div class="row align-items-start justify-content-start">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <div id="stocks-div"></div>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">

                <div id="stocks2-div"></div>
            </div>    
        </div>
    </div>
</div>       
<div class="row align-items-start justify-content-start mx-md-n5">
    <div class="col-lg-7">
        <div class="card">
            <div class="card-body">    
                <div class="row align-items-start justify-content-start mx-md-n5">                        
                    <div class="col-lg-6" style="padding-left: 1em;">
                        <p>Operaciones totales</p>
                    </div>
                    <div  style="border-radius: 10px;" class="col-lg-6 {{Helper::porcentajedeOperacioncionesporAgente($numeroperaciones,$metaoperaciones)['fondo'] }}">
                        <p> {{Helper::porcentajedeOperacioncionesporAgente($numerOperacionesConAccion,$metaoperaciones)['valor'] }}%/100% <b> - </b> {{$numerOperacionesConAccion}}/{{$metaoperaciones}}  </p>
                    </div>   
                </div> 
            </div>
        </div>
    </div>
</div>   

@endsection

@linechart('Stocks', 'stocks-div')
@donutchart('Stocks2', 'stocks2-div')


@section('script')

<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="http://minible-v-light.laravel.themesbrand.com/assets/js/pages/datatables.init.js"></script>
<script src="http://minible-v-light.laravel.themesbrand.com/assets/js/app.min.js"></script>
@endsection
