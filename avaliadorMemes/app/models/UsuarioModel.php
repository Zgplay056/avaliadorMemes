<?php

class UsuarioModel {

    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function loginModel($email, $senha) {
        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
}