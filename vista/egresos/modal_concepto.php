<!-- Modal -->
<div class="modal fade" id="modalConcepto" tabindex="-1" role="dialog" aria-labelledby="modalConceptoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="modalConceptoLabel">Crear concepto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_tipo_equipo" method="POST">
          <div class="form-group row">
            <label for="serial_equipo" class="col-sm-3 col-form-label">Nombre concepto</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="nombre_concepto" required="true" style="text-transform:uppercase;">
            </div>
            <div class="col-sm-1 text-danger">
              *
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12 text-center">
              <button data-accion="crear" type="submit" class="btn btn-success" id="btn_guardar_concepto">Crear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
