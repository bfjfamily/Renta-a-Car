<?php
require_once '../model/DAO.php';

class Controller{

public function showInsert(){
include 'insertvehicle.php';
}

public function insertVehicle(){

    $imeproizvodjaca=isset($_GET['imepro'])?$_GET['imepro']:"";
    $model=isset($_GET['model'])?$_GET['model']:"";
    $kategorija=isset($_GET['kategorija'])?$_GET['kategorija']:"";
    $godiste=isset($_GET['godiste'])?$_GET['godiste']:"";
    $cena=isset($_GET['cena'])?$_GET['cena']:"";

    //posto gresaka moze biti vise sve cemo ih prosledjivati preko niza na insertvozilo.php
    $errors=array();

    if(empty($imeproizvodjaca)){
        $errors['imeproizvodjaca']="Morati odabrati proizvodjaca.";
    }

    if(empty($model)){
        $errors['model']="Morati popuniti model vozila.";
    }
    
    if(empty($kategorija)){
        $errors['kategorija']="Morati odabrati kategoriju vozila.";
    }

    if(empty($godiste)){
        $errors['godiste']="Morati uneti godiste vozila.";
    }else{
         if(is_numeric($godiste)){
             if($godiste<1950 || $godiste>2019){
                $errors['godiste']="Ne postoji to godiste auta.";
             }

         }else{
            $errors['godiste']="Godiste mora biti numericka vrednost.";
         }
        
    }

    if(empty($cena)){
        $errors['cena']="Morati uneti cenu vozila.";
    }else{
         if(is_numeric($cena)){
             if($cena<=0){
                $errors['cena']="Cena mora biti pozitivan broj.";
             }

         }else{
            $errors['cena']="Cena mora biti numericka vrednost.";
         }
        
    }

  if(count($errors)==0){
  
    $dao = new DAO();
//smestanje u bazu podataka ako je sve ok
    $dao->insertVehicle($imeproizvodjaca,$model,$kategorija,$godiste,$cena);

    $msg="Uspesan unos";
    include 'insertvehicle.php';

  }else{
    
     // var_dump($errors);
      $msg="Molimo Vas popunite formular ispravno.";
      include 'insertvehicle.php';
  } 

}


public function showAssign(){
    include 'assign.php';
}

public function insertAssign(){

    $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";
    $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";

    $errors=array();

    if(empty($idvozila)){
        $errors['idvozila']="Morate izabrati vozilo.";
    }

    if(empty($idvozaca)){
        $errors['idvozaca']="Morate odabrati vozaca.";
    }

    if(count($errors)==0){

    $dao = new DAO();

    $dao->insertAssign($idvozila,$idvozaca);

    $msg="Uspesna dodela.";
    include 'assign.php';

    }else{

        include 'assign.php';
    }
    //var_dump( $idvozila);
    //var_dump( $idvozaca);
    //var_dump("Podaci stigli na controller");

}

public function showInsertDriver(){
    include 'insertdriver.php';
}

public function insertDriver(){

    $ime=isset($_GET['ime'])?$_GET['ime']:"";
    $prezime=isset($_GET['prezime'])?$_GET['prezime']:"";
    $godiste=isset($_GET['godiste'])?$_GET['godiste']:"";

    $errors=array();

    if(empty($ime)){
        $errors['ime']="Morate uneti ime";
    }

    if(empty($prezime)){
        $errors['prezime']="Morate uneti prezime.";
    }

    if(empty($godiste)){
        $errors['godiste']="Morate uneti godiste.";
    }else{
        if(is_numeric($godiste)){
            if($godiste<1950 || $godiste>2000){
                $errors['godiste']="Morate uneti validno godiste.";
            }

        }else{
            $errors['godiste']="Godiste mora biti numericka vrednost";
        }

    }

    
    if(count($errors)==0){

        $dao = new DAO();

        $dao->insertDriver($ime,$prezime,$godiste);

        $msg="Uspesan unos.";
        include 'insertdriver.php';
        
    }else{

        $msg="Morate ispravno popuniti formular.";
        include 'insertdriver.php';
    
    }

}

public function showDrivers(){
    $dao=new DAO();
    $alldrivers=$dao->getAllDrivers();
    include 'alldrivers.php';
    
    }

 public function showCars(){
        $dao=new DAO();
        $allcars=$dao->getAllCars();
        include 'allcars.php';
        
}

public function deleteDriver(){

    $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";

    if(!empty($idvozaca)){

        $dao=new DAO();

        $dao->deleteDriver($idvozaca);

        //ponovno izvlacenje svih vozaca iz baze nakon brisanja 
        $alldrivers=$dao->getAllDrivers();

        $msg="Podatak obrisan";
        include 'alldrivers.php';

    }

}
    
public function deleteCar(){

    $idvozila=isset($_GET['idvozila'])?$_GET['idvozila']:"";

    if(!empty($idvozila)){

        $dao=new DAO();

        $dao->deleteCar($idvozila);

        //ponovno izvlacenje svih vozaca iz baze nakon brisanja 
        $allcars=$dao->getAllCars();

        $msg="Podatak obrisan";
        include 'allcars.php';

    }

}

public function showEditDriver(){

   $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";

   if(!empty($idvozaca)){
    $dao = new DAO();
    $driver=$dao->getDriverById($idvozaca);
    include 'editdriver.php';
   }

}

public function editDriver(){
    $ime=isset($_GET['ime'])?$_GET['ime']:"";
    $prezime=isset($_GET['prezime'])?$_GET['prezime']:"";
    $godiste=isset($_GET['godiste'])?$_GET['godiste']:"";

    $idvozaca=isset($_GET['idvozaca'])?$_GET['idvozaca']:"";

     //var_dump($idvozaca);
     
    $errors=array();

    if(empty($ime)){
        $errors['ime']="Morate uneti ime";
    }

    if(empty($prezime)){
        $errors['prezime']="Morate uneti prezime.";
    }

    if(empty($godiste)){
        $errors['godiste']="Morate uneti godiste.";
    }else{
        if(is_numeric($godiste)){
            if($godiste<1950 || $godiste>2000){
                $errors['godiste']="Morate uneti validno godiste.";
            }

        }else{
            $errors['godiste']="Godiste mora biti numericka vrednost";
        }

    }

    if(count($errors)==0){

        $dao = new DAO();
        $dao->updateDriver($ime,$prezime,$godiste,$idvozaca);
       // ponovno izvlacenje  podataka iz baze
        $alldrivers=$dao->getAllDrivers();
        $driver=$dao->getDriverById($idvozaca);

        $msg="Uspesna izmena.";
        include 'alldrivers.php';
        
    }else{
        $dao = new DAO();
        $driver=$dao->getDriverById($idvozaca);
        $msg="Morate ispravno popuniti formular.";
        include 'editdriver.php';
    
    }

}

public function login(){

    $username=isset($_POST['username'])?$_POST['username']:"";
    $password=isset($_POST['password'])?$_POST['password']:"";

if(!empty($username)&&!empty($password)){

    $dao = new DAO();

    $korisnik=$dao->login($username,$password);
  
    if($korisnik){
   //uvek kada koristimo sesiju prvo je potrebno da je startujemo
   session_start();

   $_SESSION['ulogovan']=$korisnik;
   include 'index.php';

    }else{
        $msg="Pogresan username ili password";
        include 'login.php';
    }


}else{
    $msg="Morate popuniti username i password";
    include 'login.php';
}
}

public function logout(){
session_start();
session_destroy();
header('Location:login.php');

}



}


?>