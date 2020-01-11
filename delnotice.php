<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
        require 'includes/dbh.inc.php';
        $sql  = "SELECT * FROM notices";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '   
            <div class="overflow-auto">
                <form action="includes/updatenotice.inc.php" method="POST" class="my-2" >';
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Notice Links</th>
                <th scope="col">Notice Text</th>
                
              </tr>
            </thead>
            <tbody>';
           
            while($row =  mysqli_fetch_assoc($result))
            {
                $t = $row['noticetext'];
                echo '<tr>
               
                <td> <input name="'.$row['noticeid'].'link" required type="text" class="form-control" id="rollnum" value = "'.$row['noticelink'].'"></td>
                <td> <input name="'.$row['noticeid'].'text" required type="text" class="form-control" id="rollnum1" value = "'.$t.'"></td>

              </tr>';
             
            }
            echo '</tbody>
            </table> <div class="col">
           
            <button type="submit" name="notice-btn" class="btn btn-danger">Update</button>
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
