<?php
namespace models;

use PDO;
use models\base\SQL;
use utils\SessionHelpers;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('todos', 'id');
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }

    function ajouterTodo($text){
        $login = SessionHelpers::getConnected()["LOGIN"];
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte, login) VALUES (?, ?)");
        $stmt->execute([$text, $login]);
    }

    function supprimerTodo($text){
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ? AND termine =1");
        $stmt->execute([$text]);
    }

    public function getTodoPerso()
    {
        $login = SessionHelpers::getConnected()["LOGIN"];
        $stmt = $this->pdo->prepare("SELECT * FROM todos WHERE login = ?;");
        $stmt->execute([$login]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}
