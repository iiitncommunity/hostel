<?php
if (isset($_POST['complaint-btn'])) {
    session_start();
    require 'dbh.inc.php';
    $rollnum = $_POST['l_rnum'];
    $email    = $_POST['l_email'];
    $pass    = $_POST['l_pwd'];
    $reason    = $_POST['reason'];
    $address    = $_POST['address'];
    $leavedate    = $_POST['leavedate'];
    $arrivaldate    = $_POST['arrivaldate'];
    $ltime = $_POST['leavetime'];
    $atime = $_POST['arrivaltime'];
    $vacDays    = $_POST['vacDays'];
    $messA = $_POST['messA'];
    $messL = $_POST['messL'];
    $LCN;
    $status  = 0;
    
   
    
    $sql  = "SELECT * FROM student WHERE rollnum=?";
    $stmt = mysqli_stmt_init($conn);
    
    //checking whether the sql statement is valid for database
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        $_SESSION['status']="error in sql statment";
        exit();
    } else {
        //here we are executing sql on databse
        mysqli_stmt_bind_param($stmt, "s", $rollnum);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        
        //here we are getting the result in row and validating the user with the password
        if ($row = mysqli_fetch_assoc($results)) {
            
            $pwdcheck = false;
            if ($pass == $row['pwd']) {
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

                
                //here getting the latest status to form complaint number
                $sql2  = "SELECT * FROM leaveForm WHERE userid=? AND stamp=?";
                $stmt2 = mysqli_stmt_init($conn);
                $sno;
                if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                    $_SESSION['complaint_status']="error in sql statment";
                    header("Location: ../status.php?status=sqlerror2");
                    exit();
                } else{
                    $x1="L";
                    mysqli_stmt_bind_param($stmt2, "ss", $rollnum,$x1);
                    mysqli_stmt_execute($stmt2);
                    $results2 = mysqli_stmt_get_result($stmt2);
                    if ($row2 = mysqli_fetch_assoc($results2)) {
                        $sno=$row2['leaveFormNo'];
                        $cno=$row2['leaveFormNo'];
                        $sno=substr($sno,strlen($sno)-3);
                        $sno=intval($sno);
                        echo 'In if updating sno'.$sno;
                        $sno=$sno +1;
                        settype($sno, "string");
                        if(strlen($sno)<3){
                            if(strlen($sno)==1){
                                $sno="00".$sno;
                            }
                            if(strlen($sno)==2){
                                $sno="0".$sno;
                            }
                        }
                         //now removing status of current complaint
                         $sql3 = "UPDATE leaveForm SET stamp='' WHERE leaveFormNo=?";
                         $stmt3 = mysqli_stmt_init($conn);
                         if (!mysqli_stmt_prepare($stmt3, $sql3)) {
                             $_SESSION['complaint_status']="error in sql statment";
                             header("Location: ../status.php?status=sqlerror3");
                             exit();
                         } else{
                             mysqli_stmt_bind_param($stmt3, "s", $cno);
                             mysqli_stmt_execute($stmt3);
                         }
                       
                        //here update value.....................

                    }else{
                        $sno="001";
                        echo 'in else';
                    }
                }

                //here complaint is getting registered
                $LCN=substr($rollnum,0,1);  //B
                $LCN.=substr($_SESSION['user']['post'],0,1);    //BS
                $temp=date('Y');    //BS
                $temp=substr($temp,0,2);    //BS
                $LCN.=$temp;    //BS20
                $LCN.=substr($rollnum,2,2); //BS2017
                $LCN.=substr($rollnum,4,1); //BS2017C
                $LCN.=substr($rollnum,8); //BS2017C039
                $LCN.="L";  //BS2017C039C
                $LCN.=$sno; //BS2017C039C001

                //LCN is ready

                //here register complaint.....................................
               $sta="L";
               $state = "pending";
                $sql4 = "INSERT INTO leaveForm VALUES ('$rollnum','$LCN','$leavedate','$ltime','$messL','$reason','$arrivaldate','$atime','$messA','$sta','$state')";
                
                if(!mysqli_query($conn,$sql4)){
                    echo $LCN;
                    echo 'Error in insertion'.mysqli_error($conn);
                }else{
                    header("Location: ../status.php?status=".$LCN);
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
    header("Location: ../status.php");
    exit();
}
