<?php

// RUTIRANJE

//FAJL SA RUTAMA MORA BITI POVEZAN SA KONTROLEROM

//U OVOM FAJLU PROVERAVAMO RUTE  I SVAKU RUTU PROSLEDJUJEMO
//NA ODREDJENU METODU U KONTROLERU

require_once '../controllers/Controller.php';
$controller=new Controller();

$page=isset($_GET['page'])?$_GET['page']:"";

switch($page){

  case "showinsert":
  $controller->showInsert();
  break;

  case 'insert':
  $controller->insertVehicle();
  break;

  case 'showassign':
  $controller->showAssign();
  break;


  case 'Dodeli':
  $controller->insertAssign();
  break;

  case 'showinsertdriver':
  $controller->showInsertDriver();
  break;

  case 'Insert driver':
  $controller->insertDriver();
  break;

  case 'showdrivers':
  $controller->showDrivers();
  break;

  case 'showcars':
  $controller->showCars();
  break;

  case 'deletedriver':
  $controller->deleteDriver();
  break;

  case 'deletecar':
  $controller->deleteCar();
  break;

  case 'showeditdriver':
  $controller->showEditDriver();
  break;

  case 'Izmeni vozaca':
  $controller->editDriver();
  break;

  case 'Izloguj se':
  $controller->logout();
  break;
}

if($_SERVER['REQUEST_METHOD']=='POST'){

  $page=isset($_POST['page'])?$_POST['page']:"";

switch($page){
  
  case 'Ulogujte se':
  $controller->login();
  break;

}



}


?>