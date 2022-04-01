<?php
if(file_exists('employee_data.json'))  
{  
  $current_data = file_get_contents('employee_data.json');  
  $array_data = json_decode($current_data, true);
}else {$existing_data = [];}

if(isset($_GET["id"])){
  $_id = $_GET["id"];
  unset($GLOBALS["array_data"][$_id]);
  $new_record = json_encode($GLOBALS["array_data"]);
  file_put_contents('employee_data.json', $new_record);

  header("refresh:.5; url=http://localhost/intakewebapp/");
}
?>