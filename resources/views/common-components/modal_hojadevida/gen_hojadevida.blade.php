<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="modal fade bs-modal-genhojadevida-xl{{$id_oportunidad}} show" tabindex="-1" aria-labelledby="modalGenHojadevidaLabel" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modalGenHojadevidaLabel">Gestion Hoja de vida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-xl-12 ">
                        <div class="row align-items-start justify-content-center">
                            {!! Form::open(['route' => 'hv.store', 'method' => 'post', 'id'=>'formHv'.$id_oportunidad]) !!}

                            <div class="col-xl-2 ">
                                <div class="row">
                                    <p><b> Nombre </b></p>
                                </div>
                                <div class="row">
                                    <p> {{$nombre}}
                                </div>
                            </div>
                            <div class="col-xl-2 ">
                                <div class="row">
                                    <p> <b>Edad</b> </p>
                                </div>
                                <div class="row">
                                    <p> {{$edad}}
                                </div>
                            </div>
                            <div class="col-xl-3 ">
                                <div class="row">
                                    <p><b> Direccion domicilio</b> </p>
                                </div>
                                <div class="row">
                                    <p> {{$direcciondomicilio}}
                                </div>
                            </div>     
                            <div class="col-xl-2 ">
                                <div class="row">
                                    <p><b> {{trans("hv.gestion")}} </b> <p>
                                        {!!  Form::select('status', ['' => 'Marcar Accion', '2' => 'Primer validación','3' => 'Validación adicional','4' => 'Aprobado'], ['class' => 'form-control form-control-lg', 'id'=>'estado']); !!}
                                </div> 
                            </div>
                            <div class="col-xl-10">
                                <br>
                                <br>
                                <p> <b> Listado de Documentos </b></p>
                            </div>
                            <div class="col-xl-5">
                                <ul>
                                    <li>Copia de                Cedula al 150% <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->copia_de_cedula}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Certificado de Afilicación a su EPS <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->certificado_eps}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Registro Civil Legible <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->registro_civil}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Acta y Diploma de Bachiller <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->acta_diploma_bachiller}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Foto Tipo Documento 3x4 Formato Jpg <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->foto_documento}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-xl-5">
                                <ul>
                                    <li>Resultados de Prueba Saber <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->resultados_saber}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Ficha de Inscripción Entregada Por Asesor<a href=" {{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->ficha_inscripcion}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Formato de Tratamiento de Datos Personales <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->formato_tratamiento}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Examen Médico General <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->examen_medico}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Examen de Serología <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->examen_serologia}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                    <li>Soporte de Pago <a href="{{Helper::consulDataDocumentsbyuserid(Helper::consultDataOpportuni($id_oportunidad)->user_id)->soporte_pago}}" class="btn btn-light waves-effect" target="_balcnk"><i class="bx bxs-file-pdf"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-xl-10">
                                {!! Form::label('correciones', trans("hv.rObsevaciones"));!!}
                                {!!  Form::textarea('correciones','',['class' => 'form-control']); !!}
                            </div>
                        </div>
                    </div>
                    {!! Form::hidden('id', $id_oportunidad) !!}
                    <div class="row justify-content-end" style="padding-top:20px;">

                        <div class="col-xl-2">
                            {{ Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-primary btn-lg waves-effect waves-light', 'id'=>'bt_hv_ok'.$id_oportunidad] )  }}
                            {!! Form::close() !!} 

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div><!-- /.modal -->
