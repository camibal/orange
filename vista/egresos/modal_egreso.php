<!-- Modal -->
<div class="modal fade" id="modalEgreso" tabindex="-1" role="dialog" aria-labelledby="modalEgresoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalEgresoLabel">Crear egreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_egreso" method="POST">
          <input type="hidden" id="id_egreso">
          <div class="form-group row">
            <label for="fecha_egreso" class="col-sm-3 col-form-label">Fecha egreso:</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" id="fecha_egreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_proveedor" class="col-sm-3 col-form-label">Proveedor:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_proveedor" required="true">
                <?php $egreso->getSelectProveedor();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" id="btn_crear_proveedor" class="btn btn-primary" data-target="#modalProveedor" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_concepto" class="col-sm-3 col-form-label">Concepto:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_concepto" required="true">
                <?php $egreso->getSelectConcepto();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" id="btn_crear_concepto" class="btn btn-primary" data-target="#modalConcepto" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="descripcion_egreso" class="col-sm-3 col-form-label">Descripción egreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="descripcion_egreso" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row" hidden="true">
            <label for="numero_egreso" class="col-sm-3 col-form-label">Numero egreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="numero_egreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="valor_egreso" class="col-sm-3 col-form-label">Valor egreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="valor_egreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="abono_egreso" class="col-sm-3 col-form-label">Abono egreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="abono_egreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="saldo_egreso" class="col-sm-3 col-form-label">Saldo egreso:</label>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control soloNumeros" id="saldo_egreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="submit" class="btn btn-success" id="btn_guardar_egreso">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar egreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_egreso" name="btn_eliminar_egreso">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>