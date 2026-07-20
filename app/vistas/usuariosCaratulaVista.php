<?php include_once("encabezado.php");?>
<div class="table-responsive">
	<table class="table table-striped" width="100%">
		<thead>
		    <tr>
		    <th>id</th>
		    <th>Nombre</th>
		    <th>Tipo usuario</th>
		    <th>Estado</th>
		    <th>Modificar</th>
		    <th>Borrar</th>
		  </tr>
		  </thead>
		  <tbody>
		  	<?php
		  	for($i=0; $i<count($datos["data"][0]); $i++){
		  		print "<tr>";
		  		print "<td class='text-start'>".$datos["data"][0][$i]['id']."</td>";
		  		print "<td class='text-start'>".$datos["data"][0][$i]['nombre']."</td>";
		      	print "<td class='text-start'>".$datos["data"][0][$i]['tipo']."</td>";
		      	print "<td class='text-start'>".$datos["data"][0][$i]['estado']."</td>";
		      	print "<td><a href='".RUTA."usuarios/modificar/".$datos["data"][0][$i]["id"]."' class='btn btn-info'>Modificar</a></td>";
		      	print "<td><a href='".RUTA."usuarios/borrar/".$datos["data"][0][$i]["id"]."' class='btn btn-danger'>Borrar</a></td>";
		  		print "</tr>";
		  	}
		  	?>
		  </tbody>
	</table>
	<a href="<?php print RUTA; ?>usuarios/alta" class="btn btn-success">Dar de alta un usuario</a>
</div>
<?php include_once("piepagina.php");?>