<?php
include dirname(__file__, 2) . '/modelo/egresos.php';

class egresosController extends egresos
{

    public function __construct()
    {
        # code...
    }

    //Select proveedor
    public function getSelectProveedor()
    {
        //Instancia del egresos
        $egresos = new Egresos();
        //Lista del menu Nivel 1
        $listaEgresos = $egresos->getProveedor();
        //Se recorre array de nivel 1
        if (isset($listaEgresos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaEgresos); $i++) {
                echo '<option value="' . $listaEgresos[$i]["id_proveedor"] . '" ' . $seleccionado . '>' . $listaEgresos[$i]["proveedor"]. '</option>';
            }
        }
    }

    //Select concepto
    public function getSelectConcepto()
    {
        //Instancia del egresos
        $egresos = new Egresos();
        //Lista del menu Nivel 1
        $listaEgresos = $egresos->getConcepto();
        //Se recorre array de nivel 1
        if (isset($listaEgresos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaEgresos); $i++) {
                //Valida si es el valor
                if ($valor == $listaEgresos[$i]["id_concepto"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaEgresos[$i]["id_concepto"] . '" ' . $seleccionado . '>' . $listaEgresos[$i]["nombre_concepto"] . '</option>';
            }
        }
    }

    //Tabla de egresoss
    public function getTablaEgresos($permisos)
    {
        //Instancia del egresos
        $egresos = new egresos();
        //Lista del menu Nivel 1
        $listaEgresos = $egresos->getEgresos($permisos);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaEgresos)) {
                for ($i = 0; $i < sizeof($listaEgresos); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaEgresos[$i]["id_egreso"] . '</td>';
                    echo '<td>' . $listaEgresos[$i]["fecha_egreso"] . '</td>';
                    echo '<td>' . $listaEgresos[$i]["nombres_proveedor"] . ' ' . $listaEgresos[$i]["apellidos_proveedor"] . '</td>';
                    echo '<td>' . $listaEgresos[$i]["descripcion_egreso"] . '</td>';
                    echo '<td align="right">'.number_format($listaEgresos[$i]["valor_egreso"],0,'.','.').'</td>';
                    echo '<td align="right">'.number_format($listaEgresos[$i]["abono_egreso"],0,'.','.').'</td>';
                    echo '<td align="right">'.number_format($listaEgresos[$i]["saldo_egreso"],0,'.','.').'</td>';                   
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalEgreso" data-toggle="modal" name="btn_editar" data-id-egreso="' . $listaEgresos[$i]["id_egreso"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-egreso="' . $listaEgresos[$i]["id_egreso"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen egresoss</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}