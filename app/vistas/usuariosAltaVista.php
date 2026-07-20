<?php include_once("encabezado.php");?>
<form action="<?php print RUTA; ?>usuarios/alta" method="POST">

	<div class="form-group text-start">
		<label for="tipoUsuario">* Tipo de usuario:</label>
		<select class="form-control" name="tipoUsuario" id="tipoUsuario" 
		<?php if (isset($datos["baja"])){ print " disabled "; } ?>>
			<option value="void">---Selecciona un tipo de usuario---</option>
			<?php  
				for ($i=0; $i < count($datos["tiposUsuarios"]); $i++) {
					print "<option value='".$datos["tiposUsuarios"][$i]["id"]."'";
					if(isset($datos["data"]["tipoUsuario"]) && $datos["data"]["tipoUsuario"]==$datos["tiposUsuarios"][$i]["id"]){
		                print " selected ";
		            }
		            print ">".$datos["tiposUsuarios"][$i]["tipo"]."</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group text-start">
		<label for="nombres">* Nombre del usuario:</label>
		<input id="nombres" name="nombres" type="text" class="form-control" placeholder="Nombre del usuario" required value="<?php print isset($datos['data']['nombres'])?$datos['data']['nombres']:''; ?>" <?php if (isset($datos["baja"])){ print " disabled "; } ?>>
	</div>

	<div class="form-group text-start">
		<label for="apellidos">* Apellidos del usuario:</label>
		<input id="apellidos" name="apellidos" type="text" class="form-control" placeholder="Apellidos del usuario" required value="<?php print isset($datos['data']['apellidos'])?$datos['data']['apellidos']:''; ?>" <?php if (isset($datos["baja"])){ print " disabled "; } ?>>
	</div>

	<div class="form-group text-start">
		<label for="correo">* Correo electrónico:</label>
		<input id="correo" name="correo" type="email" class="form-control" placeholder="Correo electrónico (usuario)" required value="<?php print isset($datos['data']['correo'])?$datos['data']['correo']:''; ?>" <?php if (isset($datos["baja"])){ print " disabled "; } ?>>
	</div>

	<div class="form-group text-start">
		<label for="telefono">* Teléfono:</label>
		<input id="telefono" name="telefono" type="text" class="form-control" placeholder="Número telefónico" required value="<?php print isset($datos['data']['telefono'])?$datos['data']['telefono']:''; ?>" <?php if (isset($datos["baja"])){ print " disabled "; } ?>>
	</div>

	<div class="form-group text-start">
		<label for="estadoUsuario">* Estado del usuario:</label>
		<select class="form-control" name="estadoUsuario" id="estadoUsuario" 
		<?php if (isset($datos["baja"])){ print " disabled "; } ?>>
			<option value="void">---Selecciona un estado del usuario---</option>
			<?php  
				for ($i=0; $i < count($datos["estadosUsuarios"]); $i++) {
					print "<option value='".$datos["estadosUsuarios"][$i]["id"]."'";
					if(isset($datos["data"]["estadoUsuario"]) && $datos["data"]["estadoUsuario"]==$datos["estadosUsuarios"][$i]["id"]){
		                print " selected ";
		            }
		            print ">".$datos["estadosUsuarios"][$i]["estado"]."</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group text-start">
		<label for="genero">* Género del usuario:</label>
		<select class="form-control" name="genero" id="genero" 
		<?php if (isset($datos["baja"])){ print " disabled "; } ?>>
			<option value="void">---Selecciona un género del usuario---</option>
			<?php  
				for ($i=0; $i < count($datos["generos"]); $i++) {
					print "<option value='".$datos["generos"][$i]["id"]."'";
					if(isset($datos["data"]["genero"]) && $datos["data"]["genero"]==$datos["generos"][$i]["id"]){
		                print " selected ";
		            }
		            print ">".$datos["generos"][$i]["genero"]."</option>";
				}
			?>
		</select>
	</div>

	<div class="form-group text-start mt-3">
	<input type="submit" value="Enviar" class="btn btn-success">
	<a href="<?php print RUTA; ?>usuarios" class="btn btn-success">Regresar</a>
	</div>


</form>
<?php include_once("piepagina.php");?>