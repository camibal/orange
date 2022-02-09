<?php
include dirname(__file__, 2) . '/modelo/categoria.php';

class categoriaController extends categoria
{

    public function __construct()
    {
        # code...
    }

    //Tabla de categorias
    public function getTablaCategorias($permisos, $permisosConsulta)
    {
        //Instancia del categoria
        $categoria = new categoria();
        //Lista del menu Nivel 1
        $listaCategorias = $categoria->getCategorias($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaCategorias)) {
                for ($i = 0; $i < sizeof($listaCategorias); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-categoria="' . $listaCategorias[$i]["id_categoria"] . '">' . $listaCategorias[$i]["nombre_categoria"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalCategoria" data-toggle="modal" name="btn_editar" data-id-categoria="' . $listaCategorias[$i]["id_categoria"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-categoria="' . $listaCategorias[$i]["id_categoria"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen categorias</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}