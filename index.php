<?php
$pagina=$_GET["pagina"]??"inicio";
$mensaje="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $mensaje="Datos registrados correctamente";
    if($pagina=="medicamentos"){
        if($_POST["cantidad"]<=$_POST["stock"])
            $mensaje="ALERTA: Stock bajo";
    }
}
?>
<html>
<head>
<title>Sistema Hospital La Paz </title>
<style>
body{font-family:Arial;background:#eeeeee}
.caja{width:650px;margin:40px auto;background:white;padding:30px;border:1px solid #aaa}
h1,h2{text-align:center}
.menu{text-align:center}
a,button{background:#333;color:white;padding:12px 20px;margin:10px;text-decoration:none;border:0}
input{width:100%;padding:9px;margin:5px 0 12px 0;box-sizing:border-box}
.mensaje{text-align:center;background:#ddd;padding:10px}
</style>
</head>
<body>
<div class="caja">
<h2>Sistema Hospital La Paz</h2>
<?php if($pagina=="inicio"){ ?>
<h1>Inicio</h1>
<div class="menu">
<a href="?pagina=pacientes">Pacientes</a>
<a href="?pagina=citas">Citas</a>
<a href="?pagina=medicamentos">Medicamentos</a>
</div>
<?php }elseif($pagina=="pacientes"){ ?>
<h1>Registrar Paciente</h1>
<form method="post">
Nombre<input name="nombre">
Apellidos<input name="apellidos">
CI<input name="ci">
Edad<input name="edad">
<button>Guardar</button>
</form>
<?php }elseif($pagina=="citas"){ ?>
<h1>Registrar Cita</h1>
<form method="post">
Paciente<input name="paciente">
Especialidad<input name="especialidad">
Medico<input name="medico">
Fecha<input name="fecha">
Hora<input name="hora">
<button>Guardar</button>
</form>
<?php }else{ ?>
<h1>Medicamentos</h1>
<form method="post">
Medicamento<input name="medicamento">
Cantidad<input name="cantidad">
Stock minimo<input name="stock">
<button>Registrar</button>
</form>
<?php } ?>
<?php if($mensaje!=""){ ?>
<p class="mensaje"><?php echo $mensaje; ?></p>
<?php } ?>
<?php if($pagina!="inicio"){ ?>
<div class="menu">
<a href="?pagina=inicio">Volver</a>
</div>
<?php } ?>
</div>
</body>
</html>