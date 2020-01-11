<?php
if (isset($_POST['submitStatus-btn'])) {
    session_start();
    require 'dbh.inc.php';
    $state = $_POST['updateState'];
    if($state=="complaint"){
        $sql  = "SELECT * FROM complaints";
        $result=mysqli_query($conn,$sql);
        if($result){
            while($row =  mysqli_fetch_assoc($result))
            {
               $id = (string)$row['complaintNo'];
                $status = (string)$_POST[$id];
                if($status!="select"){
                    $sql1 = "UPDATE complaints SET complaintStatus='$status' WHERE complaintNo='$id'";
                    if(!mysqli_query($conn,$sql1)){
                        echo $id.$state.$status.' not success'.mysqli_error($conn);
                        $_SESSION['status']="Updating complaint status unsucessfull";
                    }else{
                        echo $id.$state.$status.'  success';
                        $_SESSION['status']="Updating complaint status sucessfull";
                    }
                }
            }
            header("Location: ../status.php");
        }
    }else{
        if($_SESSION['type']=="warden"){
            $sql  = "SELECT * FROM leaveForm";
            $result=mysqli_query($conn,$sql);
            if($result){
                while($row =  mysqli_fetch_assoc($result))
                {
                   $id = (string)$row['leaveFormNo'];
                    $status = $_POST[$id];
                    if($status!="select"){
                        $sql1 = "UPDATE leaveForm SET status ='$status' WHERE leaveFormNo='$id'";
                        if(!mysqli_query($conn,$sql1)){
                            echo $id.$state.$status.' not success'.mysqli_error($conn);
                            $_SESSION['status']="Updating leave status unsucessfull";
                        }else{
                            echo $id.$state.$status.'  success';
                            $_SESSION['status']="Updating leave status sucessfull";
                        }
                    }
                }
                header("Location: ../status.php");
            }
        }
    }
}

//if button is not at all clicked
else {
    $_SESSION['status']="Unsuccessfull Operation";
    header("Location: ../status.php");
    exit();
}
