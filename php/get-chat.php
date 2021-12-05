<?php

session_start();
if(isset($_SESSION['unique_id'])){
    include_once "config.php";

    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $output = "";

    $sql = "SELECT * FROM messages
    LEFT JOIN users ON users.unique_id = messages.outgoing_id WHERE (outgoing_id = {$outgoing_id} AND incoming_id = {$incoming_id}) OR (outgoing_id = {$incoming_id} AND incoming_id = {$outgoing_id}) ORDER BY msg_id ASC";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($rows = mysqli_fetch_assoc($result)){
            if($rows['outgoing_id'] === $outgoing_id){
                $output = '<div class="outgoing chat">
                <div class="details">
                <p>'.$rows['msg'].'</p>
                </div>
                </div>';
            }else{
                $output = '<div class="incoming chat">
                <img src="./images/'.$rows['img'].'" alt="">
                <div class="details">
                    <p>'.$rows['msg'].'</p>
                </div>
                </div>';
            }
            echo $output;
        }
    }
    }else{
    header("Location: .. /login.php");
}


?>