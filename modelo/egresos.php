<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Egresos
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los egresos
    public function getEgresos($permisosConsulta)
    {
        $query = "SELECT * FROM egresos
                INNER JOIN proveedor ON proveedor.id_proveedor = egresos.fkID_proveedor
                INNER JOIN concepto ON concepto.id_concepto = egresos.fkID_concepto
                WHERE egresos.estado = 1 ORDER BY fecha_egreso DESC";
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

    //Trae los proveedors
    public function getProveedor()
    {
        $query = "SELECT IF(rsocial_proveedor != '',rsocial_proveedor,CONCAT(nombres_proveedor, ' ',apellidos_proveedor)) AS proveedor,id_proveedor FROM `proveedor`
            WHERE estado=1
            ORDER BY proveedor";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae la concepto
    public function getConcepto()
    {
        $query = "SELECT * FROM `concepto`
            WHERE estado=1
            ORDER BY nombre_concepto";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo contacto
    public function insertaEgreso($data)
    {
        $query  = "INSERT INTO egresos (fecha_egreso,fkID_proveedor,fkID_concepto,descripcion_egreso, valor_egreso, abono_egreso, saldo_egreso) VALUES ('" . $data['fecha_egreso'] . "', '" . $data['fkID_proveedor'] . "', '" . $data['fkID_concepto'] . "', '" . $data['descripcion_egreso'] . "', '" . $data['valor_egreso'] . "','" . $data['abono_egreso'] . "','" . $data['saldo_egreso'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consultar contacto
    public function consultaEgreso($data)
    {
        $query = "SELECT * FROM egresos
                WHERE id_egreso = '" . $data['id_egreso'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Edita un contacto
    public function editaEgreso($data)
    {
        $query  = "UPDATE egresos SET fecha_egreso = '" . $data['fecha_egreso'] . "',fkID_proveedor = '" . $data['fkID_proveedor'] . "',fkID_concepto = '" . $data['fkID_concepto'] . "' ,descripcion_egreso = '" . $data['descripcion_egreso'] . "', valor_egreso = '" . $data['valor_egreso'] . "', abono_egreso = '" . $data['abono_egreso'] . "', saldo_egreso = '" . $data['saldo_egreso'] . "'  WHERE id_egreso = '" . $data['id_egreso'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Elimina logico un contacto
    public function eliminaLogicoEgreso($data)
    {
        $query  = "UPDATE egresos SET estado = '2' WHERE id_egreso = '" . $data['id_egreso'] . "'";
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

    //Valida el concepto
    public function validaConcepto($data)
    {
        $query  = "SELECT COUNT(*) AS cantidad FROM `concepto` WHERE nombre_concepto =  '" . $data['nombre_concepto'] . "' AND estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo concepto
    public function insertaConcepto($data)
    {
        //Pasa el nombre a mayusculas
        $nombre = strtoupper($data['nombre_concepto']);
        $query  = "INSERT INTO concepto (nombre_concepto) VALUES ('" . $nombre . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de concepto
    public function ultimaConcepto()
    {
        $query  = "SELECT id_concepto,nombre_concepto FROM concepto ORDER BY concepto.`id_concepto` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Crea un nuevo proveedor
    public function insertaProveedor($data)
    {
        $query  = "INSERT INTO proveedor (nombres_proveedor,apellidos_proveedor,documento_proveedor,rsocial_proveedor, email_proveedor, celular_proveedor) VALUES ('" . $data['nombres_proveedor'] . "', '" . $data['apellidos_proveedor'] . "', '" . $data['documento_proveedor'] . "', '" . $data['rsocial_proveedor'] . "', '" . $data['email_proveedor'] . "','" . $data['celular_proveedor'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta el ultimo ID de proveedor
    public function ultimoProveedor()
    {
        $query  = "SELECT id_proveedor,nombres_proveedor,apellidos_proveedor,rsocial_proveedor FROM proveedor ORDER BY proveedor.`id_proveedor` DESC LIMIT 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consultar contacto
    public function gastosPorAnio()
    {
        $query = "SELECT YEAR(fecha_egreso) AS año,SUM(abono_egreso) AS valor FROM `egresos` WHERE estado = 1 GROUP BY year(fecha_egreso) ";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Gastos por mes ultimo año
    public function gastosPorMes()
    {
        $query = "SELECT MONTH(fecha_egreso) AS mes,SUM(abono_egreso) AS valor FROM `egresos` WHERE estado = 1 AND year(fecha_egreso) = YEAR(NOW()) GROUP BY MONTH(fecha_egreso)";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
