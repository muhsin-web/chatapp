<?php
session_start();
    include 'config.php';

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($pwd)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  
                $sql = "SELECT email FROM users WHERE email = '{$email}';";
                $result = mysqli_query($conn, $sql);

                if(mysqli_num_rows($result) > 0){
                    echo "$email - this email already exist";
                }else{
                    if(isset($_FILES['image'])){
                        $img_name = $_FILES['image']['name'];
                        $img_type = $_FILES['image']['type'];
                        $tmp_name = $_FILES['image']['tmp_name'];
                        $img_d = explode('.', $img_name);
                        $img_ext = end($img_d);

                        $extensions = ['png', 'jpg', 'jpeg'];
                        if(in_array($img_ext, $extensions) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                               if( move_uploaded_file($tmp_name, "../images/".$new_img_name)){
                                $status = "Active now";
                                $random = rand(time(), 10000000);

                                $sql2 = "INSERT INTO users (unique_id, fname, lname, email, password, img, status) 
                                VALUES ({$random}, '{$fname}', '{$lname}', '{$email}', '{$pwd}', '{$new_img_name}', '{$status}')";
                                      $result2 = mysqli_query($conn, $sql2);

                                if($result2){
                                    $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($sql3) > 0){
                                        $row = mysqli_fetch_assoc($sql3);
                                        $_SESSION['unique_id'] = $row['unique_id'];
                                        echo 'success';
                                    }
                                }else{
                                    echo "Something went wrong!";
                                }
                               }
                        }else{
                        echo "please select an image file of the type jpeg, jpg, png";
                        }
                    }else{
                        echo "please select a valid image file";
                    }
                // }
            }
        }else{
            echo "This is not a valid email";
        }
    }else{
        echo "All input field are required";
    }
?>