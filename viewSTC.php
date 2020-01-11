<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
        require 'includes/dbh.inc.php';
        $sql  = "SELECT * FROM complaints";
        $result=mysqli_query($conn,$sql);
        if($result){
          echo '   
            <div class="overflow-auto">
                <form action="includes/updateStatus.inc.php" method="POST" class="my-2" >';
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Complaint ID</th>
                <th scope="col">Enrollment ID</th>
                <th scope="col">Complaint Date</th>
                <th scope="col">Complaint Text</th>
                <th scope="col">Wing</th>
                <th scope="col">Floor</th>
                <th scope="col">Room</th>
                <th scope="col">Status</th>
                <th scope="col">Update Status</th>
              </tr>
            </thead>
            <tbody>';
            while($row =  mysqli_fetch_assoc($result))
            {
               echo '<tr>
               <th scope="row">'.(string)$row['complaintNo'].'</th>
               <td>'.(string)$row['userid'].'</td>
               <td>'.(string)$row['complaintDate'].'</td>
               <td>'.(string)$row['complaintText'].'</td>
               <td>'.(string)$row['wing'].'</td>
               <td>'.(string)$row['floor'].'</td>
               <td>'.$row['room'].'</td>
               <td>'.$row['complaintStatus'].'</td>
               <td><select class="form-control" id="sel2" name='.(string)$row['complaintNo'].'>
               <option value = "select" selected>Select</option>
               <option value = "pending">Pending</option>
               <option value = "seen">Seen by you</option>
               <option value = "will completed today">Will get completed by today</option>
               <option value = "completed">Completed</option>
             </select></td>
             </tr>';
            }
            echo '</tbody>
            </table> <div class="col">
            <input name="updateState" hidden type="text" class="form-control" value ="complaint">
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
