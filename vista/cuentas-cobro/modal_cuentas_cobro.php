<!-- Modal -->
<div class="modal fade" id="modalCliente" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalContactoLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_contacto" method="POST">
          <input type="hidden" id="id_cuentas_cobro">
          <div class="form-group row">
            <label for="nombre_cuentas_cobro" class="col-sm-3 col-form-label">Nombre completo:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" minlength="5" maxlength="50" id="nombre_cuentas_cobro" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="ciudad_cuentas_cobro" class="col-sm-3 col-form-label">Ciudad:</label>
            <div class="col-sm-7">
              <?php $cuentasCobro->getCiudades(); ?>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="fecha_cuentas_cobro" class="col-sm-3 col-form-label">Fecha:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="fecha_cuentas_cobro" required="true" style="text-transform:uppercase;" disabled>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="cedula_cuentas_cobro" class="col-sm-3 col-form-label">Cedula:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" minlength="3" maxlength="15" id="cedula_cuentas_cobro" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="valor_cuentas_cobro" class="col-sm-3 col-form-label">Valor:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" minlength="2" maxlength="50" id="valor_cuentas_cobro" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="concepto_cuentas_cobro" class="col-sm-3 col-form-label">Concepto:</label>
            <div class="col-sm-7">
              <textarea type="text" class="form-control" minlength="10" id="concepto_cuentas_cobro" required="true" style="text-transform:uppercase;"></textarea>
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="celular_cuentas_cobro" class="col-sm-3 col-form-label">Celular:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" minlength="10" maxlength="11" id="celular_cuentas_cobro" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="formaspago_cuentas_cobro" class="col-sm-3 col-form-label">Forma de pago:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" minlength="5" maxlength="150" id="formas_pago_cuentas_cobro" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_crear_cuenta_cobro">Guardar</button>
              <button class="btn btn-success d-none" id="btn_guardando" type="button" disabled>
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
<div class="modal fade" id="eliminarCuentasCobro" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar cuenta de cobro</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_cuenta_cobro" name="btn_eliminar_cuenta_cobro">Eliminar</button>
        <button class="btn btn-danger d-none" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
          Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>