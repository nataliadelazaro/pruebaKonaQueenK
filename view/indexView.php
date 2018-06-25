<html lang="es">
<head>
    <meta charset="utf-8"/>
    <title>Kona Queen K</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>
<?php
if (!empty($error)) {
    ?>
    <h3>
        <?php echo $error ?>
    </h3>
    <?php
}
?>
<div class="jumbotron">
<div class="container">
    <div class="row">
        <div class="col-md-12 survey">
            <form action="<?php echo ViewHelpers::url("Usuario", "login"); ?>" method="post">
                <h2>Inicio de sesión</h2>
                <hr/>
                <div class="form-group">
                    <label class="lead"><b>Email</b></label>
                    <input type="email" name="email" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                    <label class="lead"><b>Contraseña</b></label>
                    <input type="password" name="password" class="form-control" required="required"/>
                </div>
                <div class="form-group">
                    <input type="submit" value="enviar" class="btn btn-primary"/>
                </div>
                <div class="form-group">
                    <h4>
                        <a href="<?php echo ViewHelpers::url("Usuario", "nuevousuario"); ?>">¿Aún no estas
                            registrado?</a>
                    </h4>
            </form>
        </div>
    </div>
</body>
</html>