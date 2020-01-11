<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       
      require 'includes/dbh.inc.php';
       
        $sql  = "SELECT * FROM notices ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<table class="table">
            <thead>
              <tr>
                <th scope="col">Notices</th>
               
              </tr>
            </thead>
            <tbody>';
            while($row =  mysqli_fetch_assoc($result))
            {
               echo '<tr>
               
               <td> <a href='.$row['noticelink'].'>'.$row['noticetext'].'</a> '.'</td>
               
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

<br>
<?php
require 'footer.php'
?>
