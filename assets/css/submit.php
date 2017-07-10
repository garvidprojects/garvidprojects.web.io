<?php
$firstnameerr = $lastnameerr = $middlenameerr = $sexerr = $mailerr = $queryerr = ""
$firstname = $lastname = $middlename = $sex = $mail = $query = ""
if($_SERVER["REQUEST METHOD"]=="POST")  
{
   if(empty($_POST["firstname"]))
   {
       $firstnameerr="Please Enter First-Name"
       
   } 
    else
    {
        $firstname=test_input($_POST["firstname"])
            if(!preg_match("/^[a-zA-Z ]*$/",$firstname))
            {
                $firstnameerr="Only letters and whitespaces allowed"
            }
    }
    if(empty($_POST["middlename"]))
   {
       $middlenameerr="Please Enter a Middle Name"
       
   } 
    else
    {
        $middleename=test_input($_POST["middlename"])
            if(!preg_match("/^[a-zA-Z ]*$/",$middlename))
            {
                $middlenameerr="Only letters and whitespaces allowed"
            }
    }
    if(empty($_POST["lastname"]))
   {
       $lastnameerr="Please Enter Last Name"
       
   } 
    else
    {
        $lasttname=test_input($_POST["lastname"])
            if(!preg_match("/^[a-zA-Z ]*$/",$lasstname))
            {
                $laststnameerr="Only letters and whitespaces allowed"
            }
    }
    if(empty($_POST["mail"]))
   {
       $mailerr="Please Enter your email"
       
   } 
    else
    {
        $mail=test_input($_POST["mail"])
            if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
            {
                $mailerr="Invalid email entered"
            }
    }
    if (empty($_POST["query"])) {
     $queryerr = "";
   } else {
     $query = test_input($_POST["query"]);
   }

   if (empty($_POST["sex"])) {
     $sexErr = "Gender is required";
   }
    else 
    {
     $sex = test_input($_POST["sex"]);
    }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}