<?php

class RepositorioUsuario extends BaseRepositorio
{

    public function getAll()
    {
        $conn = $this->conexion();

        $sql = "SELECT id,nombre, apellidos, email, password, pais,estado,ciudad, calle, puerta, piso, letra, foto 
                FROM usuario";
        $result = $conn->query($sql);
        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object($result)) {
                array_push($data, Usuario::dbToObject($row));
            }
        }
        $this->desconectar($conn);
        return $data;
    }

    //obtengo el usuario a traves del usuario y la contraseña
    public function getByLoginPassword($email, $password)
    {
        $conn = $this->conexion();

        $sql = "SELECT id,nombre, apellidos, email, password, pais,estado,ciudad, calle, puerta, piso, letra, foto 
                FROM usuario WHERE password='" . $password . "' and email='" . $email . "'";

        //conecto con la bd y ejecuto la query
        $result = $conn->query($sql) or die(mysqli_error($conn));

        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                //almaceno el usuario como objeto en un array
                array_push($data, Usuario::dbToObject($row));
            }
        }

        //cierro la conexion con la bd
        $this->desconectar($conn);
        //devuelvo el usuario
        return $data;
    }

    public function getById($id)
    {
        $conn = $this->conexion();

        $sql = "SELECT id,nombre, apellidos, email, password, pais,estado,ciudad, calle, puerta, piso, letra, foto 
                FROM usuario WHERE id=" . $id;
        $result = $conn->query($sql) or die(mysqli_error($conn));
        $data = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                array_push($data, Usuario::dbToObject($row));
            }
        }

        $this->desconectar($conn);
        return $data;
    }

    public function create($usuario)
    {
        //conectamos con la bd
        $conn = $this->conexion();

        //creamos la query
        $sql = "INSERT INTO usuario(nombre, apellidos, email, password, pais,estado,ciudad, calle, puerta, piso, letra, foto) 
                VALUES ('" . $usuario->getNombre() . "', '" . $usuario->getApellidos() . "', '" .
                $usuario->getEmail() . "','" . $usuario->getPassword() . "', '" . $usuario->getPais() . "','" .
                $usuario->getEstado() . "','" . $usuario->getCiudad() . "', '" . $usuario->getCalle() . "'," .
                $usuario->getPuerta() . "," . $usuario->getPiso() . ", '" .
                $usuario->getLetra() . "', '" . $usuario->getFoto() . "')";

        //ejecutamos la query
        $result = $conn->query($sql) or die(mysqli_error($conn));

        //cerramos la conexion
        $this->desconectar($conn);
    }

    public function update($usuario, $updateFoto)
    {
        //conectamos con la bd
        $conn = $this->conexion();

        //creamos la query
        $sql = "UPDATE usuario SET nombre ='" . $usuario->getNombre() . "', apellidos = '" .
                $usuario->getApellidos() . "', email = '" . $usuario->getEmail() . "', pais = '" .
                $usuario->getPais() . "',estado='" . $usuario->getEstado() . "',ciudad='" .
                $usuario->getCiudad() . "', calle = '" . $usuario->getCalle() . "', puerta = " .
                $usuario->getPuerta() . ",piso = " . $usuario->getPiso() . ", letra = '" . $usuario->getLetra() . "'";

        //comprobamos si el valor no esta vacio, porque si queremos hacer una edicion del perfil, pero sin cambiar la imagen
        //nos puede mandar el campo vacio, de esta manera no
        if ($updateFoto) {
            $sql .= ",foto = '" . $usuario->getFoto() . "'";
        }

        $sql .= " where id=" . $usuario->getId();
        //ejecutamos la query
        $result = $conn->query($sql) or die(mysqli_error($conn));

        //cerramos la conexion
        $this->desconectar($conn);
    }
}