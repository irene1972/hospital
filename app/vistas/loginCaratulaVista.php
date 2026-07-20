<?php include_once("encabezado.php"); ?>
                        <form action="<?php print RUTA; ?>login/verificar" method="POST">
                            <div class="form-group text-start">
                                <label for="usuario">* Usuario:</label>
                                <input id="usuario" type="email" name="usuario" class="form-control" placeholder="Escribe tu usuario (correo electrónico)" required value="<?php print isset($datos['data']['usuario'])?$datos['data']['usuario']:'';?>">
                            </div>
                            <div class="form-group text-start">
                                <label for="clave">* Clave de acceso:</label>
                                <input id="clave" type="password" name="clave" class="form-control" placeholder="Escribe tu clave de acceso" required value="<?php print isset($datos['data']['clave'])?$datos['data']['clave']:'';?>">
                            </div>
                            <div class="form-group text-start mt-2">
                                <input type="checkbox" name="recordar" <?php print isset($datos['data']['recordar'])?' checked':''; ?>>
                                <label for="recordar">Recordar</label>
                            </div>
                            <div class="form-group text-start my-2">
                                <input type="submit" value="Enviar" class="btn btn-success">
                            </div>
                        
                    </form>
                    <a href="<?php print RUTA; ?>login/olvido">¿Olvidaste tu clave de acceso?</a><br>
<?php include_once("piepagina.php"); ?>