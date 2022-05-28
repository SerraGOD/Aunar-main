<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal fade bs-example-modal-lg show" id="modalCargarPago" tabindex="-1" aria-labelledby="modalGenGestionpago" style="display: none; padding-right: 16px;" aria-modal="false" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalGengestionpagoLabel">Cargar Pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row align-items-start justify-content-center">
                    <div class="col-xl-12 ">
                        <div class="row align-items-start justify-content-center">
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p><b> ID pago </b><p>
                                    </div>
                                    <div class="row">
                                        <p> <p>
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
                                <br>
                                <br>
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
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-8">
                                    {!! Form::open(['url' => 'gestionpago']) !!}
                                    {!! Form::label('soportepago', 'Cargar Soporte de Pago');!!}
                                    {!! Form::file('soportepago', ['class' => 'form-control']); !!}
                                </div>
                            </div>    
                            <div class="row">
                                <br>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-8">
                                    {!! Form::label('descripcion', __('documentos.descripcion'));!!}
                                    {!!  Form::textarea('descripcion','',['class' => 'form-control']); !!}
                                    {!! Form::close() !!}  
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                            </div> 
                            <div class="row justify-content-end">
                                <div class="col-xl-2">
                                    <button type="button" class="btn btn-primary btn-lg waves-effect waves-light"> Gestionar</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- end row-->

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>