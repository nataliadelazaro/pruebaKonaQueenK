<?php

class UsuarioController extends BaseController
{

    public function index()
    {
        //Creamos el objeto usuario
        $usuario = false;
        if (isset($_SESSION["Usuario"])) {
            $usuario = $_SESSION["Usuario"];
        }

        if ($usuario) {
            $repo = new RepositorioUsuario();
            $usuarioModel = $repo->getById($usuario);

            if (sizeof($usuarioModel) == 0) {
                $this->redirect("Usuario", "logout");
            }

            $this->view("detalle", array(
                "usuario" => $usuarioModel[0]
            ));

        } else {
            $this->view("index", array());
        }
    }

    public function nuevousuario()
    {
        $this->view("nuevousuario", array());
    }

    //funcion a la que accedo desde el formulario de registro de nuevousuario
    public function alta()
    {
        if (isset($_POST["email"])) {
            //Creamos un usuario, ejecutamos la funcion uploadFoto() que os permite dejar en temporal la foto
            //ejecutamos la funcion create que guarda los valores recogidos en la bd
            $usuario = new Usuario();
            $usuario->setNombre(empty($_POST["nombre"]) ? NULL : $_POST["nombre"]);
            $usuario->setApellidos(empty($_POST["apellidos"]) ? NULL : $_POST["apellidos"]);
            $usuario->setEmail(empty($_POST["email"]) ? NULL : $_POST["email"]);
            $usuario->setPassword(empty($_POST["password"]) ? NULL : sha1($_POST["password"]));
            $usuario->setPais(empty($_POST["pais"]) ? NULL : $_POST["pais"]);
            $usuario->setEstado(empty($_POST["estado"]) ? NULL : $_POST["estado"]);
            $usuario->setCiudad(empty($_POST["ciudad"]) ? NULL : $_POST["ciudad"]);
            $usuario->setCalle(empty($_POST["calle"]) ? "N/A" : $_POST["calle"]);
            $usuario->setPuerta(empty($_POST["puerta"]) ? 0 : $_POST["puerta"]);
            $usuario->setPiso(empty($_POST["piso"]) ? 0 : $_POST["piso"]);
            $usuario->setLetra(empty($_POST["letra"]) ? "N/A" : $_POST["letra"]);
            $usuario->setFoto($this->uploadFoto());

            $repo = new RepositorioUsuario();
            $repo->create($usuario);
        }
        $this->redirect("Usuario", "index");
    }

    public function update()
    {
        $repo = new RepositorioUsuario();

        if (isset($_POST["email"])) {
            //Creamos un usuario
            $usuario = new Usuario();
            $usuario->setId(empty($_POST["id"]) ? NULL : $_POST["id"]);
            $usuario->setNombre(empty($_POST["nombre"]) ? NULL : $_POST["nombre"]);
            $usuario->setApellidos(empty($_POST["apellidos"]) ? NULL : $_POST["apellidos"]);
            $usuario->setEmail(empty($_POST["email"]) ? NULL : $_POST["email"]);
            $usuario->setPais(empty($_POST["pais"]) ? NULL : $_POST["pais"]);
            $usuario->setEstado(empty($_POST["estado"]) ? NULL : $_POST["estado"]);
            $usuario->setCiudad(empty($_POST["ciudad"]) ? NULL : $_POST["ciudad"]);
            $usuario->setCalle(empty($_POST["calle"]) ? "N/A" : $_POST["calle"]);
            $usuario->setPuerta(empty($_POST["puerta"]) ? 0 : $_POST["puerta"]);
            $usuario->setPiso(empty($_POST["piso"]) ? 0 : $_POST["piso"]);
            $usuario->setLetra(empty($_POST["letra"]) ? "N/A" : $_POST["letra"]);
            $foto = $this->uploadFoto();

            if ($foto == "na") {
                $repo->update($usuario, false);

            } else {
                $usuario->setFoto($foto);
                $repo->update($usuario, true);
            }
        }
        $this->redirect("Usuario", "index");
    }

    //funcion que se ejecuta desde el index para realizar el logueo del usuario
    public function login()
    {
        if (isset($_POST["email"])) {
            $email = $_POST["email"];
            $password = sha1($_POST["password"]);

            $repo = new RepositorioUsuario();

            //compruebo si el usuario existe en la base de datos, puede ser que este el usuario o el password mal en tal caso daria un error
            $data = $repo->getByLoginPassword($email, $password);

            if (sizeof($data) > 0) {
                $_SESSION["Usuario"] = $data[0]->getId();
                $this->view("detalle", array(
                    "usuario" => $data[0]
                ));

            } else {
                $this->view("index", array(
                    "error" => "Información incorrecta"
                ));
            }
        } else {
            $this->view("index", array(
                "error" => "Información incorrecta"
            ));
        }
    }

    //funcion que vacia el usuario almacenado en la sesion
    public function logout()
    {
        unset($_SESSION["Usuario"]);

        //vacio la session y voy al index
        $this->redirect("Usuario", "index");
    }

    //funcion que realiza el almacenado de la imagen de perfil
    private function uploadFoto()
    {
        if (!isset($_FILES['foto'])) {
            return "na";
        }

        $file_name = $_FILES['foto']['name'];
        $file_size = $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $file_type = $_FILES['foto']['type'];
        $file_ext = strtolower(end(explode('.', $file_name)));

        echo $file_name;
        echo $file_type;
        $expensions = array("jpeg", "jpg", "png");

        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Extensión no permitida.";
        }

        if ($file_size > 2097152) {
            $errors[] = 'El fichero no puede ser mayor de 2 MB';
        }

        //almacenamos el fichero en temporal para  codificar
        if (empty($errors)) {
            move_uploaded_file($file_tmp, "tmp/" . $file_name);
            $path = 'tmp/' . $file_name;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);

            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            unlink($path);

            return $base64;
        } else {
            return "na";
        }
    }
}