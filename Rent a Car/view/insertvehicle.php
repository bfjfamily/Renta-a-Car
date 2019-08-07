 <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert vehicle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background:linear-gradient(to top,grey,white) no-repeat fixed center;">

<?php
	session_start();
	
if(!empty($_SESSION['ulogovan'])){

$ulogovan=$_SESSION['ulogovan'];
//var_dump($ulogovan);
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Rent a car</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Pocetna <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="routes.php?page=showinsert">Unos vozila</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="routes.php?page=showinsertdriver">Unos vozaca</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="routes.php?page=showassign">Dodela vozila vozacu</a>
      </li>

      <li class="nav-item">
      <a class="nav-link" href="routes.php?page=showdrivers">Prikaz vozaca</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link" href="routes.php?page=showcars">Prikaz vozila</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <input class="btn btn-outline-warning my-2 my-sm-0" type="submit" name="page" value="Izloguj se">    </form>
  </div>
</nav>
<?php
require_once '../model/DAO.php';
$dao=new DAO();
$allproducers=$dao->getAllProducers();

$allcategories=$dao->getAllCategories();

// kupljenje msg sa kontrolera
$msg=isset($msg)?$msg:"";

//kupljenje niza gresaka ukoliko dodje do jedne ili vise gresaka na formi
$errors=isset($errors)?$errors:array();

//var_dump($errors);
?>
<div class="container text-center col-3">
    <h1>Unos vozila</h1>

<form action="routes.php">
<p>Odaberite proizvodjaca</p>
<select name="imepro" class="form-control">
<option value=""></option>
<?php
foreach($allproducers as $p){
    echo"<option value='$p[imeproizvodjaca]'>$p[imeproizvodjaca]</option>";
}
?>
</select>
<span style="color:red;">*<?php if (array_key_exists('imeproizvodjaca', $errors)) {
    echo $errors['imeproizvodjaca'];
}?></span>
<br><br>

<input type="text" name="model" class="form-control" placeholder="Unesite model">
<span style="color:red;">*<?php if (array_key_exists('model', $errors)) {
    echo $errors['model'];
}?></span>
<br><br>

<p>Odaberite kategoriju</p>
<select name="kategorija" class="form-control">
<option value=""></option>
<?php
  foreach($allcategories as $p){
      echo "<option value='$p[kategorija]'>$p[kategorija]</option>";
  }
?>

</select>
<span style="color:red;">*<?php if (array_key_exists('kategorija', $errors)) {
    echo $errors['kategorija'];
}?></span>
<br><br>

<input type="number" name="godiste"  class="form-control" placeholder="Unesite godiste">
<span style="color:red;">*<?php if (array_key_exists('godiste', $errors)) {
    echo $errors['godiste'];
}?></span>
<br><br>

<input type="number" name="cena" class="form-control" placeholder="Unesite cenu">
<span style="color:red;">*<?php if (array_key_exists('cena', $errors)) {
    echo $errors['cena'];
}?></span>
<br><br>
<input type="submit" name="page" class="btn btn-primary" value="insert">

</form>
<?php
echo "<span style=color:red;>$msg</span>";

?>

</div>

<footer class="bg-dark fixed-bottom">
<div class="container">
  <p class="text-center text-white">Copyright by PHP DEVELOPERS 2019</p>
</div>
</footer>


<?php
}else{
  header('Location:login.php?msg=Morate se ulogovati da bi pristupili sadrzaju aplikacije');
}
?>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>