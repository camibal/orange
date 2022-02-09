<?php
include dirname(__file__, 2) . '/modelo/abonos.php';

class abonosController extends abonos
{

    public function __construct()
    {
        # code...
    }

    //Select cliente
    public function getSelectCliente()
    {
        //Instancia del abonos
        $abonos = new Abonos();
        //Lista del menu Nivel 1
        $listaAbonos = $abonos->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaAbonos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaAbonos); $i++) {
                //Valida si es el valor
                if ($valor == $listaAbonos[$i]["id_cliente"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaAbonos[$i]["id_cliente"] . '" ' . $seleccionado . '>' . $listaAbonos[$i]["cliente"]. '</option>';
            }
        }
    }

    //Select categoria
    public function getSelectCategoria()
    {
        //Instancia del abonos
        $abonos = new Abonos();
        //Lista del menu Nivel 1
        $listaAbonos = $abonos->getCategoria();
        //Se recorre array de nivel 1
        if (isset($listaAbonos)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaAbonos); $i++) {
                //Valida si es el valor
                if ($valor == $listaAbonos[$i]["id_categoria"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaAbonos[$i]["id_categoria"] . '" ' . $seleccionado . '>' . $listaAbonos[$i]["nombre_categoria"] . '</option>';
            }
        }
    }

    //Tabla de abonoss
    public function getTablaAbonos($permisos)
    {
        //Instancia del abonos
        $abonos = new abonos();
        //Lista del menu Nivel 1
        $listaAbonos = $abonos->getAbonos($permisos);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaAbonos)) {
                for ($i = 0; $i < sizeof($listaAbonos); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaAbonos[$i]["id_abono"] . '</td>';
                    echo '<td>' . $listaAbonos[$i]["fecha_abono"] . '</td>';
                    echo '<td>' . $listaAbonos[$i]["id_ingreso"] . '</td>';
                    echo '<td>' . $listaAbonos[$i]["cliente"] . '</td>';
                    echo '<td>' . $listaAbonos[$i]["descripcion_ingreso"] . '</td>';
                    echo '<td align="right">'.number_format($listaAbonos[$i]["valor_abono"],0,'.','.').'</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-abono="' . $listaAbonos[$i]["id_abono"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen abonoss</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
