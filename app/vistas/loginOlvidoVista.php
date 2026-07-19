<?php include_once("encabezado.php"); ?>
                        <form action="<?php print RUTA; ?>login/olvido" method="POST">
                            <div class="form-group text-start">
                                <label for="usuario">* Correo electrónico:</label>
                                <input id="usuario" type="email" name="usuario" class="form-control" placeholder="Escribe tu usuario (correo electrónico)" required>
                            </div>
                            <div class="form-group text-start my-2">
                                <input type="submit" value="Enviar" class="btn btn-success">
                                <a href="<?php print RUTA; ?>login" class="btn btn-success">Regresar</a>
                            </div>
                        
                    </form>
                    <p>Escribe tu usuario (correo electrónico) existente.</p>
<?php include_once("piepagina.php"); ?>