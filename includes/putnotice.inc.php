<?php
if (isset($_POST['putnotice-btn'])) {
    session_start();
    require 'dbh.inc.php';
    $link = $_POST['link'];
    $text    = $_POST['text'];
    
    
    $sql  = "SELECT * FROM notices WHERE noticelink=? and noticetext=?";
    $stmt = mysqli_stmt_init($conn);
    
    //checking whether the sql statement is valid for database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['status']="error in sql statment";
        echo mysqli_error($conn);
        header("Location: ../status.php");
        exit();
    } else {
        //here we are executing sql on databse
        
        mysqli_stmt_bind_param($stmt, "ss", $link,$text);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        
        //here we are getting the result in row and validating the user with the password
        if ($row = mysqli_fetch_assoc($results)) {
            
            echo 'Notice already present';
            $_SESSION['status']="Duplicate Notice Error";
            header("Location: ../status.php");
        } else {
           
            $sql  = "INSERT INTO notices (noticelink,noticetext) VALUES('$link','$text')";
            if(!mysqli_query($conn,$sql)){
                   
                echo 'Error in insertion'.mysqli_error($conn);
                $_SESSION['status']="Notice Insertion Unsucessfull";
            }else{
                $_SESSION['status']="Notice Insertion Sucessfull";
            }
            header("Location: ../status.php");
                exit();
        }
    }
}

//if button is not at all clicked
else {
    $_SESSION['status']="Unsuccessfull Operation";
   
    header("Location: ../status.php");
    exit();
}
