<?php

namespace Models\Authorization;
use Database\Database;
use PDO;

class Authorization extends Database{
    public function confirmUserCredentials(string $email, string $password) {
        $query = "SELECT * FROM users WHERE user_email = :email AND user_password = :password";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}