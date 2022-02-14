<?php
include dirname(__file__, 2) . '/modelo/cuentas_cobro.php';

$tipo    = isset($_REQUEST['tipo']) ? $_REQUEST['tipo'] : "";

class cuentasCobroController extends cuentasCobro
{

    public function __construct()
    {
        # code...
    }

    //Tabla de cuentas de cobro
    public function getTablaCuentasCobro($permisos, $permisosConsulta)
    {
        //Instancia del contacto
        $contacto = new cuentasCobro();
        //Lista del menu Nivel 1
        $listaIngresos = $contacto->getCuentasCobro($permisos);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaIngresos)) {
                for ($i = 0; $i < sizeof($listaIngresos); $i++) {
                    echo '<tr>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["nombre"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["ciudad"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["fecha"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["cedula"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">$' . $listaIngresos[$i]["valor"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["concepto"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["celular"] . '</td>';
                    echo '<td data-id-cuentas="' . $listaIngresos[$i]["id"] . '">' . $listaIngresos[$i]["formas_pago"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["consultar"] == 1) {
                        echo '<button type="button" class="btn btn-info" data-target="#modalEnvioDetalle" data-toggle="modal" name="btn_detalles" data-id-cuentas="' . $listaIngresos[$i]["id"] . '"><i class="fas fa-eye"></i></button>&nbsp;';
                    };
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-id-cuentas="' . $listaIngresos[$i]["id"] . '" data-target="#modalCliente" data-toggle="modal" name="btn_editar" data-id-cliente="' . $listaIngresos[$i]["id"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" data-id-cuentas="' . $listaIngresos[$i]["id"] . '" name="btn_eliminar" data-id-cliente="' . $listaIngresos[$i]["id"] . '" data-toggle="modal" data-target="#eliminarCuentasCobro"><i class="fas fa-trash-alt"></i></button>';
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
    //Tabla de cuentas de cobro
    public function getCiudades()
    {
        //Instancia del contacto
        $contacto = new cuentasCobro();
        $resultado = $contacto->consultaCiudades();

        if (isset($resultado)) {
            for ($i = 0; $i < sizeof($resultado); $i++) {
                echo '<option value="' . $resultado[$i]["nombre"] . '">' . $resultado[$i]["nombre"] . '</option>';
            }
        } else {
            echo '<option value=">No existen ciudades">No existen ciudades</option>';
        }
    }
}
