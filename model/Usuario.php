<?php

class Usuario
{
    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $password;
    private $pais;
    private $estado;
    private $ciudad;
    private $calle;
    private $puerta;
    private $piso;
    private $letra;
    private $foto;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPais()
    {
        return $this->pais;
    }

    public function setPais($pais)
    {
        $this->pais = $pais;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getCiudad()
    {
        return $this->ciudad;
    }

    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    public function getCalle()
    {
        return $this->calle;
    }

    public function setCalle($calle)
    {
        $this->calle = $calle;
    }

    public function getPuerta()
    {
        return $this->puerta;
    }

    public function setPuerta($puerta)
    {
        $this->puerta = $puerta;
    }

    public function getPiso()
    {
        return $this->piso;
    }

    public function setPiso($piso)
    {
        $this->piso = $piso;
    }

    public function getLetra()
    {
        return $this->letra;
    }

    public function setLetra($letra)
    {
        $this->letra = $letra;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public static function dbToObject($database)
    {

        $data=new Usuario();
        $data->setId($database->id);
        $data->setNombre($database->nombre);
        $data->setApellidos($database->apellidos);
        $data->setEmail($database->email);
        $data->setPassword($database->password);
        $data->setPais($database->pais);
        $data->setEstado($database->estado);
        $data->setCiudad($database->ciudad);
        $data->setCalle($database->calle);
        $data->setPuerta($database->puerta);
        $data->setPiso($database->piso);
        $data->setLetra($database->letra);
        $data->setFoto($database->foto);

        return $data;
    }
}

