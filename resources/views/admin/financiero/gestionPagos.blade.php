<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.master')
@section('title') @lang('financieroPagos.name') @endsection


@section('css')
<link href= "{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}"    rel="stylesheet" type="text/css"><style>
    #ocultar1{visibility:hidden;}
    #ocultar2{visibility:hidden;}
    #ocultar3{visibility:hidden;}
</style>
@endsection

@section('content')
@component('common-components.breadcrumb')
@slot('title'){{trans("financieroPagos.name")}}  @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("financieroPagos.name"))}} @endslot
@endcomponent 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2">
                        <a href="" type="button" class="btn btn-primary my-2"  data-bs-toggle="modal" data-bs-target="#modalCargarPago">Cargar pago manual</a>
                    </div>
                </div>
                <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <table id="datatable-buttons" class="table table-hover table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 148px;" aria-sort="ascending" aria-label="Id Oportunidad: activate to sort column descending">Id Oportunidad</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 226px;" aria-label="Nombre: activate to sort column ascending">Nombre</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 106px;" aria-label="Estado: activate to sort column ascending">Estado</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 35px;" aria-label="Ciudad: activate to sort column ascending">Valor del Pago</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 95px;" aria-label="Edad: activate to sort column ascending">Metodo de Pago</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Colegio: activate to sort column ascending">Tipo de Tarjeta</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Homologa: activate to sort column ascending">Entidad Bancaria</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Gestionar: activate to sort column ascending">Gestionar</th></tr>
                            </thead>


                            <tbody>
                                @foreach ($getDataPagos as $items)

                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0"></td>
                                    <td>{{Helper::consulDataPagoByUser_id($items->user_id)->name}}</td>
                                    <td>{{Helper::consulDataPagoByUser_id($items->user_id)->estado}}</td>
                                    <td>{{$items->amount}}</td>
                                    <td>{{$items->method}}</td>
                                    <td>{{Sed::decryption($items->card_type, Helper::consulDataPagoByUser_id($items->user_id)->documentoIdenti)}}</td>
                                    <td>{{Sed::decryption($items->card_bank_name, Helper::consulDataPagoByUser_id($items->user_id)->documentoIdenti)}}</td>
                                    <td>  <a href="" type="button"  data-bs-toggle="modal" data-bs-target="#modalGenGestionpago{{$items->id}}">Gestionar</a></td>
                                </tr>
                                @endforeach 
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>


@component('common-components.modal_cargarpago.gen_cargarpago')
@slot('user_id') {{$items->user_id}} @endslot
@slot('pago_id') {{$items->id}} @endslot
@slot('nombre') {{Helper::consulDataPagoByUser_id($items->user_id)->name}} @endslot
@slot('telefono') {{Helper::consulDataPagoByUser_id($items->user_id)->movil}} @endslot
@slot('programa') {{Helper::consulDataPagoByUser_id($items->user_id)->program}} @endslot
@slot('jornada') {{Helper::consulDataPagoByUser_id($items->user_id)->jornada}} @endslot
@endcomponent

@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection