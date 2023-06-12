<?php



class Database{
    public $host = 'localhost'; /* SERVIDOR */
    public $user = 'root'; /* USUARIO DE PHPMYADMIN */
    public $pass = '';  /* CONTRASEÑA PHPMYADMIN */
    public $db = 'contactos'; /* NOMBRE DE MI BASE DE DATOS */
    private $conn; /* CONEXION DE MI BD PRIVADA */

    function __construct(){
        $this->conn = $this->connectToDatabase(); /* Asignamos la funcion de conexion */
        return $this -> conn; /* Me activa la conexion */
    }

    function connectToDatabase(){
        $conn= mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if(mysqli_connect_error()){ /* Si hay un error que me lo muestre */
            echo "Tenemos un error de conexion " . mysqli_connect_error();
        }
        return $conn; /* Me activa la conexion */
    }
}



