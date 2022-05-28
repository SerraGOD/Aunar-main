<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
<head>
    <link href= "{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}"    rel="stylesheet" type="text/css">
    <style>
        #ocultar1{visibility:hidden;}
        #ocultar2{visibility:hidden;}
        #ocultar3{visibility:hidden;}
    </style>
</head>

@section('content')
@component('common-components.breadcrumb')
@slot('title'){{trans("listadoGeneral.name")}} @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("listadoGeneral.name"))}} @endslot
@endcomponent
@php
use App\Helpers\Status;
@endphp

<div class = "row">
    <div class = "col-12">
        <div class = "card">
            <div class = "card-body">

                <div id = "datatable-buttons_wrapper" class = "dataTables_wrapper dt-bootstrap4 no-footer">

                    <div class = "row">
                        <div class = "col-sm-12">
                            <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 148px;" aria-sort="ascending" aria-label="Id Oportunidad: activate to sort column descending">Id Oportunidad</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 226px;" aria-label="Nombre: activate to sort column ascending">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 106px;" aria-label="Estado: activate to sort column ascending">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 35px;" aria-label="Ciudad: activate to sort column ascending">Ciudad</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 95px;" aria-label="Edad: activate to sort column ascending">Edad</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Gestion: activate to sort column ascending">Gestion</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Colegio: activate to sort column ascending">Colegio</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Homologa: activate to sort column ascending">Homologa</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Gestionar: activate to sort column ascending">Gestionar</th></tr>
                                </thead>
                                <tbody>
                                    @foreach($oportunidades as $items)                                   
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{Helper::consultDataOpportuni($items->id)->id}}</td>
                                        <td>{{Helper::consultDataOpportuni($items->id)->name}}</td>
                                        <td>{{Helper::consultDataOpportuni($items->id)->estado}}</td>
                                        <td>{{Helper::consultDataOpportuni($items->id)->municipio}}</td>
                                        <td>{{Helper::consultDataOpportuni($items->id)->edad}}</td>
                                        <td> {{Helper::consultDataOpportuni($items->id)->gestion}}</td>
                                        <td> {{Helper::consultDataOpportuni($items->id)->colegio}}</td>
                                        <td> 
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox"  class="custom-control-input" id="customCheck1">

                                            </div></td>
                                        <td>  <a href="" class="btn btn-info btn-sm waves-effect waves-light" type="button"  data-bs-toggle="modal" data-bs-target=".bs-modal-genoportunidad-xl{{$items->id}}">Gestionar</a></td>

                                    </tr>
                                    @component('common-components.modal_oportunidad.gen_oportunidad')
                                    @slot('id_oportunidad') {{Helper::consultDataOpportuni($items->id)->id}} @endslot 
                                    @slot('nombre') {{Helper::consultDataOpportuni($items->id)->name}} @endslot
                                    @slot('telefono')  {{Helper::consultDataOpportuni($items->id)->movil}} @endslot
                                    @slot('programa') {{Helper::consultDataOpportuni($items->id)->academicDay}} @endslot
                                    @slot('jornada') {{Helper::consultDataOpportuni($items->id)->program}} @endslot
                                    @endcomponent
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--end col -->
</div>



@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection