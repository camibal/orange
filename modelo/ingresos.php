<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Ingresos
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los ingresos
    public function getIngresos($permisosConsulta)
    {
        $query = "SELECT * FROM ingresos
                INNER JOIN cliente ON cliente.id_cliente = ingresos.fkID_cliente
                INNER JOIN categoria ON categoria.id_categoria = ingresos.fkID_categoria
                WHERE ingresos.estado = 1 ORDER BY fecha_ingreso DESC";
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

    //Trae la categoria
    public function getCategoria()
    {
        $query = "SELECT * FROM `categoria`
            WHERE estado=1
            ORDER BY nombre_categoria";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo contacto
    public function insertaIngreso($data)
    {
        $query  = "INSERT INTO ingresos (fecha_ingreso,fkID_cliente,fkID_categoria,descripcion_ingreso, valor_ingreso, abono_ingreso, saldo_ingreso) VALUES ('" . $data['fecha_ingreso'] . "', '" . $data['fkID_cliente'] . "', '" . $data['fkID_categoria'] . "', '" . $data['descripcion_ingreso'] . "', '" . $data['valor_ingreso'] . "','" . $data['abono_ingreso'] . "','" . $data['saldo_ingreso'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar contacto
    public function consultaIngreso($data)
    {
        $query = "SELECT * FROM ingresos
                WHERE id_ingreso = '" . $data['id_ingreso'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un contacto
    public function editaIngreso($data)
    {
        $query  = "UPDATE ingresos SET fecha_ingreso = '" . $data['fecha_ingreso'] . "',fkID_cliente = '" . $data['fkID_cliente'] . "',fkID_categoria = '" . $data['fkID_categoria'] . "' ,descripcion_ingreso = '" . $data['descripcion_ingreso'] . "', valor_ingreso = '" . $data['valor_ingreso'] . "', abono_ingreso = '" . $data['abono_ingreso'] . "', saldo_ingreso = '" . $data['saldo_ingreso'] . "'  WHERE id_ingreso = '" . $data['id_ingreso'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un contacto
    public function eliminaLogicoIngreso($data)
    {
        $query  = "UPDATE ingresos SET estado = '2' WHERE id_ingreso = '" . $data['id_ingreso'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID
    public function getIdIngresos()
    {
        $query  = "SELECT * FROM `contacto` ORDER BY `contacto`.`id_contacto` DESC LIMIT 1";
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
                INNER JOIN permisos on permisos.fkID_usuario = usuario.id_usuario
                WHERE usuario.id_usuario='" . $id_usuario . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Valida el categoria
    public function validaCategoria($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `categoria` WHERE nombre_categoria =  '" . $data['nombre_categoria'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo categoria
    public function insertaCategoria($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_categoria']);
        $query  = "INSERT INTO categoria (nombre_categoria) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de categoria
    public function ultimaCategoria()
    {
        $query  = "SELECT id_categoria,nombre_categoria FROM categoria ORDER BY categoria.`id_categoria` DESC LIMIT 1";
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

    //Consultar contacto
    public function ventasPorAño()
    {
        $query = "SELECT YEAR(fecha_ingreso) AS año,SUM(abono_ingreso) AS valor FROM `ingresos` WHERE estado = 1 GROUP BY year(fecha_ingreso)";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Ventas por mes
    public function ventasPorMes()
    {
        $query = "SELECT MONTH(fecha_ingreso) AS mes,SUM(abono_ingreso) AS valor FROM `ingresos` WHERE estado = 1 AND year(fecha_ingreso) = YEAR(NOW()) GROUP BY MONTH(fecha_ingreso)";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consulta el ultimo ID de ingresos
    public function ultimoIngreso()
    {
        $query  = "SELECT id_ingreso FROM ingresos WHERE estado=1 ORDER BY id_ingreso DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo abono
    public function insertaAbono($fkID_ingreso,$data)
    {
        $query  = "INSERT INTO abonos (fkID_ingreso,fecha_abono,valor_abono) VALUES ('".$fkID_ingreso."', '" . $data['fecha_ingreso'] . "', '" . $data['abono_ingreso'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
