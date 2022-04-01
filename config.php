<?php
//---------------------------------------------------------
$existing_data=[];
if(file_exists('employee_data.json'))  
{  
  $current_data = file_get_contents('employee_data.json');  
  $array_data = json_decode($current_data, true);
  $existing_data = $array_data;
  // print_r($existing_data);
}else {$existing_data = [];}
//---------------------------------------------------------
// function create_id() {

// }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
//---------------------------------------------------------
// function to check the existence of email inputs
function check_existence() {
  if($GLOBALS['existing_data'] !== NULL){
    foreach ( $GLOBALS['existing_data'] as $email_id) {
      // var_dump($email_id['mail']);
      if($email_id['mail'] == $GLOBALS['email'] && $GLOBALS['existing_data']){
        return true;
      }
  }
}else{ return false;}

}

//---------------------------------------------------------
// if(isset($_GET["delete"])) {
//   $id = $_GET["id"];
//   // echo $id;
//   foreach ($GLOBALS['existing_data'] as $value) {
//     if($value["id"] == $id) {
//       // print_r($value);
//       // print_r($value);
//       unset($value["id"],$value["name"], $value["email"], $value["next_of_kin"], $value["position"], $value["passport_photo"]) ;
//       $final_data = json_encode($GLOBALS["existing_data"]);
//       file_put_contents('employee_data.json', $final_data);



//       header("refresh:5; url=http://localhost/intakewebapp/index.php");
//       break;
//     }
//   // echo "yes";
//   // echo $_GET['email_id'];
//   // foreach ($GLOBALS['existing_data'] as $value) {
//   //   var_dump($value);
//   // }
//   }
// }


if(isset($_POST["submit"]))  
{
  // $target_file = $target_dir . basename($_FILES["passport"]["name"]);  
  $email = $_POST["mail"];
  if(empty($_POST["name"]))  
  {
      $error = "<label class='text-danger'>Enter Name</label>";
  }  
  else if(empty($email ))  
  {
      $error = "<label class='text-danger'>Enter Email</label>";
  }  else if(check_existence() == true) 
  {
      $error = "<label class='text-danger'>This data already exist in the database</label>";
  }
  else if(empty($_POST["nok"]))  
  {
      $error = "<label class='text-danger'>Enter Next of kin</label>";
  }else if(empty($_POST["position"])) 
  {
      $error = "<label class='text-danger'>Enter Position</label>";
  }else if (empty($_POST["passport"])){
      $error = "<label class='text-danger'>Upload Passport</label>";
  }
  else  
  {  
    if(file_exists('employee_data.json'))  
    {  
        $current_data = file_get_contents('employee_data.json');  
        $array_data = json_decode($current_data, true);
        if($array_data === NULL) {
          $id = 1;
        }else {
          $id = sizeof($array_data) + 1;
        }
        // foreach($array_data)
        //get length of array and increment
        //validate email by looping through the whole array and break if 
        function get_data() {
            $data = array(
                'id' => $GLOBALS['id'],
                'name' => $_POST['name'],  
                'mail' => $_POST["mail"],
                'next_of_kin' => $_POST["nok"],
                'position' => $_POST["position"],
                'passport_photo' => $_POST['passport']
            );
            
            return $data;
        }
        $extra = get_data();
        $array_data[] = $extra;  
        $final_data = json_encode($array_data);  
        if(file_put_contents('employee_data.json', $final_data))  
        {  
              $message = "<label class='text-success'>File Appended Success fully</p>";
              $existing_data = json_decode($final_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        }  
    }  
    else  
    {  
        $error = 'JSON File not exits';  
    }  
  } 
}
?>