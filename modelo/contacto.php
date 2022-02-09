<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Contacto
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los contactos
    public function getContactos($permisosConsulta)
    {
        $query = "SELECT * FROM contacto
                INNER JOIN cargo ON cargo.id_cargo = contacto.fkID_cargo
                INNER JOIN cliente ON cliente.id_cliente = contacto.fkID_cliente
                WHERE contacto.estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario, $id_modulo)
    {
        $query = "SELECT * FROM permisos
                WHERE fkID_usuario ='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los cargos
    public function getCargo()
    {
        $query = "SELECT * FROM `cargo`
            WHERE estado=1
            ORDER BY nombre_cargo";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los clientes
    public function getCliente()
    {
        $query = "SELECT IF(rsocial_cliente != '',rsocial_cliente,CONCAT(nombres_cliente, ' ',apellidos_cliente)) AS cliente,id_cliente
                FROM `cliente` WHERE estado=1 
                ORDER BY cliente";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo contacto
    public function insertaContacto($data)
    {
        $query  = "INSERT INTO contacto (nombres_contacto,apellidos_contacto,fkID_cargo,fkID_cliente, email_contacto, celular_contacto) VALUES ('" . $data['nombres_contacto'] . "', '" . $data['apellidos_contacto'] . "', '" . $data['fkID_cargo'] . "', '" . $data['fkID_cliente'] . "', '" . $data['email_contacto'] . "','" . $data['celular_contacto'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar contacto
    public function consultaContacto($data)
    {
        $query = "SELECT * FROM contacto
                WHERE id_contacto = '" . $data['id_contacto'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un contacto
    public function editaContacto($data)
    {
        $query  = "UPDATE contacto SET nombres_contacto = '" . $data['nombres_contacto'] . "',apellidos_contacto = '" . $data['apellidos_contacto'] . "',fkID_cargo = '" . $data['fkID_cargo'] . "' ,fkID_cliente = '" . $data['fkID_cliente'] . "', email_contacto = '" . $data['email_contacto'] . "', celular_contacto = '" . $data['celular_contacto'] . "'  WHERE id_contacto = '" . $data['id_contacto'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un contacto
    public function eliminaLogicoContacto($data)
    {
        $query  = "UPDATE contacto SET estado = '2' WHERE id_contacto = '" . $data['id_contacto'] . "'";
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
        $query = "SELECT * FROM usuario
                INNER JOIN permisos on permisos.fkID_usuario = usuario.id_usuario
                WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el cargo
    public function validaCargo($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `cargo` WHERE nombre_cargo =  '" . $data['nombre_cargo'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo cargo
    public function insertaCargo($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_cargo']);
        $query  = "INSERT INTO cargo (nombre_cargo) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de cargo
    public function ultimoCargo()
    {
        $query  = "SELECT id_cargo,nombre_cargo FROM cargo ORDER BY cargo.`id_cargo` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo cliente
    public function insertaCliente($data)
    {
        $query  = "INSERT INTO cliente (nombres_cliente,apellidos_cliente,documento_cliente,rsocial_cliente, email_cliente, celular_cliente) VALUES ('" . $data['nombres_cliente'] . "', '" . $data['apellidos_cliente'] . "', '" . $data['documento_cliente'] . "', '" . $data['rsocial_cliente'] . "', '" . $data['email_cliente'] . "','" . $data['celular_cliente'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de cliente
    public function ultimoCliente()
    {
        $query  = "SELECT id_cliente,nombres_cliente,apellidos_cliente,rsocial_cliente FROM cliente ORDER BY cliente.`id_cliente` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
