<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<script src="https://code.jquery.com/jquery-1.11.2.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> 


<div id="modalGenFactura" class="modal fade bs-modal-genFactura show" tabindex="-1" aria-labelledby="#modalGenFacturaLabel" style="display: none; padding-right: 16px;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header header-modal-pagos">
                <h5 class="modal-title mt-0" id="modalGenFacturaLabel">Liquidacion de pago</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="delit-padin-body-modal">
                <div id='viewer'>
                    <div class="row row-bts-pagos justify-content-center">
                        <div class="col-3 text-center">
                            <a class="btn btn-outline-info waves-effect waves-light" id="bt-imprimir" onclick="printDiv()" data-bs-dismiss="modal">Imprimir</a> 
                        </div>
                        <div class="col-3 text-center">
                            <a class="btn btn-outline-success waves-effect waves-light" href="{{route('pagos.cards')}}">Pagar online con tarjeta</a>
                        </div>
                        <div class="col-3 text-center">
                            <a class="btn btn-outline-success waves-effect waves-light" href="{{route('pagos.abonos')}}">Pagar a Cuotas</a>
                        </div>
                        <div class="col-3 text-center">
                            <button type="button" class="btn btn-outline-danger waves-effect waves-light" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                    <div id="imprimir">
                        {{ $conten }}
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>

    function printDiv()
    {
        $('#iframeLiquidacion').get(0).contentWindow.focus(); 
          //Ejecutamos la impresion sobre ese control
          $("#iframeLiquidacion").get(0).contentWindow.print(); 
    }
    WebViewer({
        path: '/assets/libs/pdfJsExpress/lib', // path to the PDF.js Express'lib' folder on your server
        initialDoc: 'https://pdftron.s3.amazonaws.com/downloads/pl/webviewer-demo.pdf',
        // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
    }, document.getElementById('viewer'))
            .then(instance => {
                const docViewer = instance.docViewer;
                const annotManager = instance.annotManager;
                // call methods from instance, docViewer and annotManager as needed

                // you can also access major namespaces from the instance as follows:
                // const Tools = instance.Tools;
                // const Annotations = instance.Annotations;

                docViewer.on('documentLoaded', () => {
                    // call methods relating to the loaded document
                });
            });
</script>