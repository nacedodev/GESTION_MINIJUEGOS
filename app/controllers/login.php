<?php
require_once getcwd().'/app/models/login.php';
class ControladorLogin {
    private $objLogin;
    public $view;

    public $mensaje;

    public function __construct() {
        $this->objLogin = new Login();
    }
    public function mostrarLogin(){

        if($this->objLogin->numUsuarios() == 0){
            $this->view='aregistro';
        } else {
            $this->view='login';
        }
    }
    
    public function verificarCredenciales() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            if ($this->objLogin->verificar($email,$password)) {
                
                if(isset($_SESSION['perfil']))
                    $this->redireccionar();
                
            } else {
                $this->mensaje = 'Credenciales inválidas';
            }
            
            if(isset($this->mensaje)) {
                header("Location: index.php?controller=login&action=mostrarLogin&mensaje=$this->mensaje");
                exit;
            }
        }
        else {
            $this->view='login'; 
        }
    }

    public function redireccionar() {
        if(isset($_GET['vista'])){
            $vista = $_GET['vista'];
            $this->view = $vista;
        } else {
            $perfil = $_SESSION['perfil'];
            switch ($perfil) {
            case 's':
                $vista = 'super'; 
                break;
            case 'c':
                $vista = 'cultural'; 
                break;
            case 'k':
                $vista = 'citykids'; 
                break;
            case 'p':
                $vista = 'citykids'; 
                break;
            default:
                $vista = 'login'; // Vista predeterminada si el perfil no coincide con ninguno de los casos anteriores
                break;
        }
    
        $this->view = $vista;
        }
    }
    

    public function registroInstalacion() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $nombre = $_POST['nombre'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $perfil = 's';
            
            if ($this->objLogin->registro($email,$password,$nombre,$perfil)) {
               $this->view = 'super'; 
            }
            else {
                $this->mensaje = 'Error al registrar';
                header("Location: index.php?controller=login&action=mostrarLogin&mensaje=$this->mensaje");
                exit;
            }
                
        }
        else {
            $this->view='aregistro'; 
        } 
    }

    public function registrarAdmMinijuego() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST['email'];
            $nombre = $_POST['nombre'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $perfil = $_POST['minijuego'];
            
            if ($this->objLogin->registro($email,$password,$nombre,$perfil)) {
                $this->mensaje = 'Registro realizado con exito.';
                header("Location: index.php?controller=login&action=registrarAdmMinijuego&mensaje=$this->mensaje");
                exit;
            }
            else {
                $this->mensaje = 'Error al registrar';
                header("Location: index.php?controller=login&action=registrarAdmMinijuego&mensaje=$this->mensaje");
                exit;
            }
                
        } else {
            $this->view = 'mregistro';
            return $this->obtenerMinijuegos();
        }
    }

    public function cerrarSesion(){
        session_destroy();
        $this->view = 'login';
    }

    public function obtenerMinijuegos() {
        return $this->objLogin->obtenerMinijuegos();
    }

}