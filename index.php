<?php require_once './config.php' ?>
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

    <form class="form" method="post" >
        <p class="error"><?php if(isset($error)) { echo $error;} ?> </p>
        <div class="form-group form_group">
            <label>Name</label>  
            <input type="text" name="name" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Email</label>  
            <input type="text" name="mail" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Next of kin</label>  
            <input type="text" name="nok" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Position</label>  
            <input type="text" name="position" class="form-control" />
        </div>
        
        <div class="form-group form_group">
            <label>Passport Photograph:</label>  
            <input type="file" name="passport" class="form-control" />
        </div>              
        
        <input type="submit" name="submit" value="Append" class="btn btn-info btn_info" /><br />
    </form>
    
    <!-- <form method="post">
    <input class="btn btn-danger" type="button" value="Clear Data">
    </form> -->
    <table class="table">
        <thead style="background: blueviolet; font-size: 14.7px; height: 1em">
            <tr>
                <th>S/N</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Next of Kin</th>
                <th>Position</th>
                <th>Passport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        // $mail = ($existing_data[0]['mail']);
        // echo array_search($mail,$existing_data[$id]);
        // var_dump($existing_data)[0]['mail'];
        // echo array_search($mail,$existing_data[$id]);

        if($existing_data === NULL) 
        {
            echo "<script>alert('No record present')</script>";
        }else{

        
        foreach($existing_data as $id => $value)  { ?>
        <tbody>
            <tr class="content-row">
                <td><?php echo $value['id'];?></td>
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['mail'];?></td>
                <td><?php echo $value['next_of_kin'];?></td>
                <td><?php echo $value['position'];?></td>
                <td><?php echo $value['passport_photo'];?></td>
                <td>
                    <div style="display: flex; flex-direction: row;">
                            <!-- <input type="hidden" name="curr_id" value="<?php //echo $value['id'] ?>" class="btn btn-danger btn_delete" />
                            <input type="hidden" name="curr_name" value="<?php //echo $value['name'] ?>" class="btn btn-danger btn_delete" />
                            <input type="hidden" name="curr_mail" value="<?php //echo $value['mail'] ?>" class="btn btn-danger btn_delete" />
                            <input type="hidden" name="curr_nok" value="<?php //echo $value['next_of_kin'] ?>" class="btn btn-danger btn_delete" />
                            <input type="hidden" name="curr_position" value="<?php //echo $value['position'] ?>" class="btn btn-danger btn_delete" />
                            <input type="hidden" name="curr_p_p" value="<?php //echo $value['passport_photo'] ?>" class="btn btn-danger btn_delete" /> -->
                            <a href="http://localhost/intakewebapp/record_update.php?id=<?php echo $id;?>"><input style="margin-right: .15em;" type ="submit" name="update" value="Update" class="btn btn-warning btn_delete" /></a>
                            <a href="http://localhost/intakewebapp/record_delete.php?id=<?php echo $id;?>"><input style="margin-left: .15em;" type="submit" name="delete" value="Delete" class="btn btn-danger btn_delete" /></a>
                    </div>
                </td>

            </tr>
        <?php }}?>
        </tbody>
    </table>
</body>
</html>