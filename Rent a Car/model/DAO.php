<?php
require_once '../config/db.php';

class DAO {

 private $db;

private $GETALLPRODUCERS="SELECT * FROM proizvodjaci ORDER BY imeproizvodjaca ASC";
private $GETALLCATEGORIES="SELECT * FROM kategorije";

private $INSERTVEHICLE="INSERT INTO vozila(imeproizvodjaca,model,kategorija,godiste,cena) VALUES (?,?,?,?,?)";

private $GETALLCARS="SELECT * FROM vozila";
private $GETALLDRIVERS="SELECT * FROM vozaci";

private $INSERTDRIVER="INSERT INTO vozaci(ime, prezime, godiste) VALUES (?,?,?)";

private $ASSIGN="INSERT INTO vozilavozaci(idvozila, idvozaca) VALUES (?,?)";

private $DELETEDRIVER="DELETE FROM vozaci WHERE idvozaca = ?";


private $DELETECAR="DELETE FROM vozila WHERE idvozila = ?";

private $GETDRIVERBYID="SELECT * FROM vozaci WHERE idvozaca = ?";

private $UPDATEDRIVER="UPDATE vozaci SET ime=?, prezime=?, godiste=? WHERE idvozaca=?";


private $LOGIN ="SELECT * FROM korisnici WHERE username=? AND password=?";

public function __construct(){
    $this->db=DB::createInstance();
}

public function getAllProducers(){
$statement = $this->db->prepare($this->GETALLPRODUCERS);
$statement->execute();
$result=$statement->fetchAll();
return $result;
}

public function getAllCategories(){
    $statement = $this->db->prepare($this->GETALLCATEGORIES);
    $statement->execute();
    $result=$statement->fetchAll();
    return $result;
    }
    

    public function insertVehicle($imepro,$model,$kategorija,$godiste,$cena){
        $statement = $this->db->prepare($this->INSERTVEHICLE);

        $statement->bindValue(1,$imepro);
        $statement->bindValue(2,$model);
        $statement->bindValue(3,$kategorija);
        $statement->bindValue(4,$godiste);
        $statement->bindValue(5,$cena);

        $statement->execute();
     
        }

    public function getAllCars(){
        $statement = $this->db->prepare($this->GETALLCARS);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    public function getAllDrivers(){
        $statement = $this->db->prepare($this->GETALLDRIVERS);
        $statement->execute();
        $result=$statement->fetchAll();
        return $result;
    }
    public function insertDriver($ime, $prezime, $godiste){
        $statement = $this->db->prepare($this->INSERTDRIVER);
        $statement->bindValue(1,$ime);
        $statement->bindValue(2,$prezime);
        $statement->bindValue(3,$godiste);
        $statement->execute();
    }

    public function insertAssign($idvozila, $idvozaca){
        $statement = $this->db->prepare($this->ASSIGN);
        $statement->bindValue(1,$idvozila);
        $statement->bindValue(2,$idvozaca);
        $statement->execute();
    }

    public function deleteDriver($idvozaca){
        $statement = $this->db->prepare($this->DELETEDRIVER);
        $statement->bindValue(1,$idvozaca);
        $statement->execute();
    }

    public function deleteCar($idvozila){
        $statement = $this->db->prepare($this->DELETECAR);
        $statement->bindValue(1,$idvozila);
        $statement->execute();
    }

    public function getDriverById($idvozaca){
        $statement = $this->db->prepare($this->GETDRIVERBYID);
        $statement->bindValue(1,$idvozaca);

        $statement->execute();
        $result=$statement->fetch();
        return $result;
    }


    public function updateDriver($ime, $prezime, $godiste, $idvozaca){
        $statement = $this->db->prepare($this->UPDATEDRIVER);
        $statement->bindValue(1,$ime);
        $statement->bindValue(2,$prezime);
        $statement->bindValue(3,$godiste);
        $statement->bindValue(4,$idvozaca);
        $statement->execute();
    }



    public function login($username, $password){
        $statement = $this->db->prepare($this->LOGIN);
        $statement->bindValue(1,$username);
        $statement->bindValue(2,$password);
        $statement->execute();

        $result=$statement->fetch();
        return $result;
    }
}




?>