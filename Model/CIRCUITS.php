<?php
require_once 'PDO.php';//Inclusion de la connexion a la base de données
class Circuits extends AbstractPDO
{
    public function GetCircuitById($id)
    {
        $id = $this->pdo->quote($id);
        $sql = "SELECT Nom FROM Circuits WHERE ID={$id}";
        $exe = $this->pdo->query($sql);
        return $result = $exe->fetch(PDO::FETCH_OBJ);
    }
    public function GetAllCircuits()
    {
        $table = [];
        $sql="SELECT * FROM Circuits";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
}