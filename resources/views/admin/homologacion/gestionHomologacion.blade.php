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
@slot('title'){{trans("homologacion.name")}}  @endslot
@slot('breadcrumb') {{Breadcrumbs::render(trans("homologacion.name"))}} @endslot
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
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 148px;" aria-sort="ascending" aria-label="Id Oportunidad: activate to sort column descending">Id Inscripción</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 226px;" aria-label="Nombre: activate to sort column ascending">Nombre</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 106px;" aria-label="Estado: activate to sort column ascending">Estado</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 35px;" aria-label="Ciudad: activate to sort column ascending">Ciudad</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Colegio: activate to sort column ascending">Colegio</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable-buttons" rowspan="1" colspan="1" style="width: 91px;" aria-label="Gestionar: activate to sort column ascending">Gestionar</th></tr>
                                </thead>


                                <tbody>   
                                    @foreach ($getDataHomologacion as $item)        
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">{{Helper::consultDataHomologacion($item->inscription_id)->id}}</td>
                                        <td>{{Helper::consultDataHomologacion($item->inscription_id)->name}}</td>
                                        <td>{{Helper::estadohomologacion($item->status)}}</td>
                                        <td>{{Helper::consultDataHomologacion($item->inscription_id)->municipio}}</td>
                                        <td>{{Helper::consultDataHomologacion($item->inscription_id)->colegio}}</td>
                                        <td>  <a href="" type="button"  data-bs-toggle="modal" data-bs-target=".bs-modal-genhomologacion-xl{{$item->id}}">Gestionar</a></td>
                                        @component('common-components.modal_homologacion.gen_homologacion')
                                        @slot('id_homologacion'){{$item->id}} @endslot 
                                        @slot('id_inscripcion') {{Helper::consultDataHomologacion($item->inscription_id)->id}} @endslot
                                        @slot('nombre') {{Helper::consultDataHomologacion($item->inscription_id)->name}} @endslot
                                        @slot('telefono') {{Helper::consultDataHomologacion($item->inscription_id)->movil}} @endslot
                                        @slot('programa') {{Helper::consultDataHomologacion($item->inscription_id)->program}} @endslot
                                        @slot('jornada') {{Helper::consultDataHomologacion($item->inscription_id)->jornada}} @endslot
                                        @slot('user_id') {{Helper::consultDataHomologacion($item->inscription_id)->user_id}} @endslot
                                        @endcomponent
                                    </tr>

                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>



@endsection
@section('script')
<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
@endsection

