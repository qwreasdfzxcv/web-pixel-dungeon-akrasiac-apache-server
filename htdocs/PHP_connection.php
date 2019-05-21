<?php

$con=mysqli_connect("localhost", "root", "", "web_shattered_pixel_dungeon_akrasiac");

if(mysqli_connect_errno($con)){
  echo "Failed to connect to MySQL: ", mysqli_connect_error();
}

mysql_set_charset($con, "utf8");

$res = mysqli_query($con, "select * from rankinfo");
$result = array();

while($row = mysqli_fatch_array($res)){
  array_push($result, array('gmaeID'=>$row[0]));
}

echo json_encode(array("result"=>$result));

mysqli_close($con);

 ?>
