<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

@extends('layouts.master-pdf')
@section('css')
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css')}}" id="icons-style" rel="stylesheet" type="text/css" />
<style>
    .mensaje{
        background:  ;
        text-align: center;
        padding-top: 1em;
        padding-bottom: 1em;
        margin-top:25px;
        margin-left:25px;
    }
    body{
        padding-top: 3em;
        padding-left: 3em;
        color: black;
    }
    h2{
        color: black;
        font-weight: 620; 
    }
    p{
        color: black;
    }
    .descripcion{
        background: #ffffff;
        border-radius:20px;
        margin-bottom:15px;
        margin-top:45px;
        margin-left:25px;
        font-size: 18px;
    }
    #botonsito{
        float: right;background-color: var(--main-blue-color);
        color: #ffffff;
        font-weight: 620;
        font-size: 15px; 
        border :0; 
    }
    .borde{
        border-right: 3px solid rgba(0, 0, 0, 1);
        margin-top:20px;
    }
</style>
@endsection
@section('content')

<div class="row align-items-center justify-content-center">
    <div class="col-10">
        <div class="card" style="background: #f5f5f5;">
            <div class="card-body contenido">

                <div class="row align-items-start justify-content-start" style="padding-top: 1em; ">
                    <div class="col-lg-4 ">
                        <div class="row justify-content-start">
                            <img  width="100%" src="{{ URL::asset('/images/factura/LOGO-AUNAR.png') }}">
                        </div>
                    </div>
                    <div class="col-lg-8 {{$respuestas->{$estado}["color-fondo"]}}" style="padding-top:10px;border-radius: 14px;">
                        <div class="row align-items-start justify-content-start mensaje">
                            <h2 class="{{$respuestas->{$estado}["color-text"]}}" style="font-size: 35px;"> {{ $respuestas->{$estado}["mensaje"]}} <i class="uil {{$respuestas->{$estado}["icon"]}} d-block display-4 mt-2 mb-3 {{$respuestas->{$estado}["color-text"]}}"></i></h2>
                        </div>  
                    </div>  
                </div>  
                <div class="row align-items-start justify-content-start" >
                    <div class="col-lg-4 borde">                                    
                        <div class="row justify-content-start ">
                            <h2 style="text-align:center; color: var(--main-blue-color);"> Solicitud de Pago </h2>
                        </div>
                        <div class="row justify-content-start">
                            <p style=" padding-left: 50px; 50px; font-size: 20px;"><b> Concepto:</b></p>                                        
                            <p style=" padding-left: 50px; font-size: 18px;">{{$dataTrans->descrip}}</p>
                        </div>

                        <div class="row justify-content-start">
                            <p style=" padding-left: 50px; font-size: 20px;"><b> Valor:</b></p>                                        
                            <p style=" padding-left: 50px;font-weight: 620; font-size: 31px; color: var(--main-blue-color);" >$ {{$dataTrans->pago}}</p>
                        </div>
                    </div>
                    <div class="col-lg-8">                        
                        <div class="descripcion" >
                            <div style="padding-top:15px;">
                                <div class="row align-items-center justify-content-start" >
                                    <div class="col-lg-5" >
                                        <p style="text-align:right; "><b> ID de Transaccion: </b></p>
                                    </div>
                                    <div class="col-lg-7">
                                        <p style="text-align:left;"> {{$dataTrans->id_trans}} </p>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-start">
                                    <div class="col-lg-5">
                                        <p style="text-align:right;"><b> Fecha de Pago:</b></p>
                                    </div>
                                    <div class="col-lg-7">
                                        <p style="text-align:left;"> {{$dataTrans->datePay}} </p>
                                    </div>
                                </div>
                                <div class="row align-items-center justify-content-start">
                                    <div class="col-lg-5">
                                        <p style="text-align:right;"><b> Orden de pago:</b></p>
                                    </div>
                                    <div class="col-lg-7">
                                        <p style="text-align:left;"> {{$dataTrans->order}}  </p>
                                    </div>
                                </div>
                            </div>    
</div>    
</div>  
</div> 
<div class="row align-items-start justify-content-start contenido">                               
    <a href="{{route('pagos.index')}}"><button id="botonsito" type="button" class="btn btn-danger">Continuar </button></a>                                   
                </div>  


            </div> 
        </div> 
    </div> 
</div>  

@endsection