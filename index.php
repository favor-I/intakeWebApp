<?php require_once './config.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STAFF RECORD SYSTEM</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
    
    <table class="table">
        <thead style="background: blueviolet; font-size: 14.7px; height: 1em">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Next of Kin</th>
                <th>Position</th>
                <th>Passport</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        foreach($existing_data as $value) {?>
        <tbody>
            <tr class="content-row">
                <td><?php echo $value['name'];?></td>
                <td><?php echo $value['mail'];?></td>
                <td><?php echo $value['next_of_kin'];?></td>
                <td><?php echo $value['position'];?></td>
                <td><?php echo $value['passport_photo'];?></td>
                <td>
                <form style="display: flex; flex-direction:row;" method="post">
                    <input type="submit" name="update" value="Update" class="btn btn-warning btn_update" />
                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn_delete" />
                </form>
                </td>

            </tr>
        <?php }?>
        </tbody>
    </table>
</body>
</html>