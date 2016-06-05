<?php
class Database
{
    private $host = "localhost";
    private $db_name = "biblioteca";
    private $db_user = "root";
    private $db_pass = "";
    private $db;
    
    public function __construct()
    {
        try {
        $this->db = new PDO("mysql:host={$this->host};dbname={$this->db_name}",$this->db_user,$this->db_pass);

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function inserare_carte($ISBN ,$nume_carte, $autor, $data_publicare, $numar_pagini, $perioada_returnare, $cantitate, $categorie, $raft) 
    {
        
        $stmt = $this->db->prepare("INSERT INTO `carti` (`ID`, `ISBN`, `nume_carte`, `autor_carte`, `data_publicare`, `numar_pagini`, `perioada_returnare`, `cantitate`, `categorie`, `raft`) 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bindParam(1, $ISBN);
        $stmt->bindParam(2, $nume_carte);
        $stmt->bindParam(3, $autor);
        $stmt->bindParam(4, $data_publicare);
        $stmt->bindParam(5, $numar_pagini);
        $stmt->bindParam(6, $perioada_returnare);
        $stmt->bindParam(7, $cantitate);
        $stmt->bindParam(8, $categorie);
        $stmt->bindParam(9, $raft);
        
        $stmt->execute();
        
        //$this->db->exec("INSERT INTO `carti` (`ID`, `ISBN`, `nume_carte`, `autor_carte`, `data_publicare`, `numar_pagini`, `perioada_returnare`, `cantitate`, `categorie`, `raft`) VALUES (NULL, '3435', 'asdfd', 'dgfsdfgs', '2016-03-24', '345', '345', '234', 'dsfg', 'asdfdg')");
        return true;
     
    }
    public function inserare_cititor($nume, $prenume, $cnp, $adresa, $numar_telefon, $email, $informatie_carte) 
    {
        
        $stmt = $this->db->prepare("INSERT INTO `cititori` 
        VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)");
        
       $stmt->bindParam(1, $nume);
        $stmt->bindParam(2, $prenume);
        $stmt->bindParam(3, $cnp);
        $stmt->bindParam(4, $adresa);
        $stmt->bindParam(5, $numar_telefon);
        $stmt->bindParam(6, $email);
        $stmt->bindParam(7, $informatie_carte);
        
        $stmt->execute();
        
        //$this->db->exec("INSERT INTO `carti` (`ID`, `ISBN`, `nume_carte`, `autor_carte`, `data_publicare`, `numar_pagini`, `perioada_returnare`, `cantitate`, `categorie`, `raft`) VALUES (NULL, '3435', 'asdfd', 'dgfsdfgs', '2016-03-24', '345', '345', '234', 'dsfg', 'asdfdg')");
        return true;
     
    }    
    public function modificare_carte($id, $nume, $prenume, $cnp, $adresa, $numar_telefon, $email, $informatie_carte) 
    {
        $stmt = $this->db->prepare("UPDATE `cititori` SET nume=?, prenume=?, cnp=?, 
            adresa=?, numar_telefon=?, informatie_carte=? WHERE id=?");
        
       $stmt->bindParam(1, $nume);
        $stmt->bindParam(2, $prenume);
        $stmt->bindParam(3, $cnp);
        $stmt->bindParam(4, $adresa);
        $stmt->bindParam(5, $numar_telefon);
        $stmt->bindParam(6, $email);
        $stmt->bindParam(7, $informatie_carte);
        $stmt->bindParam(8, $id);
        $stmt->execute();
        return true;
    }
    public function modificare_cititor($id, $ISBN ,$nume_carte, $autor, $data_publicare, $numar_pagini, $perioada_returnare, $cantitate, $categorie, $raft)
    {
        $stmt = $this->db->prepare("UPDATE `carti` SET ISBN=?, nume_carte=?, autor_carte=?, 
            data_publicare=?, numar_pagini=?, perioada_returnare=?,cantitate=?, categorie=?, raft=? WHERE id=?");
        
       $stmt->bindParam(1, $ISBN);
        $stmt->bindParam(2, $nume_carte);
        $stmt->bindParam(3, $autor);
        $stmt->bindParam(4, $data_publicare);
        $stmt->bindParam(5, $numar_pagini);
        $stmt->bindParam(6, $perioada_returnare);
        $stmt->bindParam(7, $cantitate);
        $stmt->bindParam(8, $categorie);
        $stmt->bindParam(9, $raft);
        $stmt->bindParam(10, $id);
        $stmt->execute();
        return true;
    }   
    public function get_carti()
    {
        $stmt = $this->db->prepare("SELECT * FROM carti ORDER BY nume_carte");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_cititori()
    {
        $stmt = $this->db->prepare("SELECT * FROM cititori ORDER BY nume");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_carte($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM carti WHERE id=?");
        $stmt->bindParam(1,$id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function sterge_carte($id)
    {
         $stmt = $this->db->prepare("DELETE FROM carti WHERE ID=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }
    public function sterge_cititor($id)
    {
         $stmt = $this->db->prepare("DELETE FROM cititori WHERE ID=:id");
        $stmt->bindparam(":id",$id);
        $stmt->execute();
        return true;
    }
}
