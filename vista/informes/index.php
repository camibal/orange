<?php include "scripts.php";?>
<?php include "../../controlador/informes_controller.php";?>
<?php $informes = new informesController();?>
<form>
<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Informe de ventas</h5>
      <p class="card-text">
          Fecha inicial <input type="date" id="fecha_inicial_ventas">
          Fecha final <input type="date" id="fecha_final_ventas">
      </p>
    </div>
    <div class="card-footer">
        <div class="col-sm-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVentasScrollable" id="btn_generar_ventas">
                Generar informe
            </button>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Informe de gastos</h5>
      <p class="card-text">
          Fecha inicial <input type="date" id="fecha_inicial_gastos">
          Fecha final <input type="date" id="fecha_final_gastos">
      </p>
    </div>
    <div class="card-footer">
        <div class="col-sm-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalGastosScrollable" id="btn_generar_gastos">
                Generar informe
            </button>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Informe de abonos</h5>
      <p class="card-text">
            Fecha inicial <input type="date" id="fecha_inicial_abonos">
            Fecha final <input type="date" id="fecha_final_abonos">
      </p>
    </div>
    <div class="card-footer">
        <div class="col-sm-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAbonosScrollable" id="btn_generar_abonos">
                Generar informe
            </button>
        </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Listado de clientes</h5>
    </div>
    <div class="card-footer">
        <div class="col-sm-12 text-center">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalClientesScrollable" id="btn_generar_clientes">
                Generar informe
            </button>
        </div>
    </div>
  </div>
</div>
</form>
<?php include "modal_informe_ventas.php";?>
<?php include "modal_informe_gastos.php";?>
<?php include "modal_informe_abonos.php";?>
<?php include "modal_informe_clientes.php";?>