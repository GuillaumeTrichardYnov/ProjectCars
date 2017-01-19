<?php
require_once 'PDO.php';//Inclusion de la connexion a la base de données
class Voitures extends AbstractPDO
{
    public function GetVoitureById($id)
    {
        $id = $this->pdo->quote($id);
        $sql = "SELECT Nom FROM Voitures WHERE ID={$id}";
        $exe = $this->pdo->query($sql);
        return $result = $exe->fetch(PDO::FETCH_OBJ);
    }
    public function GetAllVoitures()
    {
        $table = [];
        $sql="SELECT * FROM Voitures";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
    public function GetVoituresByMarque($id)
    {
        $table = [];
        $idMarque = $this->pdo->quote($idMarque);
        $sql="SELECT * FROM Voitures WHERE FKMarque={$id}";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
    
}