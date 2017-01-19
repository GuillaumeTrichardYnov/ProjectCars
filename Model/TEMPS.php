<?php
require_once 'PDO.php';//Inclusion de la connexion a la base de données
class Temps extends AbstractPDO
{
    public function GetAllTemps()
    {
        $table = [];
        $sql="SELECT * FROM Temps";
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
    public function SearchTemps($voiture, $pilote, $circuit)
    {
        $table = [];
        if(!empty($voiture) && !empty($pilote)&& !empty($circuit))
        {
            $sql="SELECT * FROM Temps WHERE FKPilote = {$pilote} AND FKVoiture = {$voiture} AND FKCircuit = {$circuit}";   
        }
        elseif(!empty($voiture) && !empty($pilote)&& empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKPilote = {$pilote} AND FKVoiture = {$voiture}";   
        }
        elseif(!empty($voiture) && empty($pilote)&& !empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKCircuit = {$circuit} AND FKVoiture = {$voiture}";   
        }
        elseif(empty($voiture) && !empty($pilote)&& !empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKCircuit = {$circuit} AND FKPilote = {$pilote}";   
        }
        elseif(!empty($voiture) && empty($pilote)&& empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKVoiture = {$voiture}";   
        }
        elseif(empty($voiture) && empty($pilote)&& empty($circuit)){
            $sql="SELECT * FROM Temps";   
        }
        elseif(empty($voiture) && !empty($pilote)&& empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKPilote = {$pilote}";   
        }
        elseif(empty($voiture) && empty($pilote)&& !empty($circuit)){
            $sql="SELECT * FROM Temps WHERE FKCircuit = {$circuit}";   
        }
        
        $exe = $this->pdo->query($sql);
        while($result = $exe->fetch(PDO::FETCH_OBJ))
        {
            $table[]=$result;
        }
        return $table;
    }
    public function AjoutTemp($temp, $pilote, $circuit, $voiture)//permet d'ajouter un cour en base de données 
    {    
        $sql="SELECT * FROM Temps WHERE FKCircuit = {$circuit} AND FKPilote = {$pilote} AND FKVoiture = {$voiture}";   
        $exe = $this->pdo->query($sql);
        
        if ($exe->rowCount() > 0) {
            $result = $exe->fetch(PDO::FETCH_OBJ);
            $this->pdo->exec("UPDATE Temps SET Temp='$temp' WHERE ID='$result->ID'");
        } else {  
            $this->pdo->exec("INSERT INTO Temps (Temp, FKPilote, FKCircuit, FKVoiture) VALUES ('$temp', '$pilote', '$circuit', '$voiture')");
        }
    }
}
