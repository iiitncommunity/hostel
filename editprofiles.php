<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php

    if(isset($_SESSION['type'])){
        if($_SESSION['type']=="student"){
            echo '   
            <div class="overflow-auto">
                <form action="includes/updateS.inc.php" method="POST" class="my-2" >';
        }else{
            echo '   
            <div class="overflow-auto">
                <form action="includes/updateST.inc.php" method="POST" class="my-2" >';
        }
      
                        echo'
                            <div class="text-bold text-success">
                                <h3>Edit your profile : </h3>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                <input name="newFname" required type="text" class="form-control" id="rollnum" value = '.$_SESSION['user']['fname'].'>
                                </div>
                                <div class="col">
                                <input name="newMname" type="text" class="form-control" id="rollnum" placeholder ="Middle Name" value = '.$_SESSION['user']['mname'].'>
                                </div>
                                <div class="col">
                                <input name="newLname" required type="text" class="form-control" id="rollnum" value = '.$_SESSION['user']['lname'].'>
                                </div>
                                <div class="col">
                                <input name="newemail" required type="email" class="form-control" id="email" placeholder ="Email" value = '.$_SESSION['user']['email'].' >
                                </div>
                                <div class="col">
                                <input name="mobile" required type="number" min="0000000000" max="9999999999" class="form-control" id="email" placeholder ="Mobile" value = '.$_SESSION['user']['contact'].' >
                                </div>
                                <div class="col">
                                <input name="oldpass" required type="password" class="form-control" placeholder ="Current Password" id="pwd"value = '.$_SESSION['user']['pwd'].'>
                                </div>
                                <div class="col">
                                <input name="newpass" required type="password" class="form-control" placeholder ="New Password" id="pwd">
                                </div>
                            </div> <hr>

                           
                            <div class="col">
                                    <button type="submit" name="editprofile-btn" class="btn btn-danger">Submit</button>
                                </div>
                           
                    </form> 
                </div>';
    }else{
        echo 'Error';
    }
   
?>
</main>


<?php
require 'footer.php'
?>
