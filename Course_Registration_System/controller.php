<?php

// Omar R. Gebril | controller.php | Course Registration System


include "model.php";
session_start();

$CS = new CourseUser();
if(isset($_GET['type']) && $_GET['type']=='login'){
    $username = htmlspecialchars($_GET['user']);
    $password = htmlspecialchars($_GET['pass']);
    $password_to_store = password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
    $username_to_store = htmlspecialchars($username);
    if(! empty($CS->findUsers($username_to_store))){
        $passcode =  $CS->findUsers($username_to_store)[0]['password'];
        echo $password.$passcode."<br>";
        echo password_hash(htmlspecialchars($password), PASSWORD_DEFAULT);
        $valid = password_verify ( $password, $passcode );
       echo $valid;
        if ($valid){
            echo $passcode;
        }
        else{
            echo 'notvalid';
        }
    }
    else{
        echo 'usernameinvalid';
        //alert("username not found.");
    }
    
   //check if password for specified username matches the hashed password 
   //in the database using password_verify function
   //set session variable
}
else if(isset($_GET['type']) && $_GET['type']=='register'){
    if(! empty($CS->findUsers($username_to_store))){
        echo 'found';
    }
    else if (empty($CS->findUsers($username_to_store))){
        $CS->AddUser($username_to_store, $password_to_store);
        $_SESSION[$username_to_store] = new CourseUser ( $username_to_store, $password_to_store );
        echo 'nonexistent';
    }
    //check if account already exists in database
    //possibly set session variable here if you want users to be 
    //logged in after registering, otherwise redirect them to the 
    //login page
}


if(isset($_GET['type']) && $_GET['type']=='getclass'){
    $class = $_GET['class'];
    echo json_encode($CS->getClasses($class));
}

if(isset($_GET['type']) && $_GET['type']=='enroll'){
    $courses_array = $_GET['courses'];
    echo json_encode($CS->enrollUser($_SESSION[$username_to_store], $courses_array));
    
}

?>