<?php
    while($row = mysqli_fetch_assoc($sql)){

    $uid = $row['unique_id'];
    $sqlm = "SELECT * FROM messages WHERE (incoming_id = $uid OR outgoing_id = $uid) AND (incoming_id = $outgoing_id OR outgoing_id = $outgoing_id) ORDER BY msg_id DESC LIMIT 1";

    $query = mysqli_query($conn, $sqlm);
    if(mysqli_num_rows($query) > 0){
        $row2 = mysqli_fetch_assoc($query);
        $result = $row2['msg'];
        ($outgoing_id == $row2['outgoing_id']) ? $you = "You: " :$you = "";

    }else{
        $result = "No Message Available";
         $you = "";
    }
    (strlen($result) > 25) ? $msg = substr($result, 0, 25).'...' : $msg = $result;

    
    // ($outgoing_id == $row2['outgoing_id']) ;


    ($row['status'] == "offline Now") ? $offline = "offline" : $offline = "";

    $output .= '<a href="chat.php?user_id='.$row['unique_id'].'">
    <div class="content">
        <img src="./images/'.$row['img'].'" alt="">
        <div class="details">
            <span>'.$row['fname']." ".$row['lname'].'</span>
            <p>'. $you .$msg.'</p>
        </div>
    </div>
    <div class="status-dot icon '.$offline.'">00</div>
</a>';
}
?>