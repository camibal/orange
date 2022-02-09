<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Login
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Verifica usuario y contraseña
    public function getLogin($data)
    {
        $query = "SELECT * FROM usuario WHERE nombre_usuario ='" . $data["username"] . "' AND pass_usuario=sha1('" . $data["passwd"] . "')";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
