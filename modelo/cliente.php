<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Cliente
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los clientes
    public function getClientes($permisosConsulta)
    {
        $query = "SELECT * FROM cliente
                WHERE cliente.estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo cliente
    public function insertaCliente($data)
    {
        $query  = "INSERT INTO cliente (nombres_cliente,apellidos_cliente,documento_cliente,rsocial_cliente, email_cliente, celular_cliente,direccion_cliente,telefono_cliente,web_cliente) VALUES ('" . $data['nombres_cliente'] . "', '" . $data['apellidos_cliente'] . "', '" . $data['documento_cliente'] . "', '" . $data['rsocial_cliente'] . "', '" . $data['email_cliente'] . "','" . $data['celular_cliente'] . "','" . $data['direccion_cliente'] . "','" . $data['telefono_cliente'] . "','" . $data['web_cliente'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar cliente
    public function consultaCliente($data)
    {
        $query = "SELECT * FROM cliente
                WHERE id_cliente = '" . $data['id_cliente'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un cliente
    public function editaCliente($data)
    {
        $query  = "UPDATE cliente SET nombres_cliente = '" . $data['nombres_cliente'] . "',apellidos_cliente = '" . $data['apellidos_cliente'] . "',documento_cliente = '" . $data['documento_cliente'] . "',rsocial_cliente = '" . $data['rsocial_cliente'] . "',email_cliente = '" . $data['email_cliente'] . "',celular_cliente = '" . $data['celular_cliente'] . "',celular_cliente = '" . $data['celular_cliente'] . "',telefono_cliente = '" . $data['telefono_cliente'] . "',web_cliente = '" . $data['web_cliente'] . "'  WHERE id_cliente = '" . $data['id_cliente'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un cliente
    public function eliminaLogicoCliente($data)
    {
        $query  = "UPDATE cliente SET estado = '2' WHERE id_cliente = '" . $data['id_cliente'] . "'";
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
}
