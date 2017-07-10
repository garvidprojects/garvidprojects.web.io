<?php
session_start();

// if user already logged in => redirect to index page
if(isset($_SESSION['empid'])){
    header("Location:home.html");
}

    $msg = array();
	if(isset($_POST['submit'])){   // if user has submitted form

        // loading required functions and variables
        require 'connect.php';
        require 'general.php';

	   $data = $_POST;
       if (isNotEmpty($data)){      // if inputs were not empty
            $santisedData = sanitise($data, $conn); // sanitising user data for html/js/sql injection
            extract($santisedData);
            $query = "SELECT * FROM `employee` WHERE `empid`='{$employeeid}' ";
            $qres = mysqli_query($conn, $query);
            $res = mysqli_fetch_assoc($qres);
            if(!empty($res)){                   // if employee id matched
                if($password == $res['pass']){          // if password matched
                    // let log in
                    $_SESSION['empid'] = $employeeid;
                    header("Location:home.html");                // redirect to index page
                } else $msg[] = "Please provide correct password";
            } else $msg[] = "Please provide correct Employee ID";
       } else $msg[] = "All feilds are required";
	}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Sign In-HRIS AMRIT BOTTLERS</title>
    <link rel="stylesheet" type="text/css" href="assets\css\main4.css"/>
         <link rel="shortcut icon" href="assets\images\logo.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
</head>
<body>
  
    <header>
      <div id="container"> 
    
           <img src="assets\images\Logo4.png" alt="Amrit Bottlers Logo"/>
          <a  href="index.html" alt="Home">Portal</a>
         
        </div>
    </header>
   
    <div id ="signin">
         <span class="reg"><a href="register.php">Click here to Register</a></span>
        <form action="Signin.php" method="POST">
            <h1>Sign In</h1>
            <h3><?php if(!empty($msg)){ foreach($msg as $val){ print $val;} } ?></h3>
            <form>
                <label for="Employee ID">Employee ID</label>
                <input type="text" id="employeeid" name="employeeid" placeholder="Enter your Employee ID" required="true" >
                <label for="Password">Passoword</label>
                <input type="password" id="password" name="password" placeholder="********" required="true">
                <input type="submit" value="Sign In" name="submit">
            </form>
        </form>
    </div>
     <footer>
        <p>Amrit Bottlers Private Limited. www.amritbottlersfzd.com <br/>All right reserved Copyright 1982 </p>
       </footer>
</body>
</html>