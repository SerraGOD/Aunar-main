<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal fade bs-modal-genhomologacion-xl{{$id_homologacion}} show" tabindex="-1" aria-labelledby="modalGenHomologacionLabel" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalGenHomologacionLabel">Gestion de Oportunidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">

                <div class="row align-items-start justify-content-center">
                    <div class="col-xl-10 ">
                        <div class="row align-items-start justify-content-center">
                            <div class="row">
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p><b> ID inscripción </b><p>
                                        <p> {{$id_inscripcion}} <p>
                                    </div> 
                                </div>
                                <div class="col-xl-2 ">
                                    <div class="row">
                                        <p><b> Nombre </b><p>
                                        <p> {{$nombre}} <p>
                                    </div> 
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p> <b>Telefono</b> <p>
                                        <p> {{$telefono}} <p>
                                    </div> 
                                </div>
                                <div class="col-xl-4 ">
                                    <div class="row">
                                        <p><b> Programa</b> <p>
                                        <p> {{$programa}} <p>
                                    </div>
                                </div>
                                <div class="col-xl-2">
                                    <div class="row">
                                        <p><b> Jornada</b> <p>
                                        <p>{{$jornada}}<p>
                                    </div> 
                                </div>
                            </div>
                            <div class="col-xl-5">
                                <ul>
                                    <li>Copia de Cedula al 150% <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->copia_de_cedula}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Resultados de Prueba Saber 11 <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->resultados_saber}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Certificado de Notas Original <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->certificado_eps}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Titulo del Técnico o Tecnólogo <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->certificado_eps}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-xl-5">
                                <ul>
                                    <li>Acta y Diploma de Bachiller <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->acta_diploma_bachiller}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Formato de Estudios de Homologacion <a href="{{Helper::consulDataDocumentsbyuserid($user_id)->formato_tratamiento}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Contenido Tematico <a href=" {{Helper::consulDataDocumentsbyuserid($user_id)->ficha_inscripcion}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-8">
                                    <p><b> {{trans("hv.gestion")}} </b> <p>
                                        {!! Form::open(['route' => 'homologacion.store', 'files' => true, 'method' => 'post']) !!}
                                        {!!  Form::select('status', ['' => 'Marcar Accion', '2' => 'En revisión','3' => 'Homologado'], ['class' => 'form-control form-control-lg', 'id'=>'status']); !!}
                                </div> 
                            </div>
                            <div class="row">
                                <div class="col-xl-2">
                                </div>
                                <div class="col-xl-8">
                                    {!! Form::label('resolucion_actadehomologacion', trans('homologacion.inputResoActaHomo'));!!}
                                    {!! Form::file('resolucion_actadehomologacion', ['class' => 'form-control']); !!}
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
                                    {!! Form::label('descripcion', trans('documentos.descripcion'));!!}
                                    {!!  Form::textarea('descripcion','',['class' => 'form-control']); !!}
                                    {!! Form::hidden('id', $id_homologacion) !!} 
                                    {!! Form::hidden('user_id', $user_id) !!}   
                                </div>
                            </div>
                            <div class="row">
                                <br>
                                <br>
                            </div> 
                            <div class="row justify-content-end">
                                <div class="col-xl-2">
                                    {{ Form::button('Gestionar', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg waves-effect waves-light '] )  }}
                                    {!! Form::close() !!}  
                                </div>
                            </div>

                        </div>    
                    </div>
                </div> <!-- end row-->

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>