@extends('layouts.master-pdf')
@section('content')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Barcode+128&display=swap" rel="stylesheet">            
<style>

    .bordes{
        border: 1px solid black !important;
        border-top: 1px solid black !important;    
    }
    #codigodebarras{
        font-family: 'Libre Barcode 128', cursive;
        font-size: 60px;
    }
    #mediosdepago{
        font-size: 11px;
    }

    .cambiocolor{
        color: lighten($colorazul, 50%);
    }
    table {
        border: solid 0px white !important;
    }
    #Tabla_principal {
        width: 694px;
        position: relative;
        margin: 0px auto;
    }

    .table>:not(caption)>*>* {
        padding: 0.2rem !important;
    }
</style>                 
<div class="row align-items-start justify-content-center">
    <div class="col-xl-12 ">
        <div class="row align-items-start justify-content-center">
            <div class="table-responsive-xl">
                <table class="table mb-0" id="Tabla_principal">
                    <thead>
                        <tr>
                            <th style="width: 600px;">
                                <img  width="100%" src="{{ URL::asset('/images/factura/LOGO-AUNAR.png') }}">
                            </th>
                            <th style="width: 506px; text-align: center; font-size: 13px;"><p><b>
                                        CORPORACION UNIVERSITARIA AUTONOMA DE NARIÑO "AUNAR" <br>
                                        891.224.762.5 <br>
                                        kr 48 sur cll 1 anillo vial/ via acacias - Tel:  6823030                                    
                                    </b></p></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>    
                            <td  colspan="2" scope="row" align="center" valign="center">
                                <div style="position: relative; width: 100%; height: 20px;"><p style="position: absolute;"><b>Liquidacion # {{Helper::consultDataAbonosFactura($id_Abono)->id_AbonoSerie}}</b></p></div>
                                <table class="table bordes mb-0">
                                    <tbody>
                                        <tr>
                                            <th  class="table-active bordes" scope="row">Estudiantes</th>
                                            <td>{{ Helper::consultDataAbonosFactura($id_Abono)->name}}</td>
                                            <th   class="table-active bordes" scope="row">Fecha</th>
                                            <td>{{Helper::consultDataAbonosFactura($id_Abono)->dateFactura}}</td>
                                        </tr>
                                        <tr>
                                            <th  class="table-active bordes" scope="row">Direccion</th>
                                            <td>{{Helper::consultDataAbonosFactura($id_Abono)->direccion }}</td>
                                            <th   class="table-active bordes " scope="row">Identificacion</th>
                                            <td>{{Helper::consultDataAbonosFactura($id_Abono)->type_Document }}.{{Helper::consultDataAbonosFactura($id_Abono)->document }}</td>
                                        </tr>
                                        <tr>
                                            <th class="table-active bordes" scope="row">Programa</th>
                                            <td>{{Helper::consultDataAbonosFactura($id_Abono)->program}}</td>
                                            <th   class="table-active bordes" scope="row">Jornada</th>
                                            <td>{{Helper::consultDataAbonosFactura($id_Abono)->jornada}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th   colspan="2" scope="row">
                                <table class="table bordes  mb-0">
                                    <tbody>
                                        <tr>
                                            <th colspan="3"  class="table-active bordes" scope="row">CONCEPTOS </th>
                                            <th   class="table-active bordes" scope="row">VALOR </th>
                                        </tr>
                                        <tr>
                                            <td colspan="3"   scope="row"> {{Helper::consultDataAbonosFactura($id_Abono)->program}}</td>
                                            <td scope="row" colspan="3"  class=" bordes">$ {{str_replace(",",".",number_format(Helper::consultDataAbonosFactura($id_Abono)->valorFactura))}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">  <table class="table bordes  mb-0">
                                    <tbody>
                                        <tr>    
                                            <th colspan="3"  class="table-active bordes" scope="row">PAGUE HASTA  </th>
                                            <th   class="table-active" scope="row">VALOR  </th>                                                                                                                           
                                        </tr>
                                        <tr>
                                            <td colspan="2" scope="row">{{Helper::consultDataAbonosFactura($id_Abono)->dateExpiration}}</td>
                                            <td scope="row"> PAGO ORDINARIO </td>
                                            <td scope="row"  class=" bordes">$ {{str_replace(",",".",number_format(Helper::consultDataAbonosFactura($id_Abono)->valorFactura))}}</td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">  <table class="table mb-0">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"   scope="row" style="text-align: right;">HASTA {{Helper::consultDataAbonosFactura($id_Abono)->dateExpiration}}</td>
                                            <td  style="text-align: center;  scope="row"> TOTAL A PAGAR </td>
                                            <td    scope="row">$ {{str_replace(",",".",number_format(Helper::consultDataAbonosFactura($id_Abono)->valorFactura))}}</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"   scope="row" style="text-align: center;" id="BarrcodeImg">
                                                <img src="data:image/png;base64,{{$code}}" alt="barcode">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">  <table class="table mb-0" id="mediosdepago">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"   scope="row" style="text-align: left; font-size: 10px;">
                                                Medios de Pago <br> 
                                                1.Banco BBVA CTA ahorros No 957534852 <br>  
                                                2.Tarjetas de crédito MasterCard, Visa y American Express en linea <br>
                                                3.Consuerte<br>
                                                4.PSE  -https://www.zonapagos.com/t_aunar/pagos.asp <br>
                                            </td>
                                            <td colspan="2"  style="text-align: right;">
                                                <img  width="100" src="{{ URL::asset('/images/factura/consuerte.png') }}">
                                                <img  width="100"src="{{ URL::asset('/images/factura/bbva.png') }}">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"   scope="row" style="text-align:left; font-size: 10px;"> 
                                                EN CASO DE NO CUMPLIR CON LOS REQUISITOS PARA GRADO <br>
                                                ABSTENERSE DE PAGAR; SI LOS CANCELO, ESTOS VALORES NO SERAN <br>
                                                CAUSAL DE DEVOLUCIÓN, SE SOSTIENE HASTA POR UN AÑO.<br>
                                            </td>
                                            <td colspan="2" align="right" valign="top"><img  width="80" src="{{ URL::asset('/images/factura/PSE.png') }}">
                                                <img  width="100" src="{{ URL::asset('/images/factura/Visa.png') }}"></td></td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </th>
                        </tr>
                        <tr>
                            <th colspan="2" scope="row">  
                                <table class="table mb-0" id="ultimo">
                                    <tbody>
                                        <tr>
                                            <td    scope="row" style="text-align: center; font-size: 10px;">
                                                <b>-DOCUMENTO PARA EL ESTUDIANTE-</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table> 
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>            
        </div>
    </div>
</div> <!-- end row-->


@endsection

