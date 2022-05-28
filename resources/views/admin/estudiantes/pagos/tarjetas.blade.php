<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
@extends('layouts.master-pdf')

@section('css')
<style>
    #textocabezera {
        background-color: var(--main-blue-color);
        border-radius: 9px;
        padding: 0.5em;
        color: white;
    }
    .contenido {
        padding: 1em;
    }
    label {
        font-size: 16px;
    }
    .letrapequeña{
        font-size: 12px;
    }
    .bordeizq{
        border-left: 2px solid #d0d0d0;
    }
    input[type=text]{
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 14px; 
        font-family: monospace;
    }
    input[type=text]:focus {
        background-color: #ebf9ff;
    }
    #botonsito{
        float: right;background-color: var(--main-yellow-color);
        color: var(--main-blue-color);
        font-weight: 620;
        font-size: 25px; 
        border :0; 
    }
    .car-body {
        padding: 0rem;
    }

    .conten-checkout-cars {
        position: relative;
        margin: 16px 0px;
    }
</style>
@endsection

@section('content')
<div class="conten-checkout-cars">
    <form action="{{route('openpay.store')}}" method="POST" id="payment-form">   
        @csrf
        <input type="hidden" name="token_id" id="token_id">
        <input type="hidden" name="use_card_points" id="use_card_points" value="false">
        <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}">
        <input type="hidden" name="numberPhone" id="numberMovil" value="{{$user->movil}}">
        <input type="hidden" name="email" id="email" value="{{$user->email}}">
        <input type="hidden" name="monto" id="monto" value="{{$liquidacion->value}}">

        <div class="row align-items-center justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body" style="background: #f5f5f5;">
                        <div class="col-12">
                            <div class="row align-items-center justify-content-start" id="cabezera">

                                <h2 id="textocabezera">Tarjeta de crédito o débito</h2>

                            </div>  
                            <div class="row align-items-center justify-content-start contenido" >
                                <div class="row align-items-start justify-content-start">
                                    <div class="col-4">
                                        <div class="row">
                                            <h6 style="font-weight: 900;">Tarjetas de crédito</h6>
                                        </div>
                                        <div class="row align-items-center justify-content-center" style="margin-top:30px;">
                                            <div class="col-12" >        
                                                <img  width="256" src="{{ URL::asset('/images/pasarela/metodos.png') }}">
                                            </div>

                                        </div>    
                                    </div>
                                    <div class="col-8 bordeizq" >
                                        <div class="row" >
                                            <h6 style="font-weight: 900;">Tarjetas de débito</h6>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">        
                                                <img  width="418" src="{{ URL::asset('/images/pasarela/Bancos.png') }}">                                                        
                                            </div>                                                   
                                        </div>                                                
                                    </div>
                                </div>
                            </div>    
                            <div class="row align-items-center justify-content-start contenido">
                                <div class="row align-items-start justify-content-start">  
                                    <div class="col-6">
                                        <div class="row align-items-start justify-content-start">                              
                                            <label>Nombre del titular</label>
                                        </div>
                                        <div class="row align-items-start justify-content-start"> 
                                            <div class="col-12">
                                                <input type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name" name="nameCard" value="Juan Perez Ramirez">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6"> 
                                        <div class="row align-items-start justify-content-start">
                                            <div class="col-12">
                                                <label>Número de tarjeta</label>
                                            </div>
                                        </div>
                                        <div class="row align-items-start justify-content-start">
                                            <div class="col-12">
                                                <input type="text" autocomplete="off" data-openpay-card="card_number" value="4111111111111111">
                                                <!--4111111111111111-->
                                                <!--36728481533333-->
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="row align-items-start justify-content-start">  
                                    <div class="col-6"> 
                                        <div class="row align-items-start justify-content-start"> 
                                            <label>Fecha de expiración</label>
                                        </div>
                                        <div class="row align-items-start justify-content-start"> 
                                            <div class="col-4"> 
                                                <input type="text" placeholder="Mes" data-openpay-card="expiration_month" value="12">
                                                <!--12-->
                                                <!--07-->
                                            </div>  
                                            <div class="col-4"> 
                                                <input type="text" placeholder="Año" data-openpay-card="expiration_year" value="22">
                                                <!--22-->
                                                <!--29-->
                                            </div> 
                                        </div>       
                                    </div>
                                    <div class="col-6">     
                                        <div class="row align-items-start justify-content-start"> 
                                            <div class="col-8"> 
                                                <label>Código de seguridad</label>
                                            </div>
                                        </div>
                                        <div class="row align-items-center justify-content-start">
                                            <div class="col-6"> 
                                                <input type="password" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2" value="651">
                                            </div>
                                            <div class="col-6">
                                                <img  width="156" src="{{ URL::asset('/images/pasarela/tarjetas.png') }}"> 
                                            </div>

                                        </div>    
                                    </div>
                                </div>
                                <div class="row align-items-start justify-content-start contenido">
                                    <div class="col-8 float-right" id="info" style="border-right: 2px solid #d0d0d0;">
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12">
                                                <div class="letrapequeña"> <p style="float: right;">Transacciones realizadas vía:</p> </div>
                                            </div>  
                                        </div>
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-12"> 
                                                <img  width="120" style="float: right;" src="{{ URL::asset('/images/pasarela/openpay.png') }}">
                                            </div>                                            </div>
                                    </div>
                                    <div class="col-4"> 
                                        <div class="row align-items-center justify-content-center">
                                            <div class="col-4">  
                                                <img  width="100.14" src="{{ URL::asset('/images/pasarela/shield.png') }}">
                                            </div>
                                            <div class="col-8">    
                                                <div class="letrapequeña">Tus pagos se realizan de forma segura con encriptación de 256 bits</div>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <div class="row align-items-start justify-content-start contenido">

                                    <a  href="#" id="pay-button"><button id="botonsito" type="button" class="btn btn-danger" disabled="true">Pagar </button></a>                                   
                                </div>  
                            </div>       
                        </div>
                    </div>                           
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://resources.openpay.co/openpay.v1.min.js"></script> 
<script type='text/javascript' src="https://resources.openpay.co/openpay-data.v1.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {
    OpenPay.setId('mbpnecurd3xny4z7dtwr');
    OpenPay.setApiKey('pk_33b5392fe3cd49839c95288d66cc7a77');
    OpenPay.setSandboxMode(true);
    var deviceSessionId = OpenPay.deviceData.setup("payment-form", "deviceIdHiddenFieldName");
    $("#botonsito").prop("disabled", false);
    $('#pay-button').on('click', function (event) {
    event.preventDefault();
    $("#pay-button").prop("disabled", true);
    var success_callbak = function (response) {
        var token_id = response.data.id;
        $('#token_id').val(token_id);
        $('#payment-form').submit();
    };
    var error_callbak = function (response) {
        var desc = response.data.description != undefined ?
                response.data.description : response.message;
        alert("ERROR [" + response.status + "] " + desc);
        $("#pay-button").prop("disabled", false);
    };
    OpenPay.token.extractFormAndCreate($('#payment-form'), success_callbak, error_callbak);
});
    
});

</script>


@endsection
