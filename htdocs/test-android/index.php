
<?php

  require_once 'user.php';

  $username = "";
  $password = "";

  if(isset($_POST['username'])) {

    $username = $_POST['username']

  }

  if(isset($_POST['password'])) {

    $password = $_POST['password'];

  }

  $userObject = new User();

  //Registration
  if(!empty($username) && !empty($password)) {

    $hashed_password = md5($password);

    $json_registration = $userObject->createNewRegisterUser($username, $hashed_password);

    echo json_encode($json_registration);

  }

  //Login

  if(!empty($username) && !empty($password)) {

    $hashed_password = md5($password);

    $json_array = $userObject->loginUsers($username, $hashed_password);

    echo json_encode($json_array);

  }
?>
