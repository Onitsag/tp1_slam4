<?php
namespace models;

use models\base\SQL;

class TodoModel extends SQL
{
    public function __construct()
    {
        parent::__construct('votre-table', 'cle-de-votre-table');
    }

    function marquerCommeTermine($id){
        $stmt = $this->pdo->prepare("UPDATE todos SET termine = 1 WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}
