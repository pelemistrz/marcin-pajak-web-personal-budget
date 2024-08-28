<?php
  session_start();
  require_once("database.php");
  if(!isset($_SESSION["loggedId"])){
    if(isset($_POST['email'])){
    $email = filter_input(INPUT_POST,"email");
    $password = filter_input(INPUT_POST,"password");

    $userQuery = $db->prepare('SELECT * FROM users where email = :email');
    $userQuery->bindValue(":email", $email,PDO::PARAM_STR);
    $userQuery->execute();

    $user = $userQuery->fetch();

    if($user && $password===$user['password']){
      $_SESSION['loggedId'] = $user['id'];
      var_dump($_SESSION['loggedId']);
      unset($_SESSION['badAttempt']);
       header('Location: ../mainPage.php');
    } else {
      $_SESSION['badAtempt'] = true;
       header('Location: ../login.php');
      exit();
    }
  }   else {
     header('Location: ../login.php');

    exit();
  }
} else {
  header('Location: ../mainPage.php');

}




