<!-- Modal -->
<div class="modal fade" id="modalContacto" tabindex="-1" role="dialog" aria-labelledby="modalContactoLabel" aria-hidden="true">
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
          <input type="hidden" id="id_contacto">
          <div class="form-group row">
            <label for="nombres_contacto" class="col-sm-3 col-form-label">Nombres:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nombres_contacto" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="apellidos_contacto" class="col-sm-3 col-form-label">Apellidos:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="apellidos_contacto" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="cargo_contacto" class="col-sm-3 col-form-label">Cargo:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cargo" required="true">
                <?php $contacto->getSelectCargo();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" class="btn btn-primary" data-target="#modalCargo" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="empresa_contacto" class="col-sm-3 col-form-label">Cliente:</label>
            <div class="col-sm-7">
              <select class="form-control" id="fkID_cliente" required="true">
                <?php $contacto->getSelectCliente();?>
              </select>
            </div>
            <div class="col-sm-2 text-danger">
              *
              <button type="button" id="btn_crear_cliente" class="btn btn-primary" data-target="#modalCliente" data-toggle="modal"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <div class="form-group row">
            <label for="email_contacto" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="email_contacto" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="celular_contacto" class="col-sm-3 col-form-label">Celular:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" minlength="10" maxlength="10" id="celular_contacto" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_contacto">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar contacto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_contacto" name="btn_eliminar_contacto">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_cliente" name="btn_eliminar_cliente">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>