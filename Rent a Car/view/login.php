<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background:linear-gradient(to top,grey,white) no-repeat fixed center;">

<div class="container text-center col-4 mt-5 p-5">

<form action="routes.php" method="post">

<input type="text" class="form-control" name="username" placeholder="Unesite username"><br>

<input type="password" class="form-control" name="password" placeholder="Unesite password"><br>

<input type="submit" class="btn btn-primary" name="page" value="Ulogujte se">

</form>
</div>
   
<?php
/* posto msg sa index strane na ovu stranu saljemo preko header location
taj podatak ce ici GET metodom pa je ovde potrebno da ga pokupimo iz GET-a
*/
if(!empty($_GET['msg'])){
 // $msg=$_GET['msg'];
?>
<div class="container text-center col-4">
<div class="alert alert-danger" role="alert">
  <?php echo $_GET['msg'];?>
</div>
</div>
<?php } ?>



<footer class="bg-dark fixed-bottom">
<div class="container">
  <p class="text-center text-white">Copyright by PHP DEVELOPERS 2019</p>
</div>
</footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>