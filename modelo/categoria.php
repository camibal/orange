<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Categoria
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los categorias
    public function getCategorias($permisosConsulta)
    {
        $query = "SELECT * FROM categoria
                WHERE categoria.estado = 1";
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

    //Crea un nuevo categoria
    public function insertaCategoria($data)
    {
        $query  = "INSERT INTO categoria (nombre_categoria) VALUES ('" . $data['nombre_categoria'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar categoria
    public function consultaCategoria($data)
    {
        $query = "SELECT * FROM categoria
                WHERE id_categoria = '" . $data['id_categoria'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un categoria
    public function editaCategoria($data)
    {
        $query  = "UPDATE categoria SET nombre_categoria = '" . $data['nombre_categoria'] . "'  WHERE id_categoria = '" . $data['id_categoria'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un categoria
    public function eliminaLogicoCategoria($data)
    {
        $query  = "UPDATE categoria SET estado = '2' WHERE id_categoria = '" . $data['id_categoria'] . "'";
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
