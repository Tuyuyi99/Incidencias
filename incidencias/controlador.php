<?php

//Incluimos todas las vistas que haya y modelos.

include_once("vista.php");
include_once("modelos/usuarios.php");
include_once("modelos/incidencias.php");

// Creamos los objetos vista y modelos


class Controlador
{

    private $vista, $usuarios; //$incidencia;
    
    //Colocamos un constructor con los diferentes modelos antes inicializados.

	public function __construct(){
	
		$this->vista = new Vista();
		$this->usuarios = new Usuario();
		//$this->incidencia = new Incidencia();
    }
    
    //Muestra el formulario de login

	public function showFormularioLogin(){
	
		$this->vista->show("usuarios/formularioLogin");
	}

	public function procesarLogin(){
	
		$usuario = $_REQUEST["usuario"];
		$contrasenia = $_REQUEST["contrasenia"];

		$result = $this->usuarios->buscarUsuario($usuario, $contrasenia);

		if ($result) { //Si es correcto, lo redireccionamos a index.php.
			echo "<script>location.href = 'index.php'</script>";
		} else {
			// Error al iniciar la sesión
			$data['msjError'] = "Nombre de usuario o contraseña incorrectos";
			$this->vista->show("usuarios/mostrarLogin", $data);
		}
	}
	
	public function mostrarRegistro(){
	
	$this->vista->show("usuarios/mostrarRegistro");
	}
    
    public function procesarRegistro(){
	
        $nombre = $_REQUEST["nombre"];
        $apellidos = $_REQUEST["apellidos"];
        $email = $_REQUEST["email"];
		$usuario = $_REQUEST["usuario"];
		$contrasenia = $_REQUEST["contrasenia"];

		$result = $this->usuarios->insert($nombre, $apellidos, $email, $usuario, $contrasenia);

		if ($result) { //Si es correcto, lo redireccionamos a mostrarLogin.php.
            $data['msjInfo'] = "¡Enhorabuena, ya te has registrado!";
			$this->vista->show("usuarios/mostrarLogin", $data);
		} else {
			// Error al registrarse
			$data['msjError'] = "Parece que ha ocurrido un error. Inténtalo de nuevo más tarde.";
			$this->vista->show("usuarios/mostrarRegistro", $data);
		}
	}
}
