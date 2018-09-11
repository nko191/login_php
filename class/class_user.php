<?php
class usuario{

    public $user;
    public $password;
    public $repassword;
    public $email;
    public $fullname;
    public $post_password;
    public $query;
    public $mysql_password;
    public $error;
    public $ok;
    public $numrows;
    public $fields;
    public $error2;
    public $error3;
    public $error4;
    public $regquery;

    public function __construct($username, $password){
        include "../config.php";
        $this->user                 =    $username;
        $this->post_password    =    $password;
        $this->query             =    mysql_query("SELECT * FROM users WHERE username = '".$this->user."'");
        $this->mysql_password    =    mysql_fetch_array($this->query);
        $this->numrows            =    mysql_num_rows($this->query);
        $this->error            =    "Nombre de usuario o contraseña incorrectos.";
        $this->ok                =    "Bienvenido ".$this->user.". Te has logueado correctamente.";
        $this->fields            =    "Por favor, rellena todos los campos.";


       

    }

    public function registrar($username, $password, $repeatpassword,  $email, $fullname){
    include "../config.php";
        $this->user         =    $username;
        $this->password        =    $password;
        $this->repassword    =    $repeatpassword;
        $this->email        =    $email;
        $this->fullname        =    $fullname;
        $this->query        =    mysql_query("SELECT * FROM users WHERE username = '".$this->user."'");
        $this->numrows        =    mysql_num_rows($this->query);
        $this->error        =    "Nombre de usuario en uso.";
        $this->error2        =    "Las contraseñas no coinciden";
        $this->error3        =    "Nombre completo y/o nombre de usuarios superan los 25 caracteres.";
        $this->error4        =    "La contraseña debe tener un minimo de 6 caracteres y un maximo de 25";
        $this->ok            =    "Te has registrado correctamente";
        $this->fields        =    "Por favor, rellena todos los campos.";
    }

    public function checkreg(){
        if($this->numrows!=0)
        {
            die ($this->error);
        }
        if($this->user&&$this->password&&$this->email&&$this->fullname)
        {
            if($this->password == $this->repassword)
            {
                if(strlen($this->username)>25||strlen($this->fullname)>25)
                {
                    echo $this->error3;
                }
                else
                {
                    if(strlen($this->password)>25||strlen($this->password)<6)
                    {
                        echo $this->error4;
                    }
                    else
                    {
                        $this->password = md5($this->password);
                        $register = mysql_query("INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `admin`) VALUES (NULL, '".$this->fullname."', '".$this->user."', '".$this->password."', '".$this->email."', '0')");
                        echo $this->ok;
                    }
                }
            }
            else
            {
                echo $this->error2;
            }            
        }
        else
        {
            echo $this->fields;
        }
    }

    public function checklog(){
        if($this->user && $this->post_password)
        {
            if($this->numrows !=0)
            {
                if($this->mysql_password['password'] == md5($this->post_password))
                {
                    session_start();
                    $_SESSION['username'] = $this->user;
                    echo $this->ok;
                }
                else
                {
                    echo $this->error;
                }
            }
            else
            {
                echo $this->error;
            }
        }
        else
        {
            echo $this->fields;
        }
    }
}

 

?>