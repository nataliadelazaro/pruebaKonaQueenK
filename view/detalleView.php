<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Kona Queen K</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-md-2 survey">
                <p>
                    <img class="img-responsive" src="<?php echo $usuario->getFoto() ?>"/>
                </p>
                <h4>
                    <a href="<?php echo ViewHelpers::url("Usuario", "logout"); ?>">
                        Cerrar sesión
                    </a>
                </h4>


            </div>
            <div class="col-md-10 survey">
                <h2>Prueba Kona Queen K</h2>
                <form action="<?php echo ViewHelpers::url("Usuario", "update"); ?>" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $usuario->getId() ?>">
                    <h3>Listado y edición de usuario</h3>

                    <div class="form-group">
                        <label><b>Nombre</b></label>
                        <input type="text" name="nombre" class="form-control" required="required"
                               value="<?php echo $usuario->getNombre() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Apellidos</b></label>
                        <input type="text" name="apellidos" class="form-control" required="required"
                               value="<?php echo $usuario->getApellidos() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input type="email" name="email" class="form-control" required="required"
                               value="<?php echo $usuario->getEmail() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Pais</b></label>
                        <input type="text" name="pais" class="form-control" required="required"
                               value="<?php echo $usuario->getPais() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Estado o provincia</b></label>
                        <input type="text" name="estado" class="form-control"
                               required="required"
                               value="<?php echo $usuario->getEstado() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Ciudad</b></label>
                        <input type="text" name="ciudad" class="form-control" required="required"
                               value="<?php echo $usuario->getCiudad() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Calle</b></label>
                        <input type="text" name="calle" class="form-control"
                               value="<?php echo $usuario->getCalle() ?>"/>
                    </div>

                    <div class="form-group">
                        <label><b>Portal</b></label>
                        <input type="text" name="puerta" class="form-control"
                               value="<?php echo $usuario->getPuerta() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Piso</b></label>
                        <input type="text" name="piso" class="form-control"
                               value="<?php echo $usuario->getPiso() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Letra</b></label>
                        <input type="text" name="letra" class="form-control"
                               value="<?php echo $usuario->getLetra() ?>"/>
                    </div>
                    <div class="form-group">
                        <label><b>Foto</b></label>
                        <input type="file" class="btn btn-primary" name="foto">
                        <span class="custom-file-control"></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enviar"/>

                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>