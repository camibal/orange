<?php
include dirname(__file__, 2) . '/modelo/informes.php';

class informesController extends informes
{

    public function __construct()
    {
        # code...
    }

    //Tabla inventario total
    public function getTablaVentas($where)
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaVentas = $informes->getVentas($where);
        //Se recorre array de nivel 1
        if (isset($listaVentas)) {
            for ($i = 0; $i < sizeof($listaVentas); $i++) {
                echo '<tr>';
                echo '<td>' . $listaVentas[$i]["fecha_ingreso"] . '</td>';
                if($listaVentas[$i]["rsocial_cliente"] != ''){
                    $cliente = $listaVentas[$i]["rsocial_cliente"];
                } else {
                    $cliente = $listaVentas[$i]["nombres_cliente"].' '.$listaVentas[$i]["apellidos_cliente"];
                }
                echo '<td>' . $cliente . '</td>';
                echo '<td>' . $listaVentas[$i]["nombre_categoria"] . '</td>';
                echo '<td>' . $listaVentas[$i]["descripcion_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["valor_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["abono_ingreso"] . '</td>';
                echo '<td>' . $listaVentas[$i]["saldo_ingreso"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="10">No existen equipos</td>';
            echo '</tr>';
        }
    }

    //Tabla inventario total
    public function getTablaGastos($where)
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaGastos = $informes->getGastos($where);
        //Se recorre array de nivel 1
        if (isset($listaGastos)) {
            for ($i = 0; $i < sizeof($listaGastos); $i++) {
                echo '<tr>';
                echo '<td>' . $listaGastos[$i]["fecha_egreso"] . '</td>';
                if($listaGastos[$i]["rsocial_proveedor"] != ''){
                    $cliente = $listaGastos[$i]["rsocial_proveedor"];
                } else {
                    $cliente = $listaGastos[$i]["nombres_proveedor"].' '.$listaGastos[$i]["apellidos_proveedor"];
                }
                echo '<td>' . $cliente . '</td>';
                echo '<td>' . $listaGastos[$i]["nombre_concepto"] . '</td>';
                echo '<td>' . $listaGastos[$i]["descripcion_egreso"] . '</td>';
                echo '<td>' . $listaGastos[$i]["valor_egreso"] . '</td>';
                echo '<td>' . $listaGastos[$i]["abono_egreso"] . '</td>';
                echo '<td>' . $listaGastos[$i]["saldo_egreso"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="10">No existen equipos</td>';
            echo '</tr>';
        }
    }

    //Tabla abonos
    public function getTablaAbonos($where)
    {
        //Instancia del informes
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaAbonos = $informes->getAbonos($where);
        //Se recorre array de nivel 1
        if (isset($listaAbonos)) {
            for ($i = 0; $i < sizeof($listaAbonos); $i++) {
                echo '<tr>';
                echo '<td>' . $listaAbonos[$i]["id_ingreso"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["fecha_abono"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["id_abono"] . '</td>';
                if($listaAbonos[$i]["rsocial_cliente"] != ''){
                    $cliente = $listaAbonos[$i]["rsocial_cliente"];
                } else {
                    $cliente = $listaAbonos[$i]["nombres_cliente"].' '.$listaAbonos[$i]["apellidos_cliente"];
                }
                echo '<td>' . $cliente . '</td>';
               
                echo '<td>' . $listaAbonos[$i]["descripcion_ingreso"] . '</td>';
                echo '<td>' . $listaAbonos[$i]["valor_abono"] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="10">No existen abonos.</td>';
            echo '</tr>';
        }
    }

    //Tabla de clientes
    public function getTablaClientes()
    {
        //Instancia del cliente
        $informes = new informes();
        //Lista del menu Nivel 1
        $listaClientes = $informes->getClientes();
        //Se recorre array de nivel 1
            if (isset($listaClientes)) {
                for ($i = 0; $i < sizeof($listaClientes); $i++) {
                    echo '<tr>';
                    echo '<td>' . $listaClientes[$i]["nombres_cliente"] . '</td>';
                    echo '<td >' . $listaClientes[$i]["apellidos_cliente"] . '</td>';
                    echo '<td >' . $listaClientes[$i]["documento_cliente"] . '</td>';
                    echo '<td >' . $listaClientes[$i]["rsocial_cliente"] . '</td>';
                    echo '<td >' . $listaClientes[$i]["email_cliente"] . '</td>';
                    echo '<td >' . $listaClientes[$i]["celular_cliente"] . '</td>';
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen clientes</td>';
                echo '</tr>';
            }
    }
}
