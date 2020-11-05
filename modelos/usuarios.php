<?php
class usuario
{

    // Creamos un constructor donde iniciaremos nuestra conexión con la base de datos.
    private $db;
    public function __construct()
    {
        $this->db = new mysqli("localhost", "pablodelacuesta", "P*blo99@", "incidencias");
    }

    // Devuelve un usuario a partir de la id. Si no existe, devuelve null.
    public function get($id)
    {
        if ($result = $this->db->query("SELECT * FROM usuario
                                            WHERE idUsuario = '$id'")) {
            $result = $result->fetch_object();
        } else {
            $result = null;
        }
        return $result;
    }


    // Devuelve toda la lista de usuario. Si da algún error, devuelve null.
    public function getAll()
    {
        $arrayResult = array();
        if ($result = $this->db->query("SELECT * FROM usuario
					                        ORDER BY apellidos")) {
            while ($fila = $result->fetch_object()) {
                $arrayResult[] = $fila;
            }
        } else {
            $arrayResult = null;
        }
        return $arrayResult;
    }

    //Inserta en la base de datos los datos del registro.

    public function insert($nombre, $apellidos, $email, $usuario, $contrasenia)
    {
        $this->db->query("INSERT INTO usuario (nombre, apellidos, email, usuario, contrasenia) 
                        VALUES ('$nombre', '$apellidos', '$email', '$usuario', '$contrasenia')");
        return $this->db->affected_rows;
    }

    //Modifica los datos si alguna vez fuera necesario a partir de una id.

    public function update($nombre, $apellidos, $email, $usuario, $contrasenia)
    {
        $this->db->query("UPDATE usuario SET
								nombre = '$nombre',
								apellidos = '$apellidos',
								email = '$email',
								usuario = '$usuario',
								contrasenia = '$contrasenia'
                                WHERE idUsuario = '$idUsuario'");
        return $this->db->affected_rows;
    }
    
    //Elimina datos de un usuario a partir de su id.

    public function delete($idUsuario)
    {
        $this->db->query("DELETE FROM usuario WHERE idUsuario = '$idUsuario'");
        return $this->db->affected_rows;
    }

    //Buscamos un usuario a partir de su id y su nombre. Si lo encuentra, devolvemos true. Si no lo encuentra, devolvemos un false.

    public function buscarUsuario($usuario,$contrasenia) {

        if ($result = $this->db->query("SELECT idUsuario, usuario, rol FROM usuario WHERE usuario = '$usuario' AND contrasenia = '$contrasenia'")) {
            if ($result->num_rows == 1) {
                $usuario = $result->fetch_object();
                // Iniciamos la sesión
                $_SESSION["idUsuario"] = $usuario->idUsuario;
                $_SESSION["nombreUsuario"] = $usuario->usuario;
                $_SESSION["rol"] = $usuario->rol;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }

    }


}
