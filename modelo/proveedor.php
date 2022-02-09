<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Proveedor
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los proveedors
    public function getProveedores($permisosConsulta)
    {
        $query = "SELECT *,IF(rsocial_proveedor != '',rsocial_proveedor,CONCAT(nombres_proveedor, ' ',apellidos_proveedor)) AS proveedor FROM proveedor
            WHERE proveedor.estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario, $id_modulo)
    {
        $query = "SELECT * FROM `permisos`
                INNER JOIN usuario on usuario.id_usuario = permisos.fkID_usuario
                WHERE usuario.id_usuario='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo proveedor
    public function insertaProveedor($data)
    {
        $query  = "INSERT INTO proveedor (nombres_proveedor,apellidos_proveedor,documento_proveedor,rsocial_proveedor, email_proveedor, celular_proveedor,direccion_proveedor,telefono_proveedor,web_proveedor) VALUES ('" . $data['nombres_proveedor'] . "', '" . $data['apellidos_proveedor'] . "', '" . $data['documento_proveedor'] . "', '" . $data['rsocial_proveedor'] . "', '" . $data['email_proveedor'] . "','" . $data['celular_proveedor'] . "','" . $data['direccion_proveedor'] . "','" . $data['telefono_proveedor'] . "','" . $data['web_proveedor'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar proveedor
    public function consultaProveedor($data)
    {
        $query = "SELECT * FROM proveedor
                WHERE id_proveedor = '" . $data['id_proveedor'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un proveedor
    public function editaProveedor($data)
    {
        $query  = "UPDATE proveedor SET nombres_proveedor = '" . $data['nombres_proveedor'] . "',apellidos_proveedor = '" . $data['apellidos_proveedor'] . "',documento_proveedor = '" . $data['documento_proveedor'] . "',rsocial_proveedor = '" . $data['rsocial_proveedor'] . "',email_proveedor = '" . $data['email_proveedor'] . "',celular_proveedor = '" . $data['celular_proveedor'] . "',celular_proveedor = '" . $data['celular_proveedor'] . "',telefono_proveedor = '" . $data['telefono_proveedor'] . "',web_proveedor = '" . $data['web_proveedor'] . "'  WHERE id_proveedor = '" . $data['id_proveedor'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un proveedor
    public function eliminaLogicoProveedor($data)
    {
        $query  = "UPDATE proveedor SET estado = '2' WHERE id_proveedor = '" . $data['id_proveedor'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Trae todos los permisos
    public function getPermisosconsulta($id_usuario)
    {
        $query = "SELECT * FROM `usuario`
                INNER JOIN permisos on permisos.fkID_usuario = usuario.id_usuario
                WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
