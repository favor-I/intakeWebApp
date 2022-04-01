<?php
// require_once "./update_config.php";
$current_data = file_get_contents('employee_data.json');  
$array_data = json_decode($current_data, true);



// $name = $array_data[0]['name'];
// $email = $array_data[0]['mail'];
// $n_o_k = $array_data[0]['next_of_kin'];
// $position = $array_data[0]['position'];
// $image = $array_data[0]['passport'];

//-------------------------------------------------
if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $curr_id = $GLOBALS["array_data"][$id]["id"];
    $curr_name = $GLOBALS["array_data"][$id]["name"];
    $curr_mail = $GLOBALS["array_data"][$id]["mail"];
    $curr_nok = $GLOBALS["array_data"][$id]["next_of_kin"];
    $curr_position = $GLOBALS["array_data"][$id]["position"];
    $curr_passport = $GLOBALS["array_data"][$id]["passport_photo"];
}
//--------------------------------------------------


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STAFF RECORD SYSTEM</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/> 
</head>
<body>

<form action="record_update_config.php?id=<?php echo $GLOBALS['id'] ?>" class="form" method="post" >
        <div class="form-group form_group">
            <label>Name</label>
            <input type="hidden" name="curr_id" value="<?php echo $curr_id; ?>">
            <input type="text" name="curr_name" value="<?php echo $curr_name; ?>" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Email</label>  
            <input type="text" name="curr_mail" value="<?php echo $curr_mail ?>" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Next of kin</label>  
            <input type="text" name="curr_nok" value="<?php echo $curr_nok; ?>" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Position</label>  
            <input type="text" name="curr_position" value="<?php echo $curr_position; ?>" class="form-control" />
        </div>
        
        <div class="form-group form_group">
            <label>Passport Photograph:</label>  
            <input value="<?php echo $curr_passport; ?>" type="file" name="curr_passport" class="form-control" />
        </div>              
        
        <input type="submit" name="update" value="Update" class="btn btn-info btn_info" />
    </form>
</body>
</html>