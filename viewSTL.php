<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
      require 'includes/dbh.inc.php';
       
        $sql  = "SELECT * FROM leaveForm";
        $result=mysqli_query($conn,$sql);
        if($result){
          echo '   
            <div class="overflow-auto">
                <form action="includes/updateStatus.inc.php" method="POST" class="my-2" >';
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Leave ID</th>
                <th scope="col">Enrollment ID</th>
                <th scope="col">Leave Date</th>
                <th scope="col">Leave Time</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Reason</th>
                <th scope="col">Mess Status(Leave)</th>
                <th scope="col">Mess Status(Arrival)</th>
                <th scope="col">Status</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>';
            while($row =  mysqli_fetch_assoc($result))
            {
               echo '<tr>
               <th scope="row">'.(string)$row['leaveFormNo'].'</th>
               <td>'.(string)$row['userid'].'</td>
               <td>'.(string)$row['leaveDate'].'</td>
               <td>'.(string)$row['leaveTime'].'</td>
               <td>'.(string)$row['leaveArrd'].'</td>
               <td>'.(string)$row['leaveArrT'].'</td>
               <td>'.$row['reason'].'</td>
               <td>'.$row['MessStatusLeave'].'</td>
               <td>'.$row['MessStatusArr'].'</td>
               <td>'.$row['status'].'</td>';
               if($_SESSION['type']=="warden"){
                echo '
                <td><select class="form-control" id="sel2" name='.(string)$row['leaveFormNo'].'>
                <option value = "select" selected>Select</option>
                <option value = "pending">Pending</option>
                <option value = "seen">Seen by you</option>
                <option value = "approved">Approved</option>
                <option value = "rejected">Reject</option>
              </select></td>
                
              </tr>';
               }
               
            }
            echo '</tbody>
            </table> <div class="col">
            <input name="updateState" hidden type="text" class="form-control" value ="leave">
            <button type="submit" name="submitStatus-btn" class="btn btn-danger">Save</button>
        </div>
   
</form> 
</div>';
        }else{
       
            echo 'Error :'.mysqli_error($conn);
        }    
    }
    else{
        echo 'Error';
    }
   
?>
</main>


<?php
require 'footer.php'
?>
