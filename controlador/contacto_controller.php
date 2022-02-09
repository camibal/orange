<?php
include dirname(__file__, 2) . '/modelo/contacto.php';

class contactoController extends contacto
{

    public function __construct()
    {
        # code...
    }

    //Select cargo
    public function getSelectCargo()
    {
        //Instancia del contacto
        $contacto = new Contacto();
        //Lista del menu Nivel 1
        $listaCargo = $contacto->getCargo();
        //Se recorre array de nivel 1
        if (isset($listaCargo)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaCargo); $i++) {
                //Valida si es el valor
                if ($valor == $listaCargo[$i]["id_cargo"]) {
                    $seleccionado = "selected";
                } else {
                    $seleccionado = "";
                }
                echo '<option value="' . $listaCargo[$i]["id_cargo"] . '" ' . $seleccionado . '>' . $listaCargo[$i]["nombre_cargo"] . '</option>';
            }
        }
    }

    //Select cliente
    public function getSelectCliente()
    {
        //Instancia del contacto
        $contacto = new Contacto();
        //Lista del menu Nivel 1
        $listaContacto = $contacto->getCliente();
        //Se recorre array de nivel 1
        if (isset($listaContacto)) {
            echo '<option selected value="0">Seleccione...</option>';
            for ($i = 0; $i < sizeof($listaContacto); $i++) {
                echo '<option value="' . $listaContacto[$i]["id_cliente"] . '" ' . $seleccionado . '>' . $listaContacto[$i]["cliente"] . '</option>';
            }
        }
    }

    //Tabla de contactos
    public function getTablaContactos($permisos, $permisosConsulta)
    {
        //Instancia del contacto
        $contacto = new contacto();
        //Lista del menu Nivel 1
        $listaContactos = $contacto->getContactos($permisosConsulta);
        //Se recorre array de nivel 1
        if ($permisos[0]["consultar"] == 1) {
            if (isset($listaContactos)) {
                for ($i = 0; $i < sizeof($listaContactos); $i++) {
                    echo '<tr>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["nombres_contacto"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["apellidos_contacto"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["nombre_cargo"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["rsocial_cliente"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["email_contacto"] . '</td>';
                    echo '<td style="cursor: pointer" class="detalle" name="btn_detalle" title="Click Ver Detalles" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '">' . $listaContactos[$i]["celular_contacto"] . '</td>';
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '<td>';
                    }
                    if ($permisos[0]["editar"] == 1) {
                        echo '<button type="button" class="btn btn-warning" data-target="#modalContacto" data-toggle="modal" name="btn_editar" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '"><i class="fas fa-pen-square"></i></i></button>&nbsp;';
                    };
                    if ($permisos[0]["eliminar"] == 1) {
                        echo '<button type="button" class="btn btn-danger" name="btn_eliminar" data-id-contacto="' . $listaContactos[$i]["id_contacto"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button>';
                    }
                    if ($permisos[0]["editar"] == 1 || $permisos[0]["eliminar"] == 1) {
                        echo '</td>';
                    }
                    echo '</tr>';
                }
            } else {
                echo '<tr>';
                echo '<td colspan="9">No existen contactos</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No tienen permisos para consultar</td>';
            echo '</tr>';
        }
    }
}
