<?php
if(file_exists('employee_data.json'))  
{  
  $current_data = file_get_contents('employee_data.json');  
  $array_data = json_decode($current_data, true);
}
if(isset($_GET["id"])) {
  $id = $_GET["id"];
}

if(isset($_POST["update"])){
  $curr_id = $_POST["curr_id"];
  $curr_name = $_POST["curr_name"];
  $curr_mail = $_POST["curr_mail"];
  $curr_nok = $_POST["curr_nok"];
  $curr_position = $_POST["curr_position"];
  $curr_passport = $_POST["curr_passport"];

  foreach($GLOBALS["array_data"] as $key => $value ) {
    if($key == $id) {
      $GLOBALS["array_data"][$key]["id"] = $curr_id;
      $GLOBALS["array_data"][$key]["name"] = $curr_name;
      $GLOBALS["array_data"][$key]["mail"] = $curr_mail;
      $GLOBALS["array_data"][$key]["next_of_kin"] = $curr_nok;
      $GLOBALS["array_data"][$key]["position"] = $curr_position;
      $GLOBALS["array_data"][$key]["passport_photo"] = $curr_passport;

      $record_update = json_encode($GLOBALS["array_data"]);
      file_put_contents('employee_data.json', $record_update);

      header("refresh:.5; url=http://localhost/intakewebapp/");
    }
  }
}
?>