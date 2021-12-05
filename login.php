<?php
    include_once "header.php";
?>
<body>
     <div class="wrapper">
         <section class="form login">
             <header>Chat App</header>
             <form action="#">
                 <div class="error-txt"></div>
                     <div class="field input">
                         <label for="">Email Address</label>
                         <input type="text" name = "email" placeholder="Enter Email">
                     </div>
                     <div class="field input">
                         <label for="">Password</label>
                         <input type="password" name = "pwd" placeholder="Enter  your Passworde">
                         <i class="toggle">i</i>
                     </div>
                     <div class="field button">
                         <input type="submit" value = "continue to chat">
                 </div>
                </form>
                <div class="link">Not yet signed up <a href="index.php">Signup Now</a></div>
            </section>
     </div> 

     <script src = "javascript/showpass.js"></script>
     <script src = "javascript/login.js"></script>
</body>
</html>