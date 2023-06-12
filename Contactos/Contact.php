<?php
include('../config/config.php');
include('../config/Database.php');

class Contact {
    public $conn;

    function __construct() {
        $db = new Database();
        $this->conn = $db->connectToDatabase();
    }

    function save($params) {
        // Obtener los valores de los parámetros
        $Nombres = $params['Nombres'];
        $Apellidos = $params['Apellidos'];
        $Email = $params['Email'];
        $Celular = $params['Celular'];
        $Pais = $params['Pais'];
        $Reunion = $params['Reunion'];
        $Image = $params['Image'];
        $Asunto = $params['Asunto'];

        // Preparar la consulta SQL con parámetros preparados para evitar inyección de SQL
        $insert = "INSERT INTO contacto (Nombres, Apellidos, Email, Celular, Pais, Reunion, Image, Asunto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($this->conn, $insert);
        mysqli_stmt_bind_param($stmt, 'ssssssss', $Nombres, $Apellidos, $Email, $Celular, $Pais, $Reunion, $Image, $Asunto);

        // Ejecutar la consulta preparada
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    function getAll() {
        $sql = "SELECT * FROM contacto ORDER BY id ASC";
        return mysqli_query($this->conn, $sql);
    }

    function getOne($id) {
        $sql = "SELECT * FROM contacto WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    function update($params) {
        // Obtener los valores de los parámetros
        $Nombres = $params['Nombres'];
        $Apellidos = $params['Apellidos'];
        $Email = $params['Email'];
        $Celular = $params['Celular'];
        $Pais = $params['Pais'];
        $Reunion = $params['Reunion'];
        $Image = $params['Image'];
        $Asunto = $params['Asunto'];
        $id = $params['id'];

        // Preparar la consulta SQL con parámetros preparados para evitar inyección de SQL
        $update = "UPDATE contacto SET Nombres=?, Apellidos=?, Email=?, Celular=?, Pais=?, Reunion=?, Image=?, Asunto=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $update);
        mysqli_stmt_bind_param($stmt, 'ssssssssi', $Nombres, $Apellidos, $Email, $Celular, $Pais, $Reunion, $Image, $Asunto, $id);

        // Ejecutar la consulta preparada
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }

    function remove($id) {
        $delete = "DELETE FROM contacto WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $delete);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $result;
    }
    function saveImage($file) {
        $targetDir = '../images/';
        $fileName = basename($file['Image']['name']);
        $targetPath = $targetDir . $fileName;
        
        if (move_uploaded_file($file['Image']['tmp_name'], $targetPath)) {
            return $fileName;
        } else {
            return null;
        }
    }
    
}
