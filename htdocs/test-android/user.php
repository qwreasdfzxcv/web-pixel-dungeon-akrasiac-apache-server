<?php

include_once 'db-connect.php';

class User{

  private $db;
  private $db_table="userinfo";

  public function __construct() {

    $this->db=new DbConnect();

  }

  public function isLogininExist($username, $password) {

    $query = "select * from ".$this->db_table." where username = '$username' AND password = '$password' Limit 1";
    $result=mysqli_query($this->db->getDb(), $query);

    if(mysqli_num_rows($result) > 0) {

      mysqli_close($this->db->getDb());
      return true;

    }

    mysqli_close($this->db->getDb());
    return false;
    
  }

  public function isUsernameExist($username) {

    $query = "select * from ".$this->db_table." where username = '$username'";
    $result = mysqli_query($this->db->getDb(), $query);

    if(mysqli_num_rows($result) > 0) {

      mysqli_close($this->db->getDb());
      return true;

    }

    return false;

  }

  public function createNewRegisterUser($username, $password){

    $isExisting = $this->isUsernameExist($username);

    if($isExisting) {

      $json['success'] = 0;
      $json['message'] = "Error in registering. Probably the username already exists";

    } else {

      $query = "insert into".$this->db_table." (username, password) values ('$username', '$password')";
      $inserted = mysqli_query($this->db->getDb(), $query);

      if($inserted == 1) {

        $json['success'] = 1;
        $json['message'] = "Successfully registered the user";

      } else {

        $json['success'] = 0;
        $json['message'] = "Error in registering. Probably the username already exists";

      }

      mysqli_close($this->db->getDb());

    }

    return $json;

  }

  public function loginUsers($username, $password) {

    $json = array();
    $canUserLogin = $this->isLoginExist($username, $password);

    if($canUserLogin) {

      $json['success'] = 1;
      $json['message'] = "Successfully logged in";

    } else {

      $json['success'] = 0;
      $json['message'] = "Incorrect details";

    }

    return $json;

  }
}
?>
