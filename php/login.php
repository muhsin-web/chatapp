<?php
    session_start();
    include 'config.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

   if(!empty($email) && !empty($pwd)){
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$pwd}';");

    if(mysqli_num_rows($sql) > 0){
        $row = mysqli_fetch_assoc($sql);
        $status = "Active Now";
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '$status' WHERE unique_id = {$row['unique_id']}");
      if($sql2){
        $_SESSION['unique_id'] = $row['unique_id'];
        echo "success";
      }
    }else{
        echo "Email or password is incorrect !";
    }
   }else{
       echo "All input fiels are requird";
   }

?>