<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Kona Queen K</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="row">
            <div class="col-md-12 survey">
                <form action="<?php echo ViewHelpers::url("Usuario", "alta"); ?>"
                      method="post" enctype="multipart/form-data">
                    <h3>Nuevo usuario</h3>
                    <hr/>
                    <div class="form-group">
                        <label><b>Nombre</b></label>
                        <input type="text" name="nombre" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Apellidos</b></label>
                        <input type="text" name="apellidos" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Email</b></label>
                        <input type="email" name="email" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Contraseña</b></label>
                        <input type="password" name="password" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Pais</b></label>
                        <input type="text" name="pais" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Estado o provincia</b></label>
                        <input type="text" name="estado" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Ciudad</b></label>
                        <input type="text" name="ciudad" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label><b>Calle</b></label>
                        <input type="text" name="calle" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><b>Portal</b></label>
                        <input type="number" name="puerta" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><b>Piso</b></label>
                        <input type="number" name="piso" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><b>Letra</b></label>
                        <input type="text" name="letra" class="form-control"/>
                    </div>
                    <div class="form-group">
                        <label><b>Foto</b></label>
                        <input type="file" class="btn btn-primary" name="foto">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Enviar" class="btn btn-primary"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>