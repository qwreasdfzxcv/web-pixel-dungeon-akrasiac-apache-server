
<?php
  require_once 'rank.php';

  $gameID = "";


  if(isset($_POST['gameID'])){
    $gmaeID = $_POST['gameID'];
  }

  if(isset($_POST['score'])){
    $score = $_POST['score'];
  }

  if(isset($_POST['turns'])){
    $turns = $_POST['turns'];
  }

  if(isset($_POST['class'])){
    class = $_POST['class'];
  }

  if(isset($_POST['end'])){
    $end = $_POST['end'];
  }

  if(isset($_POST['depth'])){
    $depth = $_POST['depth'];
  }

  if(isset($_POST['level'])){
    $level = $_POST['level'];
  }

  $rankObject = new Rank();

  // Registration
  if(!empty($gameID)) {

    $json_registration = $rankObject->createNewRegisterRank($gameID, $score, $turns, $class, $end, $depth, $level);
    echo json_encode($json_registration);
  }

}
?>
