<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
        require 'includes/dbh.inc.php';
        $rnum = $_SESSION['user']['id'];
        $sql  = "SELECT * FROM complaints WHERE userid='$rnum'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Complaint ID</th>
                <th scope="col">Complaint Date</th>
                <th scope="col">Complaint Text</th>
                <th scope="col">Wing</th>
                <th scope="col">Floor</th>
                <th scope="col">Room</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody>';
            while($row =  mysqli_fetch_assoc($result))
            {
               echo '<tr>
               <th scope="row">'.(string)$row['complaintNo'].'</th>
               <td>'.(string)$row['complaintDate'].'</td>
               <td>'.(string)$row['complaintText'].'</td>
               <td>'.(string)$row['wing'].'</td>
               <td>'.(string)$row['floor'].'</td>
               <td>'.$row['room'].'</td>
               <td>'.$row['complaintStatus'].'</td>
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
