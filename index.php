<?php
session_start();
if(isset($_SESSION['unique_id'])){
    header('Location: users.php');
}
?>
<?php
    include_once "header.php";
?>
<body>
     <div class="wrapper">
         <section class="form signup">
             <header>Chat App</header>
             <form action="#" enctype = "multipart/form-data">
                 <div class="error-txt">This is an error message!</div>
                 <div class="name-details">
                     <div class="field input">
                         <label for="">First Name</label>
                         <input type="text" name = "fname" placeholder="Enter first name" required>
                     </div>
                     <div class="field input">
                         <label for="">Last Name</label>
                         <input type="text" name = "lname"  placeholder="Enter Last name" required>
                     </div>
                    </div>
                     <div class="field input">
                         <label for="">Email Address</label>
                         <input type="text" name = "email" placeholder="Enter Email" required>
                     </div>
                     <div class="field input">
                         <label for="">Password</label>
                         <input type="password" name = "pwd" placeholder="Enter New Passworde" required>
                         <i class="toggle">i</i>
                     </div>
                     <div class="field image">
                         <label for="">Select Image</label>
                         <input type="file" name = "image" required>
                     </div>
                     <div class="field button">
                         <input type="submit" value = "continue to chat">
                 </div>
                </form>
                <div class="link">Already signed up <a href="login.php">Login</a></div>
            </section>
     </div> 

     <script src="javascript/showpass.js"></script>
     <script src="javascript/signup.js"></script>
</body>
</html>