<?php
 session_start();
 if (!isset($_SESSION['empid'])){
     header("Location:index.php");
     die("Login  to continue");
 }
require 'supdate.php';
 $empid = $_SESSION['empid'];
 $query = "SELECT * from `employee` WHERE `empid`= '{$empid}' ";
 require 'connect.php';
 $qres = mysqli_query($conn, $query);
 $res = mysqli_fetch_assoc($qres);
 if(empty($res)){
     die("An error has occurred");
 } else
 {
?>
<!Doctype html>
<html>
<head>
    <title>Update Profile-AMRIT BOTTLERS</title>
     <link rel="stylesheet" type="text/css" href="assets/css/main5.css"/>
          <link rel="shortcut icon" href="assets\images\logo.png" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Bellefair" rel="stylesheet">
</head>
<body>
    <header>
        <div id="container"> 
          <div class="dropdown">
         <button class="dropbtn">Employee Corner</button>
              <div class="dropdown-content">
                  <a  href="index.html">Log Out</a>
                 <a href="update.php">Update Profile</a>
                 <a href="apply.html">Apply For Leave</a>
            <a href="http://coca-colacompany.csod.com/LMS/catalog/Welcome.aspx?tab_page_id=-"67&tab_id=-1>Click here for online training</a>
         <a href="#">Download Salary Slip</a>
             </div>
        </div>
             <a href="contact.html" alt="Contact">Contact Us</a> 
            <a  href="about.html" alt="About Us">About Us</a>
            <a  href="home.html" alt="Home">Home</a>
             <img class="logoo" src="assets\images\Logo4.png" alt="Amrit Bottlers Logo"/>
        </div>
    </header>
    <div id="apply">
         <form action="update.php" method="post" enctype="multipart/form-data">
    <h1>Update Your Details</h1>
             <h3><?php if(isset($error)){foreach($error as $er){
                    print $er.'<br>';
                    }}?></h3>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="<?php echo $res['name']; ?>" >
        <label for="desig">Designation</label>
        <input type="text" id="desig" name="desig" value="<?php echo $res['designation']; ?>">
        <label for="qualification">Highest Qualification</label>
        <input type="text" id="qualification" name="qfc" value="<?php echo $res['hqualification']; ?>">
                 <label for="num">Mobile Number</label>
             <input type="number" name="num" id="num" value="<?php echo $res['mno']; ?>">
              <label for="datee">Joining Date</label>
             <input type="date" id="jdate" name="starting" value="<?php echo $res['jdate']; ?>" >
            <label for="company">Company You have worked with</label>
             <input type="text" id="cname" name="cname" value="<?php echo $res['company']; ?>">
             <label for="uimg">Upload Your Adhaar Card/PAN Card/Driving License</label><br/>
             <input type="file" id="uimg" name="uimg"><br/><br/>
                  <label for="dis">Details about distributor</label>
                  <textarea id="dis" name="dis" value="<?php echo $res['name']; ?>"
                        placeholder="Write here..." style="height:200px"></textarea>
             <input type="submit" value="Submit" name="psubmit">
        </form>
    </div>
      <footer>
        <p>Amrit Bottlers Private Limited. www.amritbottlersfzd.com <br/>All right reserved Copyright 1982 </p>
       </footer>
    </body>
<?php
}
?>
?>