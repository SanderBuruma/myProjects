<?php
require('component/main.php');
$_SESSION['page'] = "studenten";
require('component/navbar.php');

if (isset($_POST['submit'])){

  require('component/con_db.php');

  $password = $_POST['password'];
  $passwordMD5 = md5($_POST['password']);
  $username = $_POST['username'];

  //grab MD5 password with same username
  $sql = "SELECT `passwordMD5` FROM `users` WHERE `username` = `$username`";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $dbPasswordMD5 = $row['password'];

  if (empty($password) || empty($username)){

    $_SESSION['warning'] = "Leeg veld";

	} elseif ($dbPasswordMD5 != $passwordMD5 || $dbPasswordMD5 = '') {

    $_SESSION['warning'] = "gebruiker/wachtwoord combinatie is ongeldig";

  } else {

    $sessionID = "";
    $hexchars = array("a","b","c","d","e","f","0","1","2","3","4","5","6","7","8","9");
    for ($i=0 ; $i<60 ; $i++){$sessionID .= array_rand($hexchars);}

    $sql = "UPDATE `users` SET `sessionID` = 'abc' WHERE `users`.`username` = `$username` ";
    mysqli_query($con,$sql);
    $_SESSION['success'] = "ingelogt als \"$username\"!";
    $_SESSION['sessionID'] = $sessionID;
    $_SESSION['username'] = $username;

  }
}
?>

<form id="inloggen" action="inloggen.php" method="POST">
  <h3>Inloggen</h3>
  <p class="success"><?php echo $_SESSION['success']; $_SESSION['success'] = '' ?></p>
  <p class="warning"><?php echo $_SESSION['warning']; $_SESSION['warning'] = '' ?></p>
  <input type="text" name="username" placeholder="Gebruikersnaam"><br/>
  <input type="password" name="password" value="" placeholder="paswoord"><br/>
  <button type="submit" name='submit'>Log in!</button>
</form>

<?php 
require('component/mainend.php');