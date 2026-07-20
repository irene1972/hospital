<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/css/estilos.css">
    <title>Hospital | <?php print $datos['titulo']; ?></title>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <b><a href="#" class="navbar-brand">Hospital</a></b>
        <?php
		if (isset($datos["menu"]) && $datos["menu"]==true) {
			print '<div class="collapse navbar-collapse" id="navbarMenu">';
			print "<ul class='navbar-nav mr-auto mt-2 mt-lg-0'>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."egresos' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="egresos") print "active";
			print "'>Egresos</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."historiales' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="historiales") print "active";
			print "'>Historiales</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."movimientos' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="movimientos") print "active";
			print "'>Movimientos</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."ingresos' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="ingresos") print "active";
			print "'>Ingresos</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."camas' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="camas") print "active";
			print "'>Camas</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."quirofanos' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="quirofanos") print "active";
			print "'>Quirófanos</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."cuentas' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="cuentas") print "active";
			print "'>Cuentas</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."enfermeras' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="enfermeras") print "active";
			print "'>Enfermeras</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."doctores' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="doctores") print "active";
			print "'>Doctores</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."pacientes' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="pacientes") print "active";
			print "'>Pacientes</a>";
			print "</li>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."usuarios' class='nav-link ";
			if(isset($datos["activo"]) && $datos["activo"]=="usuarios") print "active";
			print "'>Usuarios</a>";
			print "</li>";
			//
		    print "<li class='nav-item'>";
		    print "<a href='".RUTA."tablero/respaldar' class='nav-link'>Respaldar</a>";
		    print "</li>";
			//
			//
			print "</ul>";
			print "<ul class='nav navbar-nav ms-auto'>";
			//
			print "<li class='nav-item'>";
			print "<a href='".RUTA."tablero/perfil' class='nav-link'>";
			print '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
	  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
	</svg>';
		    print "</a>";
		    print "</li>";
		    print "<li class='nav-item'>";
		    print "<a href='".RUTA."tablero/logout' class='nav-link'>"; 
		    print '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
	  <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
	  <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
	</svg>';
	      	print "</a></li>";
		    print "</ul>";
		    print "</div>";
		}
		?>
    </nav>
    <div class="container-fluid">
        <div class="row-content">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <?php 
                if(isset($datos['errores'])){
                    if(count($datos['errores'])>0){
                        print "<div class='alert alert-danger mt-3'><ul>";
                        foreach($datos['errores'] as $valor){
                            print "<li>".$valor."</li>";
                        }
                        print "</ul></div>";
                    }
                }
                ?>
                <div class="card p-4 mt-3 bg-info-subtle">
                    <div class="card-header text-center">
                        <h2><?php print $datos['subtitulo']; ?></h2>
                    </div>
                    <div class="card-body">