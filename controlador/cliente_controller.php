<?php
include dirname(__file__, 2) . '/modelo/cliente.php';

class clienteController extends cliente
{

    public function __construct()
    {
        # code...
    }

    //Tabla de clientes
    public function getTablaClientes($permisos, $permisosConsulta)
    {
        //Instancia del cliente
        $cliente = new cliente();
        //Lista del menu Nivel 1
        $listaClientes = $cliente->getClientes($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaClientes)) {
                for ($i = 0; $i < sizeof($listaClientes); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["nombres_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["apellidos_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["documento_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["rsocial_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["email_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '">' . $listaClientes[$i]["celular_cliente"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalCliente" data-toggle="modal" name="btn_editar" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-cliente="' . $listaClientes[$i]["id_cliente"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>'; 
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen clientes</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
