<!-- Modal -->
<?php
setlocale(LC_ALL, "es_ES");
?>
<div class="modal fade" id="modalAbonosScrollable" tabindex="-1" role="dialog" aria-labelledby="modalAbonosScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalAbonosScrollableTitle">Informe de abonos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div id="tablaAbonos">
            <table class="table table-bordered" >
              <thead>
                <tr>
                  <th scope="col" colspan="2" class="text-center">
                    <img src="../imagenes/logo_empresa.png" class="img-fluid">
                  </th>
                  <th scope="col" colspan="2" class="text-center">
                    <h4>
                      <strong>
                        Kronos Soluciones TIC<br>
                        Informe de abonos
                      </strong>
                    </h4>
                  </th>
                  <th scope="col" colspan="2" class="text-center">
                    <strong>
                        Fecha y hora impresion:<br>
                        <?php echo date('Y-m-d H:i:s'); ?>
                    </strong>
                  </th>
                </tr>
                <tr>
                  <th scope="col" colspan="6" class="text-center"></th>
                </tr>
                <tr>
                  <th scope="col">Numero</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Numero ingreso</th>
                  <th scope="col">Cliente</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Valor</th>
                </tr>
                </thead>
                <tbody id="contenidoAbonos">
                  <?php $informes->getTablaAbonos('');?>
                  <tr>
                    <td scope="col" colspan="6" class="text-right"><p><small><em>Fecha y hora impresion :<?php echo date('Y-m-d H:i:s'); ?></small></em></p></td>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btn_imprimir_abonos"><i class="fas fa-print"></i></button>
        <button type="button" class="btn btn-success" id="btn_excel_abonos"><i class="fas fa-file-excel"></i></button>
        <button type="button" class="btn btn-danger" id="btn_pdf_abonos"><i class="far fa-file-pdf"></i></button>
      </div>
    </div>
  </div>
</div>
