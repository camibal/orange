<?php
include dirname(__file__, 2) . '/modelo/ingresos.php';

class ingresosController extends ingresos
{

    public function __construct()
    {
        # code...
    }

    //Select cliente
    public function getSelectCliente()
    {
        //Instancia del ingresos
        $ingresos = new Ingresos();
        //Lista del menu Nivel 1
        $listaIngresos = $ingresos->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaIngresos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaIngresos); $i++) {
                //Valida si es el valor
                if ($valor == $listaIngresos[$i]["id_cliente"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaIngresos[$i]["id_cliente"] . '" ' . $seleccionado . '>' . $listaIngresos[$i]["cliente"]. '</option>';
            }
        }
    }

    //Select categoria
    public function getSelectCategoria()
    {
        //Instancia del ingresos
        $ingresos = new Ingresos();
        //Lista del menu Nivel 1
        $listaIngresos = $ingresos->getCategoria();
        //Se recorre array de nivel 1
        if (isset($listaIngresos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaIngresos); $i++) {
                //Valida si es el valor
                if ($valor == $listaIngresos[$i]["id_categoria"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaIngresos[$i]["id_categoria"] . '" ' . $seleccionado . '>' . $listaIngresos[$i]["nombre_categoria"] . '</option>';
            }
        }
    }

    //Tabla de ingresoss
    public function getTablaIngresos($permisos)
    {
        //Instancia del ingresos
        $ingresos = new ingresos();
        //Lista del menu Nivel 1
        $listaIngresos = $ingresos->getIngresos($permisos);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaIngresos)) {
                for ($i = 0; $i < sizeof($listaIngresos); $i++) {
                    if($listaIngresos[$i]["rsocial_cliente"] != ''){
                        $cliente = $listaIngresos[$i]["rsocial_cliente"];
                    } else {
                        $cliente = $listaIngresos[$i]["nombres_cliente"] . ' ' . $listaIngresos[$i]["apellidos_cliente"];
                    }
                    echo '<tr>';
                    echo '<td>' . $listaIngresos[$i]["id_ingreso"] . '</td>';
                    echo '<td>' . $listaIngresos[$i]["fecha_ingreso"] . '</td>';
                    echo '<td>' . $cliente . '</td>';
                    echo '<td>' . $listaIngresos[$i]["descripcion_ingreso"] . '</td>';
                    echo '<td align="right">'.number_format($listaIngresos[$i]["valor_ingreso"],0,'.','.').'</td>';
                    echo '<td align="right">'.number_format($listaIngresos[$i]["abono_ingreso"],0,'.','.').'</td>';
                    echo '<td align="right">'.number_format($listaIngresos[$i]["saldo_ingreso"],0,'.','.').'</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalIngreso" data-toggle="modal" name="btn_editar" data-id-ingreso="' . $listaIngresos[$i]["id_ingreso"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-ingreso="' . $listaIngresos[$i]["id_ingreso"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen ingresoss</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
