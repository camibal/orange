<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
?>
<div class="modal fade" id="modalEnvioDetalle" tabindex="-1" role="dialog" aria-labelledby="modalEnvioDetalleTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEnvioDetalleTitle">Detalle de la cuenta de cobro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div id="tablaAbonos">
                        <div id="contenidoEnvio">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-primary" id="btn_imprimir_devoluciones"><i class="fas fa-print"></i></button>
                <button type="button" class="btn btn-danger" id="btn_pdf_devoluciones"><i class="far fa-file-pdf"></i></button>
                <button type="button" class="btn btn-primary" id="btn_word" name="btn_word"><i class="far fa-file-word"></i></button>
            </div>
        </div>
    </div>
</div>