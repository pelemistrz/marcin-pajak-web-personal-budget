<?php
  session_start();
  if(isset($_POST['email'])){
    $allOk = true;

    $username = $_POST['username'];
    if((strlen($username) < 3) || (strlen($username) > 20)){
      $allOk = false;
      $_SESSION['errorUsername']= "User name should be 3 characters long and less than 20";
      header("Location: ../registerPage.php");
    }
    if(ctype_alnum($username)==false){
      $allOk = false;
      $_SESSION['errorUsername']= "Username should contain only alphanumeric characters";
    }
    $email = $_POST["email"];
    $emailSan = filter_var($email,FILTER_SANITIZE_EMAIL);
    if((filter_var($emailSan,FILTER_VALIDATE_EMAIL)==false) || ($email !=$emailSan)){
      $allOk = false;
      $_SESSION["errorEmail"]= "Please provide correct email";
    }

    $password = $_POST['password'];
    $passwordRepeated = $_POST['passwordRepeated'];

    if((strlen($password) < 6) || (strlen($password)>20)){
      $allOk = false;
      $_SESSION['errorPassword']= 'Password should have minimum 8 and maksimum 20 characters';
    }

    if($password != $passwordRepeated){
      $allOk = false;
      $_SESSION['errorPassword']= "Given passwords are not identical";
    }

    $_SESSION["givenUsername"]= $username;
    $_SESSION["givenEmail"]= $email;
    $_SESSION["givenPassword"]= $password;
    $_SESSION["givenRepeatedPassword"]= $passwordRepeated;

    require_once("database.php");
    try{
      $query = $db->prepare('SELECT * FROM users where email = :email');
      $query->bindValue(":email", $email,PDO::PARAM_STR);
      $query->execute();

      if(!$query) throw new Exception("Error database");

      $howManyEmails = $query->rowCount();
      if($howManyEmails > 0){
        $allOk = false;
        $_SESSION["errorEmail"]= "There is account connected with this email!";
      }

      $query = $db->prepare('SELECT * FROM users where username = :username');
      $query->bindValue(":username", $username,PDO::PARAM_STR);
      $query->execute();

      $howManyUsernames = $query->rowCount();
      if($howManyUsernames > 0){
        $allOk = false;
        $_SESSION["errorUsername"]= "There is user with this username";
      }

      if($allOk == true){
        $insertQuery = $db->prepare("INSERT INTO users values (NULL,'$username', '$password', '$email')");
        $insertQuery->execute();
        $_SESSION["isRegisterCompleted"]=true;
        header("Location: welcome.php");

      } else{

      }




    } catch(Exception $e){
    
    }



  } else {
    $_SESSION["errorEmail"]= "There is no email given";
    header("Location: ../registerPage.php");
  }