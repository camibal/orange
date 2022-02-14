<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include dirname(__file__, 2) . '/modelo/usuario.php';

$usuario = new Usuario();

//Request: Ingresar
if (isset($_POST['Ingresar'])) {
    if ($usuario->getUserById($_POST['username'])) {
        if ($usuario->getPass($_POST['username'], $_POST['passwd'])) {
            $datosUsuario = $usuario->getUserById($_POST['username']);
            session_start(); //Registra la sesion
            $_SESSION['id_usuario'] = $datosUsuario[0]["id_usuario"];
            setcookie('id', $datosUsuario[0]["id_usuario"], time() + 365 * 24 * 60 * 60);
            header('location: ../vista/index.php');
        } else {
            header('location: ../vista/login/index.php?pass=false');
        }
    } else {
        header('location: ../vista/login/index.php?existe=false');
    }
}

//Request: creacion de nuevo usuario
if (isset($_POST['create'])) {
    if ($usuario->getID($_POST['subscriber'])) {
        header('location: ../views/usuario/new.php?page=new&existe=true');
    } else {
        if ($usuario->newClient($_POST)) {
            if ($usuario->newUser($_POST)) {
                header('location: ../views/usuario/new.php?page=new&success=true');
            }
        } else {
            header('location: ../views/usuario/new.php?page=new&error=true');
        }
    }
}

//Request: editar usuario
if (isset($_POST['edit'])) {
    if ($usuario->setEditUser($_POST)) {
        header('location: ../index.php?page=edit&id=' . $_POST['id'] . '&success=true');
    } else {
        header('location: ../index.php?page=edit&id=' . $_POST['id'] . '&error=true');
    }
}

//Request: editar usuario
if (isset($_GET['delete'])) {
    if ($usuario->deleteUser($_GET['id'])) {
        // header('location: ../index.php?page=usuario&success=true');
        echo json_encode(["success" => true]);
    } else {
        // header('location: ../index.php?page=usuario&&error=true');
        echo json_encode(["error" => true]);
    }
}

//Request: Recuperar
if (isset($_POST['Recuperar'])) {
    if ($usuario->emailExiste($_POST['email'])) {
        $clave = aleatoria();
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $mensaje = '<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
        <table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%;min-width:100%;border-collapse:collapse" width="100%">
    <tbody>
        <tr>
            <img src="https://orange.kronossolucionestic.com/imagenes/logo.png">
        </tr>
        <tr>
            <td valign="top" style="padding-top:0;padding-right:18px;padding-bottom:9px;padding-left:18px;word-break:break-word;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
                <h1 style="display:block;margin:0;padding:0;color:#202020;font-family:Helvetica;font-size:26px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:left">
                    Contraseña temporal
                </h1>
                <p style="margin:10px 0;padding:0;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
                    Se ha generado una nueva contraseña temporal:
                </p>
                <p style="margin:10px 0;padding:0;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left">
                    '.$clave.'
                </p>
                <p style="margin:10px 0;padding:0;color:#202020;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left"><br>
                    <strong>Link de inicio de sesion:</strong><br>
                    <a href="http://orange.kronossolucionestic.com" target="_blank">
                        Login de Orange Software
                    </a>
                    <br>
                </p>
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>';
        mail($_POST['email'], "Recuperacion de contraseña", $mensaje, $cabeceras);
        $resultado = $usuario->cambiarPass($_POST['email'],$clave);
        header('location: ../vista/usuario/recupera.php?enviado='.$resultado);
    } else {
        header('location: ../vista/usuario/recupera.php?existe=false');
    }
}


function getTablaUsuario($permisos, $permisoconsulta)
{
    $usuario      = new Usuario();
    $listaUsuario = $usuario->getUsuario($permisoconsulta);
    if ($permisos[0]["consultar"] == 1) {
        if (isset($listaUsuario)) {
            for ($i = 0; $i < sizeof($listaUsuario); $i++) {
                echo '<tr>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["nombre_usuario"] . '</td>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["email_usuario"] . '</td>';
                echo '<td class="text-center" style="cursor: pointer">' . $listaUsuario[$i]["celular_usuario"] . '</td>';
                if ($permisos[0]["editar"] == 1) {
                    echo '<td class="text-center"><button type="button" class="btn btn-warning text-center" data-target="#modalUsuario" data-toggle="modal" name="btn_editar" data-id-Usuario="' . $listaUsuario[$i]["id_usuario"] . '"><i class="fas fa-pen-square"></i></button></td>';
                }
                if ($permisos[0]["eliminar"] == 1) {
                    echo '<td class="text-center"> <button type="button" class="btn btn-danger" name="btn_eliminar" data-id-usuario="' . $listaUsuario[$i]["id_usuario"] . '" data-toggle="modal" data-target="#eliminarModal"><i class="fas fa-trash-alt"></i></button></td>';
                }
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="9">No existen usuarios</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="9">No tienen permisos para consultar</td>';
        echo '</tr>';
    }

}

function getSelectPersona()
{
    //Instancia del equipo
    $usuario = new Usuario();
    //Lista del menu Nivel 1
    $listaPersona = $usuario->getPersona();
    //Se recorre array de nivel 1
    if (isset($listaPersona)) {
        echo '<option selected value="0">Seleccione...</option>';
        for ($i = 0; $i < sizeof($listaPersona); $i++) {
            //Valida si es el valor
            if ($valor == $listaPersona[$i]["id_persona"]) {
                $seleccionado = "selected";
            } else {
                $seleccionado = "";
            }
            echo '<option value="' . $listaPersona[$i]["id_persona"] . '" ' . $seleccionado . '>' . utf8_encode($listaPersona[$i]["persona"]) . '</option>';
        }
    }
}

function getSelectProyecto()
{
    //Instancia del equipo
    $usuario = new Usuario();
    //Lista del menu Nivel 1
    $listaProyecto = $usuario->getProyecto();
    //Se recorre array de nivel 1
    if (isset($listaProyecto)) {
        echo '<option selected value="0">Seleccione</option>';
        for ($i = 0; $i < sizeof($listaProyecto); $i++) {
            //Valida si es el valor
            if ($valor == $listaProyecto[$i]["id_proyecto"]) {
                $seleccionado = "selected";
            } else {
                $seleccionado = "";
            }
            echo '<option value="' . $listaProyecto[$i]["id_proyecto"] . '" ' . $seleccionado . '>' . utf8_encode($listaProyecto[$i]["nombre_proyecto"]) . '</option>';
        }
    }
}

function getSelectTerritorial()
{
    //Instancia del equipo
    $usuario = new Usuario();
    //Lista del menu Nivel 1
    $listaTerritorial = $usuario->getTerritoriales();
    //Se recorre array de nivel 1
    if (isset($listaTerritorial)) {
        echo '<option selected value="0">Seleccione...</option>';
        for ($i = 0; $i < sizeof($listaTerritorial); $i++) {
            //Valida si es el valor
            if ($valor == $listaTerritorial[$i]["id_territorial"]) {
                $seleccionado = "selected";
            } else {
                $seleccionado = "";
            }
            echo '<option value="' . $listaTerritorial[$i]["id_territorial"] . '" ' . $seleccionado . '>' . $listaTerritorial[$i]["nombre_territorial"] . '</option>';
        }
    }
}

function getSelectCargo()
{
    //Instancia del equipo
    $usuario = new Usuario();
    //Lista del menu Nivel 1
    $listaCargo = $usuario->getCargo();
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

function aleatoria(){
    //Carácteres para la contraseña
   $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
   $password = "";
   //Reconstruimos la contraseña segun la longitud que se quiera
   for($i=0;$i<8;$i++) {
      //obtenemos un caracter aleatorio escogido de la cadena de caracteres
      $password .= substr($str,rand(0,62),1);
   }
   //Mostramos la contraseña generada
   return $password;
}