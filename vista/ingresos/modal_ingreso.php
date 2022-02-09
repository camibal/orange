<!-- Modal -->
<div class="modal fade" id="modalIngreso" tabindex="-1" role="dialog" aria-labelledby="modalIngresoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalIngresoLabel">Crear ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_ingreso" method="POST">
          <input type="hidden" id="id_ingreso">
          <div class="form-group row">
            <label for="fecha_ingreso" class="col-sm-3 col-form-label">Fecha ingreso:</label>
            <div class="col-sm-7">
              <input type="date" class="form-control" id="fecha_ingreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_cliente" class="col-sm-3 col-form-label">Cliente:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cliente" required="true">
                <?php $ingreso->getSelectCliente();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" id="btn_crear_cliente" class="btn btn-primary" data-target="#modalCliente" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="fkID_categoria" class="col-sm-3 col-form-label">Categoria:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_categoria" required="true">
                <?php $ingreso->getSelectCategoria();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" id="btn_crear_categoria" class="btn btn-primary" data-target="#modalCategoria" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="descripcion_ingreso" class="col-sm-3 col-form-label">Descripción ingreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="descripcion_ingreso" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row" hidden="true">
            <label for="numero_ingreso" class="col-sm-3 col-form-label">Numero ingreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="numero_ingreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="valor_ingreso" class="col-sm-3 col-form-label">Valor ingreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="valor_ingreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="abono_ingreso" class="col-sm-3 col-form-label">Abono ingreso:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="abono_ingreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="saldo_ingreso" class="col-sm-3 col-form-label">Saldo ingreso:</label>
            <div class="col-sm-7">
              <input type="text" readonly class="form-control soloNumeros" id="saldo_ingreso" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="submit" class="btn btn-success" id="btn_guardar_ingreso">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar ingreso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_ingreso" name="btn_eliminar_ingreso">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>