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
<link href= "{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}"    rel="stylesheet" type="text/css">
<style>
    #ocultar1{visibility:hidden;}
    #ocultar2{visibility:hidden;}
    #ocultar3{visibility:hidden;}
</style>
@endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title'){{trans("hv.names")}}  @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("hv.names"))}} @endslot
@endcomponent 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                </div>
                @endif
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="datatable-buttons" class="table  table-hover table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 148px;" aria-sort="ascending" aria-label="Id Oportunidad: activate to sort column descending">{{trans("gestionhojadevida.id_oportunidad")}}</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 226px;" aria-label="Nombre: activate to sort column ascending">{{trans("gestionhojadevida.nombre")}}</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 106px;" aria-label="Estado: activate to sort column ascending">{{trans("gestionhojadevida.estado")}}</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Gestionar: activate to sort column ascending">Gestionar</th></tr>
                                </thead>


                                <tbody> 
                                    @foreach($HojadevidaData as $items)                                
                                    <tr>
                                        <td class="dtr-control sorting_1" tabindex="0">{{Helper::consultDataHv($items->inscription_id)->id}}</td>
                                        <td>{{Helper::consultDataHv($items->inscription_id)->name}}</td>
                                        <td>{{Helper::estadohojadevida($items->status)}}</td>
                                        <td>  <a href="" type="button"  data-bs-toggle="modal" data-bs-target=".bs-modal-genhojadevida-xl{{Helper::consultDataHv($items->inscription_id)->id}}">Gestionar</a></td>
                                    </tr>

                                    @component('common-components.modal_hojadevida.gen_hojadevida')
                                    @slot('id_oportunidad') {{Helper::consultDataHv($items->inscription_id)->id}} @endslot 
                                    @slot('nombre') {{Helper::consultDataHv($items->inscription_id)->name}}@endslot
                                    @slot('idusuario') {{Helper::consultDataHv($items->inscription_id)->user_id}}@endslot
                                    @slot('edad') {{Helper::consultDataHv($items->inscription_id)->edad}} @endslot
                                    @slot('direcciondomicilio') {{Helper::consultDataHv($items->inscription_id)->direccion}} @endslot  
                                    @slot('departamento') {{Helper::consultDataHv($items->inscription_id)->departamento}} @endslot
                                    @slot('municipio') {{Helper::consultDataHv($items->inscription_id)->municipio}} @endslot
                                    @slot('celular') {{Helper::consultDataHv($items->inscription_id)->movil}} @endslot                      
                                    @endcomponent
                                    @endforeach    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row"  id="ocultar2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end col -->
</div>
@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>

@endsection