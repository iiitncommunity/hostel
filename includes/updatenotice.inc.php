<?php
if (isset($_POST['notice-btn'])) {
    session_start();
    require 'dbh.inc.php';
  
    $sql  = "SELECT * FROM notices";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row =  mysqli_fetch_assoc($result))
        {
            $id = (string)$row['noticeid'];
            $t1=$id.'link';
            $t2=$id.'text';
           
            $sql1 = "UPDATE notices SET noticelink='$_POST[$t1]',noticetext='$_POST[$t2]' WHERE noticeid='$id'";
            if(!mysqli_query($conn,$sql1)){
                echo $id.$state.$status.' not success'.mysqli_error($conn);
                $_SESSION['status']="Updating notice unsuccessfull";
            }else{
                echo $id.$state.$status.'  success';
                $_SESSION['status']="Updating notice  successfull";
            }
            
        }
        header("Location: ../status.php");
    }
    
}

//if button is not at all clicked
else {
    $_SESSION['status']="Unsuccessfull Operation";
    header("Location: ../status.php");
    exit();
}
