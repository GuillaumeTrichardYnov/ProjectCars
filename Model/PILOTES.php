<?php
require_once 'PDO.php';//Inclusion de la connexion a la base de données
class Pilotes extends AbstractPDO
{
    public function GetPiloteById($id)
    {
        $id = $this->pdo->quote($id);
        $sql = "SELECT * FROM Pilotes WHERE ID={$id}";
        $exe = $this->pdo->query($sql);
        return $result = $exe->fetch(PDO::FETCH_OBJ);
    }
    public function GetAllPilotes()
    {
        $table = [];
        $sql="SELECT * FROM Pilotes";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
}