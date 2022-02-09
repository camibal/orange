
        <!-- Core plugin JavaScript-->

        <!-- Custom scripts for all pages-->
        <script src="componentes/js/sb-admin-2.min.js">
        </script>
        <!-- Page level plugins -->
        <script src="componentes/vendor/chart.js/Chart.min.js">
        </script>
        <!-- Page level custom scripts -->
        <script src="componentes/js/demo/chart-area-demo.js">
        </script>


 </body>
 </html>
 <script type="text/javascript">
    //esta cargando el archivo tabla.php en el div tabla
    $(document).ready(function(){
        //$('#tabla').load('usuario/Vusuario.php')
        $("[name*='btn_cerrar_sesion']").click(function(){
        console.log("hola")
        $.ajax({
            url: "../controlador/ajaxUsuario.php",
            data: "tipo=cerrar_sesion",
        })
        .done(function(data) {
            window.location="login/index.php";
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        })
    })
    });

    $("#menu_usuarios").click(function(){
        $('#tabla').load('usuarios/index.php');
        $("#titulo").html('&nbsp;Usuarios');
    });

    //Redireccion a index de clientes
    $("#menu_clientes").click(function(){
        $('#tabla').load('clientes/index.php');
        $("#titulo").html('&nbsp;Clientes');
    });

    //Redireccion a index de contactos
    $("#menu_contacto").click(function(){
        $('#tabla').load('contactos/index.php');
        $("#titulo").html('&nbsp;Contactos');
    });

    //Redireccion a index de ingresos
    $("#menu_ingresos").click(function(){
        $('#tabla').load('ingresos/index.php');
        $("#titulo").html('&nbsp;Ingresos');
    });

    //Redireccion a index de egresos
    $("#menu_egresos").click(function(){
        $('#tabla').load('egresos/index.php');
        $("#titulo").html('&nbsp;Egresos');
    });

    //Redireccion a index de informes
    $("#menu_informes").click(function(){
        $('#tabla').load('informes/index.php');
        $("#titulo").html('&nbsp;Informes');
    });
    //Redireccion a index de cuentas cobro
    $("#menu_cuentas_cobro").click(function(){
        $('#tabla').load('cuentas-cobro/index.php');
        $("#titulo").html('&nbsp;cuentas de cobro');
    });

    //Redireccion a index de abonos
    $("#menu_abonos").click(function(){
        $('#tabla').load('abonos/index.php');
        $("#titulo").html('&nbsp;Abonos');
    });

    //Redireccion a index de categoria
    $("#menu_categoria").click(function(){
        $('#tabla').load('categoria/index.php');
        $("#titulo").html('&nbsp;Categoria');
    });

    //Redireccion a index de proveedor
    $("#menu_proveedor").click(function(){
        $('#tabla').load('proveedor/index.php');
        $("#titulo").html('&nbsp;Proveedor');
    });

    //Funcion que retorna el nombre del mes
    function mesLetras(mes){
        switch(mes) {
            case 1:
                mesNombre = 'Enero';
                break;
            case 2:
                mesNombre = 'Febrero';
                break;
            case 3:
                mesNombre = 'Marzo';
                break;
            case 4:
                mesNombre = 'Abril';
                break;
            case 5:
                mesNombre = 'Mayo';
                break;
            case 6:
                mesNombre = 'Junio';
                break;
            case 7:
                mesNombre = 'Julio';
                break;
            case 8:
                mesNombre = 'Agosto';
                break;
            case 9:
                mesNombre = 'Septiembre';
                break;
            case 10:
                mesNombre = 'Octubre';
                break;
            case 11:
                mesNombre = 'Noviembre';
                break;
            case 12:
                mesNombre = 'Diciembre';
                break;
            default:
                mesNombre = 'Indefinido';
                break;
        }        
        return mesNombre;
    }

    //Funcion para graficar ventas por año
    function ventasPorAño(){
        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ventas_por_año",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels = [];
            //Array para la data
            arrayData = [];

            for (var i =0; i < data.length; i++) {
                arrayLabels.push(data[i]["año"]);
                arrayData.push(data[i]["valor"]);
            }

            var presets = window.chartColors;
            var utils = Samples.utils;
            var inputs = {
                min: -100,
                max: 100,
                count: 8,
                decimals: 2,
                continuity: 1
            };

            var options = {
                maintainAspectRatio: false,
                spanGaps: false,
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0
                        }
                    }]
                }
            };



            // reset the random seed to generate the same data for all charts
            utils.srand(8);

            //Ventas por año
            new Chart('ventas', {
                type: 'line',
                data: {
                    labels: arrayLabels,
                    datasets: [{
                        label: 'Ventas por año',
                        backgroundColor: 'rgb(54, 249, 27)',
                        borderColor: 'rgb(25, 187, 2)',
                        data: arrayData
                    }]
                }
            });
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }

    //Funcion para graficar gastos por año
    function gastosPorAnio(){
        $.ajax({
            url: "../controlador/ajaxEgreso.php",
            data: "tipo=gastos_por_anio",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels = [];
            //Array para la data
            arrayData = [];

            for (var i =0; i < data.length; i++) {
                arrayLabels.push(data[i]["año"]);
                arrayData.push(data[i]["valor"]);
            }

            var presets = window.chartColors;
            var utils = Samples.utils;
            var inputs = {
                min: -100,
                max: 100,
                count: 8,
                decimals: 2,
                continuity: 1
            };

            var options = {
                maintainAspectRatio: false,
                spanGaps: false,
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0
                        }
                    }]
                }
            };

            // reset the random seed to generate the same data for all charts
            utils.srand(8);

            //Ventas pro año
            new Chart('gastos', {
                type: 'line',
                data: {
                    labels: arrayLabels,
                    datasets: [{
                        label: 'Gastos por año',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(251, 0, 53)',
                        data: arrayData
                    }]
                }
            });
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }

    //Funcion para graficar gastos por año
    function vygPorAnio(){
        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ventas_por_año",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels = [];
            //Array para la data
            arrayVentas = [];

            for (var i =0; i < data.length; i++) {
                arrayLabels.push(data[i]["año"]);
                arrayVentas.push(data[i]["valor"]);
            }

            $.ajax({
                url: "../controlador/ajaxEgreso.php",
                data: "tipo=gastos_por_anio",
                dataType: 'json'
            })
            .done(function(data) {
                //Array para la data
                arrayGastos = [];

                for (var i =0; i < data.length; i++) {
                    arrayGastos.push(data[i]["valor"]);
                }

                //Vyg pro año
                new Chart('vyg', {
                    type: 'line',
                    data: {
                        labels: arrayLabels,
                        datasets: [{
                            label: 'Ventas por año',
                            backgroundColor: 'rgb(54, 249, 27)',
                            borderColor: 'rgb(25, 187, 2)',
                            data: arrayVentas,
                            fill: false,
                        }, {
                            label: 'Gastos por año',
                            fill: false,
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(251, 0, 53)',
                            data: arrayGastos,
                        }]
                    }
                });
            })
            .fail(function(data) {
                console.log(data);
            })
            .always(function(data) {
                console.log(data);
            });    
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });     
    }

    //Funcion para graficar ventas por mes ultimo año
    function ventasPorMes(){
        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ventas_por_mes",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels = [];
            //Array para la data
            arrayData = [];

            for (var i =1; i <= 12; i++) {
                mes = mesLetras(i);
                arrayLabels.push(mes);

                bandera = 0;

                for (var j =0; j < data.length; j++) {
                    if(data[j]["mes"] == i){
                        arrayData.push(data[j]["valor"]);
                        bandera = 1;
                    }
                }

                if(bandera == 0){
                    arrayData.push(0);
                }
            }

            var presets = window.chartColors;
            var utils = Samples.utils;
            var inputs = {
                min: -100,
                max: 100,
                count: 8,
                decimals: 2,
                continuity: 1
            };

            var options = {
                maintainAspectRatio: false,
                spanGaps: false,
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0
                        }
                    }]
                }
            };



            // reset the random seed to generate the same data for all charts
            utils.srand(8);

            //Ventas por año
            new Chart('ventasMes', {
                type: 'line',
                data: {
                    labels: arrayLabels,
                    datasets: [{
                        label: 'Ventas por mes ultimo año',
                        backgroundColor: 'rgb(54, 249, 27)',
                        borderColor: 'rgb(25, 187, 2)',
                        data: arrayData
                    }]
                }
            });
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }

    //Funcion para graficar gastos por mes
    function gastosPorMes(){
        $.ajax({
            url: "../controlador/ajaxEgreso.php",
            data: "tipo=gastos_por_mes",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels = [];
            //Array para la data
            arrayData = [];

            for (var i =1; i <= 12; i++) {
                mes = mesLetras(i);
                arrayLabels.push(mes);

                bandera = 0;

                for (var j =0; j < data.length; j++) {
                    if(data[j]["mes"] == i){
                        arrayData.push(data[j]["valor"]);
                        bandera = 1;
                    }
                }

                if(bandera == 0){
                    arrayData.push(0);
                }
            }

            var presets = window.chartColors;
            var utils = Samples.utils;
            var inputs = {
                min: -100,
                max: 100,
                count: 8,
                decimals: 2,
                continuity: 1
            };

            var options = {
                maintainAspectRatio: false,
                spanGaps: false,
                elements: {
                    line: {
                        tension: 0.000001
                    }
                },
                plugins: {
                    filler: {
                        propagate: false
                    }
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            autoSkip: false,
                            maxRotation: 0
                        }
                    }]
                }
            };

            // reset the random seed to generate the same data for all charts
            utils.srand(8);

            //Ventas pro año
            new Chart('gastosMes', {
                type: 'line',
                data: {
                    labels: arrayLabels,
                    datasets: [{
                        label: 'Gastos por mes ultimo año',
                        backgroundColor: 'rgb(255, 99, 132)',
                        borderColor: 'rgb(251, 0, 53)',
                        data: arrayData
                    }]
                }
            });
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });
    }

    //Funcion para graficar gastos por año
    function vygPorMes(){
        $.ajax({
            url: "../controlador/ajaxIngreso.php",
            data: "tipo=ventas_por_mes",
            dataType: 'json'
        })
        .done(function(data) {
            //Array para los labels
            arrayLabels2 = [];
            //Array para la data
            arrayVentas2 = [];

            for (var i =1; i <= 12; i++) {
                mes = mesLetras(i);
                arrayLabels2.push(mes);

                bandera = 0;

                for (var j =0; j < data.length; j++) {
                    if(data[j]["mes"] == i){
                        arrayVentas2.push(data[j]["valor"]);
                        bandera = 1;
                    }
                }

                if(bandera == 0){
                    arrayVentas2.push(0);
                }
            }

            $.ajax({
                url: "../controlador/ajaxEgreso.php",
                data: "tipo=gastos_por_mes",
                dataType: 'json'
            })
            .done(function(data) {
            //Array para la data
            arrayGastos2 = [];

            for (var i =1; i <= 12; i++) {
                bandera = 0;

                for (var j =0; j < data.length; j++) {
                    if(data[j]["mes"] == i){
                        arrayGastos2.push(data[j]["valor"]);
                        bandera = 1;
                    }
                }

                if(bandera == 0){
                    arrayGastos2.push(0);
                }
            }
                //Vyg pro año
                new Chart('vygMes', {
                    type: 'line',
                    data: {
                        labels: arrayLabels2,
                        datasets: [{
                            label: 'Ventas por mes',
                            backgroundColor: 'rgb(54, 249, 27)',
                            borderColor: 'rgb(25, 187, 2)',
                            data: arrayVentas2,
                            fill: false,
                        }, {
                            label: 'Gastos por mes',
                            fill: false,
                            backgroundColor: 'rgb(255, 99, 132)',
                            borderColor: 'rgb(251, 0, 53)',
                            data: arrayGastos2,
                        }]
                    }
                });
                
            })
            .fail(function(data) {
                console.log(data);
            })
            .always(function(data) {
                console.log(data);
            });    
        })
        .fail(function(data) {
            console.log(data);
        })
        .always(function(data) {
            console.log(data);
        });     
    }

    //Funcion para graficar ventas por año
    ventasPorAño();

    //Funcion para graficar gastos por año
    gastosPorAnio();

    //Funcion para graficar ingresos vs gastos por año
    vygPorAnio();

    //Funcion para graficar ingresos por mes ultimo año
    ventasPorMes();

    //Funcion para graficar egresos por mes ultimo año
    gastosPorMes();

    //Funcion para graficar ingresos vs gastos por mes
    vygPorMes();
</script>
