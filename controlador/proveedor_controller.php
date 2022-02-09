<?php
include dirname(__file__, 2) . '/modelo/proveedor.php';

class proveedorController extends proveedor
{

    public function __construct()
    {
        # code...
    }

    //Tabla de proveedors
    public function getTablaProveedores($permisos, $permisosConsulta)
    {
        //Instancia del proveedor
        $proveedor = new proveedor();
        //Lista del menu Nivel 1
        $listaProveedores = $proveedor->getProveedores($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaProveedores)) {
                for ($i = 0; $i < sizeof($listaProveedores); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '">' . $listaProveedores[$i]["proveedor"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '">' . $listaProveedores[$i]["documento_proveedor"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '">' . $listaProveedores[$i]["email_proveedor"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '">' . $listaProveedores[$i]["celular_proveedor"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalProveedor" data-toggle="modal" name="btn_editar" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-proveedor="' . $listaProveedores[$i]["id_proveedor"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen proveedors</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
