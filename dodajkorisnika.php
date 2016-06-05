<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Postani bordo prijatelj</title>
  <link rel="stylesheet" type="text/css" href="loginStyle.css">
  <link rel="stylesheet" type="text/css" href="korisnik-css.css">
  <SCRIPT src="login.js"></SCRIPT>
  <META http-equiv="Content-Type" content="text/html; charset=utf-8">
  </head>
  <body>
    <?php
    
    print " <h4>Autori</h4>";
    $veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf8");
  if(!isset($_GET['autori'])) {
 $kom = $veza->query("select id, username  from autori ");
     
     if (!$kom) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     }

      foreach ($kom as $komentar) {
        $admini ='administrator' ; 
        $ida =$komentar['id'] ; 
         if (! ($komentar['username']==$admini)){
        
      print "<div class='komentar'> ";
      
 
    
    print "<p>".$komentar['username']."</p>";
    print "</div>";  

    }}
  }


    $msg = '';






    if (isset($_POST['login']) && !empty($_POST['user-name']) 
     && !empty($_POST['password'])) {
      
        $veza = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "wt", "wt");
    $veza->exec("set names utf8");
  if(!isset($_GET['autori'])) {    

     $ime = $_POST['user-name'];
    $pass =sha1($_POST['password']) ;
     $rezultat = $veza->query ("INSERT INTO autori (username,password) VALUES ('$ime', '$pass')"); 
     header('Refresh: 1; URL = dodajkorisnika.php');
     
     if (!$rezultat) {
          $greska = $veza->errorInfo();

          print "SQL greška: " . $greska[2];
          exit();
     } 
   }
    else {
      $msg = 'Pogresni podaci ';
    }}
  ?>
  <br><br><br><br><br><br><br><br><br>
  <h4>Dodaj autora</h4>
  <form action="dodajkorisnika.php" method="post">
    <div class="login-frame">
     <input id="userName"  name="user-name" type="text" required placeholder="Username" /><br />
     <input id="pass" name="password" type="password" required placeholder="Password" />
     <input type="submit" name="login" value="Dodaj">
   </div>
 </form>
 <br><br>
 <h4><a href="korisnik.php">Uđite na stranicu</a></h4>
 <h4><?php echo $msg; ?></h4>
 

</body>
</html>