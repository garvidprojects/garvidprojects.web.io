<!DOCTYPE HTML>
<?php
    $msg = array();
    if (isset($_POST['submit'])){ // if form is submitted 
        
        // loading required functions and variables
        require 'connect.php';
        require 'general.php';
        
        $data = $_POST;
        
        if(isNotEmpty($data)){    // checking for blank input feilds
            
            extract($data);
            $sanitisedData = sanitise($data, $conn); // sanitising user data for html/js/sql injection
            extract($sanitisedData);

            if ($password == $cnfpassword){     // if password and confirm password matched

                if (strlen($password) >= 5){    // if password lenght is more than 4
                
                    if (eidNotDuplicate($conn, $employeeid)){   // employee has not registered previously
                
                        $query = "INSERT INTO `employee`(`name`, `empid`, `pass`) VALUES ('{$name}','{$employeeid}','{$password}') ";
                
                        if (mysqli_query($conn, $query)){
                          // Entry in database successfull
                            $msg[] = "Registration Successfull";
                        } else $msg[] = "An error has occurred during registration";
                
                    } else $msg[] = "Employee ID already registered";
                
                } else $msg[] = "Password too small";

            } else $msg[] = "Password not matched";

        } else $msg[] = "All feilds required";
    }
?>
<html>
<head>
    <title>Register Here-HRIS AMRIT BOTTLERS</title>
    <link rel="stylesheet" type="text/css" href="assets\css\main7.css"/>
         <link rel="shortcut icon" href="assets\images\logo.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
</head>
<body>
  
    <header>
      <div id="container"> 
          <img src="assets\images\Logo4.png" alt="Amrit Bottlers Logo"/>
          <a  href="index.html" alt="To Portal">Portal</a>
          <a href="Signin.php" alt="To Sign IN Page">Sign In</a>
      </div>
    </header>
    <div id ="register">
        <form action="register.php" method="POST">
            <h1>Register</h1>
            <h3><?php if(!empty($msg)){ foreach($msg as $val){ print $val;} } ?></h3>
            <form>
                <label for="name">Full Name</label> 
                <input type="text" id="text" name="name" placeholder="Your Name" required="true">
                <label for="Employee ID">Employee ID</label>
                <input type="text" id="employeeid" name="employeeid" placeholder="Your Employee ID" required="true" >
                <label for="Password">Password</label>
                <input type="password" id="password" name="password" placeholder="********" required="true">
                <label for="Confirm Password">Confirm Password</label>
                <input type="password" id="password" name="cnfpassword" placeholder="********" required="true">
                <input type="submit" value="Register" name="submit">
            </form>
        </form>
    </div>
     <footer>
        <p>Amrit Bottlers Private Limited. www.amritbottlersfzd.com <br/>All right reserved Copyright 1982 </p>
       </footer>
</body>
</html>