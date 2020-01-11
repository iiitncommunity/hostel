<?php
if (isset($_POST['editprofile-btn'])) {
    session_start();
    require 'dbh.inc.php';
    $fname = $_POST['newFname'];
    $mname    = $_POST['newMname'];
    $lname    = $_POST['newLname'];
    $email    = $_POST['newemail'];
    $npass    = $_POST['newpass'];
    $opass    = $_POST['oldpass'];
    $mobile = $_POST['mobile'];
    
    
    $sql  = "SELECT * FROM student WHERE rollnum=?";
    $stmt = mysqli_stmt_init($conn);
    
    //checking whether the sql statement is valid for database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['status']="error in sql statment";
        exit();
    } else {
        //here we are executing sql on databse
        $rollnum = $_SESSION['user']['id'];
        mysqli_stmt_bind_param($stmt, "s", $rollnum);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        
        //here we are getting the result in row and validating the user with the password
        if ($row = mysqli_fetch_assoc($results)) {
            
            $pwdcheck = false;
            if ($opass == $row['pwd']) {
                $pwdcheck = true;
               
            }
            if ($pwdcheck == false) {
                $_SESSION['status']="Wrong password";
                header("Location: ../status.php");
                
                
                exit();
            }
            //this else if is just for cross checking the input from $pwdcheck
            if ($pwdcheck == true) {
                
                $_SESSION['type']        = 'student';
                $_SESSION['studentRoll'] = $row['rollnum'];
               
                $_SESSION['status']="OK";

                
                //LCN is ready

                //here register complaint.....................................
                
                $sql4 = "UPDATE student SET fname = '$fname' , mname = '$mname' ,email = '$email' ,lname = '$lname' , pwd = '$npass', contact = '$mobile'   WHERE rollnum = '$rollnum'";
                
                if(!mysqli_query($conn,$sql4)){
                   
                    echo 'Error in update'.mysqli_error($conn);
                    $_SESSION['status']="Update Unsucessfull";
                }else{
                   
                    $_SESSION['user'] = array(
                        'id' => $row['rollnum'],
                        'fname' => $fname,
                        'mname' => $mname,
                        'lname' => $lname,
                        'pwd' => $npass,
                        'post' => 'student',
                        'email' => $email,
                        'contact'=>$mobile);
                        header("Location: ../status.php?status=Update Success");
                        $_SESSION['type']='student';
                    exit();
                }
            } else {
                $_SESSION['status']="error in pwd checking";
                header("Location: ../status.php");
               
                exit();
            }
            
        } else {
            $_SESSION['status']="NO";
            
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
