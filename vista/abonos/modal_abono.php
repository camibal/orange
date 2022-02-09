<!-- Modal -->
<div class="modal fade" id="modalAbono" tabindex="-1" role="dialog" aria-labelledby="modalAbonoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalAbonoLabel">Crear abono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_abono" method="POST">
          <input type="hidden" id="id_abono">
          <div class="form-group row">
            <label for="fecha_abono" class="col-sm-3 col-form-label">Fecha abono:</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" id="fecha_abono" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_cliente" class="col-sm-3 col-form-label">Cliente:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cliente" required="true">
                <?php $abono->getSelectCliente();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_categoria" class="col-sm-3 col-form-label">Ingresos:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_ingreso" required="true">
                <option>Seleccione un ingreso...</option>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="valor_abono" class="col-sm-3 col-form-label">Valor abono:</label>
            <div class="col-sm-7">
              <input type="hidden" id="saldo_ingreso">
              <input type="text" class="form-control soloNumeros" id="valor_abono" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="descripcion_abono" class="col-sm-3 col-form-label">Observaciones abono:</label>
            <div class="col-sm-7">
              <textarea class="form-control" id="obs_abono" rows="3"></textarea>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="submit" class="btn btn-success" id="btn_guardar_abono">Guardar</button>
              <button class="btn btn-success" id="btn_guardando" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Guardando...
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar abono</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_abono" name="btn_eliminar_abono">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>