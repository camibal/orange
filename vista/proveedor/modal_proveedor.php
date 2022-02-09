<!-- Modal -->
<div class="modal fade" id="modalProveedor" tabindex="-1" role="dialog" aria-labelledby="modalProveedorLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalProveedorLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_proveedor" method="POST">
          <input type="hidden" id="id_proveedor">
          <div class="form-group row">
            <label for="nombres_proveedor" class="col-sm-3 col-form-label">Nombres:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="nombres_proveedor" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="apellidos_proveedor" class="col-sm-3 col-form-label">Apellidos:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="apellidos_proveedor" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="documento_proveedor" class="col-sm-3 col-form-label">Documento:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="documento_proveedor" required="true" >
            </div>
          </div>
          <div class="form-group row">
            <label for="rsocial_proveedor" class="col-sm-3 col-form-label">Razon social:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="rsocial_proveedor" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="email_proveedor" class="col-sm-3 col-form-label">Email:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="email_proveedor" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="celular_proveedor" class="col-sm-3 col-form-label">Celular:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="celular_proveedor" required="true" >
            </div>
            <div class="col-sm-2 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <label for="direccion_proveedor" class="col-sm-3 col-form-label">Dirección:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="direccion_proveedor" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <label for="telefono_proveedor" class="col-sm-3 col-form-label">Teléfono:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control soloNumeros" id="telefono_proveedor" required="true" >
            </div>
          </div>
          <div class="form-group row">
            <label for="web_proveedor" class="col-sm-3 col-form-label">Sitio web:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" id="web_proveedor" required="true" style="text-transform:uppercase;">
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="button" class="btn btn-success" id="btn_guardar_proveedor">Guardar</button>
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
        <h5 class="modal-title" id="eliminarModalLabel">Eliminar proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ¿Realmente desea eliminar el registro?
      </div>
      <div class="modal-footer text-center">
        <button type="button" class="btn btn-warning" data-dismiss="modal" id="btn_cancelar">Cancelar</button>
        <button type="button" class="btn btn-danger" id="btn_eliminar_proveedor" name="btn_eliminar_proveedor">Eliminar</button>
        <button class="btn btn-danger" id="btn_eliminando" type="button" disabled>
          <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Eliminando...
        </button>
      </div>
    </div>
  </div>
</div>
