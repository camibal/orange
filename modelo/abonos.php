<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Abonos
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Trae todos los abonos
    public function getAbonos($permisosConsulta)
    {
        $query = "SELECT *,IF(rsocial_cliente != '',rsocial_cliente,CONCAT(nombres_cliente, ' ',apellidos_cliente)) AS cliente FROM abonos
                INNER JOIN ingresos ON ingresos.id_ingreso = abonos.fkID_ingreso
                INNER JOIN cliente ON cliente.id_cliente = ingresos.fkID_cliente
                WHERE abonos.estado = 1 ORDER BY fecha_abono DESC";
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

    //Consultar contacto
    public function consultaAbono($data)
    {
        $query = "SELECT * FROM abonos
                WHERE id_abono = '" . $data['id_abono'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }


    //Elimina logico un contacto
    public function eliminaLogicoIngreso($data)
    {
        $query  = "UPDATE abonos SET estado = '2' WHERE id_abono = '" . $data['id_abono'] . "'";
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

    //Crea un nuevo abono
    public function insertaAbono($data)
    {
        $query  = "INSERT INTO abonos (fkID_cliente,fkID_ingreso, fecha_abono, valor_abono,obs_abono) VALUES ('".$data['fkID_cliente']."','".$data['fkID_ingreso']."', '" . $data['fecha_abono'] . "', '" . $data['valor_abono'] . "', '" . $data['obs_abono'] . "')";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }


    //Trae todos los ingresos
    public function getIngresos($fkID_cliente)
    {
        $query = "SELECT * FROM ingresos
                INNER JOIN cliente ON cliente.id_cliente = ingresos.fkID_cliente
                INNER JOIN categoria ON categoria.id_categoria = ingresos.fkID_categoria
                WHERE ingresos.estado = 1 AND saldo_ingreso > 0 AND fkID_cliente = ".$fkID_cliente." ORDER BY fecha_ingreso DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Consulta ingreso
    public function consultaIngreso($data)
    {
        $query = "SELECT * FROM ingresos
                WHERE id_ingreso = '" . $data['fkID_ingreso'] . "'";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Elimina logico un contacto
    public function modificaIngreso($data,$saldoAnterior,$abonoAnterior)
    {
        $nuevo_abono = $abonoAnterior + $data["valor_abono"] ;
        $nuevo_saldo = $saldoAnterior - $data["valor_abono"] ;
        $query  = "UPDATE ingresos SET abono_ingreso = '".$nuevo_abono."',saldo_ingreso = '".$nuevo_saldo."' WHERE id_ingreso = '" . $data['fkID_ingreso'] . "'";
        $result = mysqli_query($this->link, $query);
        if (mysqli_affected_rows($this->link) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
