<?php
require_once 'PDO.php';//Inclusion de la connexion a la base de données
class Marques extends AbstractPDO
{
    public function GetMarqueById($id)
    {
        $id = $this->pdo->quote($id);
        $sql = "SELECT Nom FROM Marques WHERE ID={$id}";
        $exe = $this->pdo->query($sql);
        return $result = $exe->fetch(PDO::FETCH_OBJ);
    }
    public function GetAllMarques()
    {
        $table = [];
        $sql="SELECT * FROM Marques";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
}