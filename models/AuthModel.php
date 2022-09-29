<?php
namespace models;

use models\base\SQL;

class AuthModel extends SQL
{
    public function __construct()
    {
        parent::__construct('users', 'login');
    }

    public function login(string $login, string $password): mixed
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE login = ? LIMIT 1');
        $stmt->execute([$login]);
        $equipe = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (password_verify($password, $equipe['PASSWORD'])) {
            return $equipe;
        } else {
            return null;
        }
    }

    public function inscription(string $login, string $password)
    {
        $mdp = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $this->pdo->prepare("INSERT INTO users (LOGIN, PASSWORD) VALUES (?, ?)");
        $stmt->execute([$login, $mdp]);
    }
}