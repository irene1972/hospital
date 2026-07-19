<?php include_once("encabezado.php");?>
	<form action="<?php print RUTA; ?>login/cambiarclave" method="POST">
		<div class="form-group text-start">
			<label for="clave">* Clave de acceso:</label>
			<input id="clave" name="clave" type="password" class="form-control" placeholder="Escribe tu clave de acceso" required>
		</div>
		<div class="form-group text-start">
			<label for="verifica">* Verifica tu clave de acceso:</label>
			<input id="verifica" name="verifica" type="password" class="form-control" placeholder="Verifica tu nueva clave de acceso" required>
		</div>
		<div class="form-group text-start my-2">
			<input type="submit" value="Enviar" class="btn btn-success">
			<input type="hidden" name="id" id="id" value="<?php if(isset($datos["data"])) {print $datos["data"]; } else { print ""; } ?>">
		</div>
	</form>
<?php include_once("piepagina.php");?>