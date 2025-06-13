<?php
require_once 'config/database.php';

class UserModel {
    private $pdo;

    public function __construct() {
        global $pdo;
        $this->pdo = $pdo;
    }

    public function findByUsername($username) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }

    public function findByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function createUser($username, $email, $passwordHash) {
        $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        return $stmt->execute([
            'username' => $username,
            'email' => $email,
            'password' => $passwordHash
        ]);
    }
}
?>
