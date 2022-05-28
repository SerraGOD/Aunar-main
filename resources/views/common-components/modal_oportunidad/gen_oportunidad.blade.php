<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal fade bs-modal-genoportunidad-xl{{$id_oportunidad}} show" tabindex="-1" aria-labelledby="modalGenoportunidadLabel" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalGenFacturaLabel">Gestion de Oportunidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">



                <div class="row align-items-start justify-content-center">
                    <div class="col-xl-12 ">
                        <div class="row align-items-start justify-content-center">
                            <div class="row">
                                {!! Form::open(['route' => 'oportunidad.store', 'method' => 'post']) !!}
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p><b> ID oportunidad </b><p>
                                    </div>
                                    <div class="row">
                                        <p> {{$id_oportunidad}} <p>
                                            {!! Form::hidden('id', $id_oportunidad) !!}
                                    </div> 
                                </div>
                                <div class="col-xl-2 ">
                                    <div class="row">
                                        <p><b> Nombre </b><p>
                                    </div>
                                    <div class="row">
                                        <p> {{$nombre}} <p>
                                    </div> 
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p> <b>Telefono</b> <p>
                                    </div>
                                    <div class="row">
                                        <p> {{$telefono}} <p>
                                    </div> 
                                </div>
                                <div class="col-xl-2 ">
                                    <div class="row">
                                        <p><b> Programa</b> <p>
                                    </div>
                                    <div class="row">
                                        <p> {{$programa}} <p>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p><b> Jornada</b> <p>
                                    </div>
                                    <div class="row">
                                        <p>{{$jornada}}<p>
                                    </div> 
                                </div>
                                <div class="col-xl-2 ">

                                    <div class="row">
                                        <p><b> Estado de la Gestion </b> <p>
                                    </div>   
                                    <div class="row">
                                        {!!  Form::select('estado', ['' => 'Marcar gestion', '2' => 'Primer contacto telefónico','3' => 'Contacto telefónico adicional','4' => 'Apoyo a inscripción','5' => 'Apoyo generación de liquidación','6' => 'Apoyo de carga de documentos','7' => 'Cierre de atención'], ['class' => 'form-control form-control-lg', 'id'=>'estado']); !!}
                                    </div> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-8">
                                    {!! Form::label('descripcion', "Descripcion");!!}
                                    {!!  Form::textarea('descripcion','',['class' => 'form-control']); !!}

                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                            </div> 
                            <div class="row justify-content-end">
                                <div class="col-xl-2">

                                    {{ Form::button('Gestionar', ['type' => 'submit', 'class' => 'class="btn btn-primary btn-lg waves-effect waves-light"'] )  }}
                                    {!! Form::close() !!} 
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end row-->

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
