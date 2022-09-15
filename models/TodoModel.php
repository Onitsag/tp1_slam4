<?php
namespace models;

use models\base\SQL;

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
        $stmt = $this->pdo->prepare("INSERT INTO todos (texte) VALUES (?)");
        $stmt->execute([$text]);
    }

    function supprimerTodo($text){
        $stmt = $this->pdo->prepare("DELETE FROM todos WHERE id = ? AND termine =1");
        $stmt->execute([$text]);
    }
}
