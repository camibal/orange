<?php
include dirname(__file__, 2) . "/config/conexion.php";
/**
 *
 */
class Informes
{
    private $conn;
    private $link;

    public function __construct()
    {
        $this->conn = new Conexion();
        $this->link = $this->conn->conectarse();
    }

    //Ventas
    public function getVentas($where)
    {
        $query = "SELECT * FROM ingresos
                INNER JOIN cliente on cliente.id_cliente = ingresos.fkID_cliente
                INNER JOIN categoria on categoria.id_categoria = ingresos.fkID_categoria
                WHERE ingresos.estado = 1 ".$where;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Gastos
    public function getGastos($where)
    {
        $query = "SELECT * FROM egresos
                INNER JOIN proveedor on proveedor.id_proveedor = egresos.fkID_proveedor
                INNER JOIN concepto on concepto.id_concepto = egresos.fkID_concepto
                WHERE egresos.estado = 1 ".$where;
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Abonos
    public function getAbonos($where)
    {
        $query = "SELECT *,IF(rsocial_cliente != '',rsocial_cliente,CONCAT(nombres_cliente, ' ',apellidos_cliente)) AS cliente FROM abonos
                INNER JOIN ingresos ON ingresos.id_ingreso = abonos.fkID_ingreso
                INNER JOIN cliente ON cliente.id_cliente = ingresos.fkID_cliente
                WHERE abonos.estado = 1 ".$where." ORDER BY fecha_abono DESC";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }

    //Trae todos los clientes
    public function getClientes()
    {
        $query = "SELECT * FROM cliente
                WHERE cliente.estado = 1";
        $result = mysqli_query($this->link, $query);
        $data   = array();
        while ($data[] = mysqli_fetch_assoc($result));
        array_pop($data);
        return $data;
    }
}
