<?php

include_once 'db-connect.php';

class Rank{

  private $db;

  private $db_table = 'rankinfo'

  public function __construct(){
    $this->db = new DbConnect();
  }

  public function isRankExist($gameID){

    $query = "select * from".$this->db_table."where gameID='$gameID'";

    $result = mysqli_query($this->db->getDb(), $query);

    if(mysqli_num_rows($result) > 0) {

      mysqli_close($this->db->getDb());

      return true;
    }

    mysqli_close($this->db->getDb());

    return false;
  }

  public function createNewRegisterRank($gameID, $score, $turns, $class, $end, $depth, $level) {

    $query = "insert into".$this->db_table."(gameID, score, turns, class, end, depth, level) values ('$gameID', '$score', '$turns', '$class', '$end', '$depth', '$level')";

    $inserted = mysqli_query($this->db->getDb().$query);
  }

  public function uploadRank($gmaeID) {

    $json = array();

    $canRankUpload = $this->isRankExist($gameID);

    if($canRankUpload) {

      $json['success'] = 1;
      $json['message'] = "Successfully upload";

    } else {

      $json['success'] = 0;
      $json['message'] = "failed upload";

    }

    return $json;
  }
}
 ?>
