@extends('layouts.master')
@section('title') @lang('translation.Dashboard') @endsection
@section('content')
@component('common-components.breadcrumb')
@slot('title'){{'Abonos'}}  @endslot
@slot('breadcrumb') {{'Abonos'}} @endslot
@endcomponent 
@section('css') 
<link href= "{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}"    rel="stylesheet" type="text/css">
<style>

    .b1{
        border-left-style: none;
        text-align:right;
        font-weight: bold;
    }
    .b2{
        border-right-style: none;
    }
    .b3{
        border-left-style: none;
        text-align:right;
    }
    .b4{
        border: 1px solid white;
        text-align:right;
    }
    table, td, th {

    }

</style>
@endsection



<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                @if($dataAbonos != null)
                <div class="col-3 text-center">
                    <a class="btn btn-outline-success waves-effect waves-light" href="{{route('pagos.index')}}">Ir a Pagos</a>
                </div> @endif
            </div>
        </div>

        &nbsp 
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline collapsed" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">                        
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 105px;" aria-sort="ascending" aria-label="Fecha: activate to sort column descending">ID Abono</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 164px;" aria-label="Pago: activate to sort column ascending">Nombre Usuario</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 172px;" aria-label="Entidad de Pago: activate to sort column ascending">Valor</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 176px;" aria-label="Valor: activate to sort column ascending">Fecha Expiracion</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 176px;" aria-label="Tipo pago: activate to sort column ascending">Periodo</th>
                                    <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 161.0032px; display: none;" aria-label="Cuota Automatica: activate to sort column ascending">Cuota Automatica</th>
                                </tr>
                            </thead>
                            <tbody> 
                                @foreach($dataAbonos as $items)
                                    <tr>
                                        <td tabindex="0">{{$items->id }}</td> 
                                        <td >{{Helper::consultDataAbonosFactura($items->id)->name }}</td>
                                        <td>{{Helper::consultValueInt($items->value)}}</td>
                                        <td >{{$items->dateExpiration}}</td>
                                        <td>{{$items->period}}</td>
                                        <td><a href="" type="button"  data-bs-toggle="modal" data-bs-target=".bs-modal-genAbonoFactura{{$items->id}}"><button type="button" class="btn btn-primary btn-lg waves-effect waves-light">Ver Abonos</button></a></td>                           
                                    </tr>
                                    @component('common-components.modal_abonos.genAbonosFactura') 
                                        @slot('id') {{$items->id}}  @endslot
                                        @slot('conten')
                                            <iframe id="iframeLiquidacion{{$items->id}}" src="{{route('abono.liquidacion', ['id_liquidacion' =>$items->id])}}" style="width: 100%; height: 82vh;" ></iframe>
                                        @endslot
                                    @endcomponent
                                @endforeach    


                            </tbody>
                        </table>
                    </div>
                </div>                   
            </div>
        </div>
    </div>
</div> <!-- end col -->





@endsection
@section('script')

<script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
<script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>

<!-- apexcharts -->
<script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

<script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>

@endsection