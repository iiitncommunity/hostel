<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
      require 'includes/dbh.inc.php';
        $rnum = $_SESSION['user']['id'];
        $sql  = "SELECT * FROM leaveForm WHERE userid='$rnum'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Leave ID</th>
                <th scope="col">Leave Date</th>
                <th scope="col">Leave Time</th>
                <th scope="col">Arrival Date</th>
                <th scope="col">Arrival Time</th>
                <th scope="col">Reason</th>
                <th scope="col">Mess Status(Leave)</th>
                <th scope="col">Mess Status(Arrival)</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>';
            while($row =  mysqli_fetch_assoc($result))
            {
               echo '<tr>
               <th scope="row">'.(string)$row['leaveFormNo'].'</th>
               <td>'.(string)$row['leaveDate'].'</td>
               <td>'.(string)$row['leaveTime'].'</td>
               <td>'.(string)$row['leaveArrd'].'</td>
               <td>'.(string)$row['leaveArrT'].'</td>
               <td>'.$row['reason'].'</td>
               <td>'.$row['MessStatusLeave'].'</td>
               <td>'.$row['MessStatusArr'].'</td>
               <td>'.$row['status'].'</td>
             </tr>';
            }
            echo '</tbody>
            </table>';
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
