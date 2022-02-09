<?php
include dirname(__FILE__, 2) . "/config/conexion.php";
/**
 *
 */
class Usuario
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los usuario registrados
    public function getUsuario($permisoconsulta)
    {
        $query = "SELECT * FROM usuario
            WHERE usuario.estado = 1 ";
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

    //Trae todos los permisos
    public function getPermisosconsulta($id_usuario)
    {
        $query = "SELECT * FROM usuario
                    WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la información del usuario logeado
    public function getUsuariolog($id_usuario)
    {
        $query = "SELECT * FROM `usuario`
                WHERE id_usuario = '" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la información de ver modulo
    public function getVermodulo($id_usuario, $id_modulo)
    {
        $query  = "SELECT ver FROM `permisos` WHERE fkId_usuario='" . $id_usuario . "' and fkID_modulo='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer un usuario registrados
    public function consultaUsuario($data)
    {
        $query = "SELECT * FROM usuario
                WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Traer datos del usuario
    public function consultaDatosUsuario($data)
    {
        $query = "select nombre_cargo, documento_persona as nombre_usuario, documento_persona as pass_usuario   FROM persona
                    INNER JOIN cargo on cargo.id_cargo = persona.fkID_cargo
                    WHERE id_persona = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo usuario
    public function insertaUsuario($data)
    {
        $query  = "INSERT INTO `usuario`(`nombre_usuario`, `pass_usuario`,email_usuario, celular_usuario) VALUES ('" . $data['nombre_usuario'] . "',sha1( '" . $data['pass_usuario'] . "'), '" . $data['email_usuario'] . "', '" . $data['celular_usuario'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getBuscar_usuario($data)
    {
        $query  = "select COUNT(*) as conteo FROM `usuario` WHERE estado=1 and fkID_persona= '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae los cargos
    public function getCargo()
    {
        $query  = "select * FROM `cargo` WHERE estado=1 AND id_cargo=1 or id_cargo=2 or id_cargo=3";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita Usuario
    public function editaUsuario($data)
    {
        if ($data['pass_usuario'] === $data['pass_antiguo']) {
            $r = "";
        } else {
            $r = ",pass_usuario = sha1('" . $data['pass_usuario'] . "')";
        }

        $query  = "UPDATE usuario SET email_usuario = '".$data["email_usuario"]."', celular_usuario = '".$data["celular_usuario"]."' ,nombre_usuario = '" . $data['nombre_usuario'] . "' $r WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un usuario
    public function eliminaLogicoUsuario($data)
    {
        $query  = "UPDATE usuario SET estado = 2 WHERE id_usuario = '" . $data['id_usuario'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function getUserById($usuarioNombre = null)
    {
        if (!empty($usuarioNombre)) {
            $query  = "SELECT * FROM usuario WHERE nombre_usuario = '" . $usuarioNombre . "'";
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Verifica contraseña
    public function getPass($usuarioNombre = null, $password = null)
    {
        if (!empty($usuarioNombre)) {
            if (!empty($password)) {
                $query  = "SELECT * FROM usuario WHERE nombre_usuario ='" . $usuarioNombre . "' AND pass_usuario=sha1('" . $password . "')";
                $result = mysqli_query($this->link, $query);
                $data   = array();
                while ($data[] = mysqli_fetch_assoc($result));
                array_pop($data);
                return $data;
            }
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function getID($id = null)
    {
        if (!empty($id)) {
            $query  = "SELECT * FROM tb_client WHERE subscriber=" . $id;
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    //Obtiene el usuario por id
    public function setEditUser($data)
    {
        if (!empty($data['id'])) {
            $query  = "UPDATE Usuario SET name='" . $data['name'] . "',last_name='" . $data['last_name'] . "', email='" . $data['email'] . "' WHERE id=" . $data['id'];
            $result = mysqli_query($this->link, $query);
            if ($result) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Borra el usuario por id
    public function deleteUser($id = null)
    {
        if (!empty($id)) {
            $query  = "DELETE FROM Usuario WHERE id=" . $id;
            $result = mysqli_query($this->link, $query);
            if (mysqli_affected_rows($this->link) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    //Filtro de busqueda
    public function getUsuarioBySearch($data = null)
    {
        if (!empty($data)) {
            $query  = "SELECT * FROM Usuario WHERE name LIKE'%" . $data . "%' OR last_name LIKE'%" . $data . "%' OR email LIKE'%" . $data . "%'";
            $result = mysqli_query($this->link, $query);
            $data   = array();
            while ($data[] = mysqli_fetch_assoc($result));
            array_pop($data);
            return $data;
        } else {
            return false;
        }
    }

    public function insertaPermisos($data)
    {
        //Consulta el ultimo ID de usuario
        $id_usuario = $this->getIdUsuario();
        //Recorre array modulos
        for ($i = 1; $i <= 14; $i++) {
            # code...
            $query  = "INSERT INTO permisos (fkID_usuario,fkID_modulo,crear,editar, consultar, eliminar, ver) VALUES ('" . $id_usuario[0]["id_usuario"] . "','" . $i . "','1','1','1','1','1')";
            $result = mysqli_query($this->link, $query);
        }

    }

    //Consulta el ultimo ID
    public function getIdUsuario()
    {
        $query  = "SELECT id_usuario FROM `usuario` ORDER BY `usuario`.`id_usuario` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consulta si existe el email
    public function emailExiste($email)
    {
        $query  = "SELECT  id_usuario FROM `usuario` WHERE email_usuario = '".$email."' LIMIT 1";
        $result = mysqli_query($this->link, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    //Cambiar contraseña
    public function cambiarPass($email_usuario,$clave)
    {
        $clave = sha1($clave);
        $query  = "UPDATE usuario SET pass_usuario='" . $clave . "' WHERE email_usuario='" . $email_usuario."'";
        $result = mysqli_query($this->link, $query);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
