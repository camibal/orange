<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class CuentasCobro
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todas las cuentas de cobro
    public function getCuentasCobro($permisosConsulta)
    {
        $query = "SELECT id, ciudad, fecha, nombre, cedula, valor, concepto, celular, formas_pago, estado FROM cuentas_cobro WHERE estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los permisos
    public function getPermisos($id_usuario, $id_modulo)
    {
        $query = "SELECT id_permisos,fkID_usuario,fkID_modulo,crear,editar,consultar,eliminar,ver  FROM permisos
                WHERE fkID_usuario ='" . $id_usuario . "' and fkID_modulo ='" . $id_modulo . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consultar cuenta de cobro
    public function consultaCliente($id)
    {
        $query = "SELECT id, ciudad, fecha, nombre, cedula, valor, concepto, celular, formas_pago, estado FROM cuentas_cobro WHERE id = '" . $id . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consultar cuenta de cobro
    public function consultaCiudades()
    {
        $query = "SELECT id_municipio, nombre FROM municipios ORDER BY nombre";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consultar detalle del envio
    public function consultaDetalles($id)
    {
        $query = "SELECT id, id_consecutivo, ciudad, fecha, nombre, cedula, valor, concepto, celular, formas_pago FROM cuentas_cobro
        INNER JOIN consecutivo on consecutivo.id_consecutivo = cuentas_cobro.id WHERE id = $id";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
    // Gusrdar cuenta de cobro
    public function postConsecutivo($cedula)
    {
        $query  = "INSERT INTO consecutivo (fkCEDULA,estadoConsecutivo) VALUES ('" . $cedula . "','" . 1 . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function postCuentasCobro($nombre, $ciudad, $fecha, $cedula, $valor, $concepto, $celular, $formaspago)
    {
        $query  = "INSERT INTO cuentas_cobro (ciudad, fecha, nombre, cedula, valor, concepto, celular, formas_pago, estado) VALUES ('" . $ciudad . "', '" . $fecha . "', '" . $nombre . "', '" . $cedula . "', '" . $valor . "','" . $concepto . "','" . $celular . "','" . $formaspago . "','" . 1 . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    //Edita un cliente
    public function editaCuentasCobro($id, $nombre, $ciudad, $fecha, $cedula, $valor, $concepto, $celular, $formaspago)
    {
        $query  = "UPDATE cuentas_cobro SET nombre = '" . $nombre . "',ciudad = '" . $ciudad . "',fecha = '" . $fecha . "',cedula = '" . $cedula . "',valor = '" . $valor . "',concepto = '" . $concepto . "',celular = '" . $celular . "',formas_pago = '" . $formaspago . "',estado = '" . 1 . "' WHERE id = '" . $id . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCuentasCobro($id)
    {
        $query  = "UPDATE cuentas_cobro SET estado = '2' WHERE id = '" . $id . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
