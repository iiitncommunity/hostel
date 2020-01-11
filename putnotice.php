<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php

    if(isset($_SESSION['type'])){
        
            echo '   
            <div class="overflow-auto">
                <form action="includes/putnotice.inc.php" method="POST" class="my-2" >';
        
      
                        echo'
                            <div class="text-bold text-success">
                                <h3>Add Notices : </h3>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                <input name="link" required type="text" class="form-control" id="rollnum" placeholder="Link to Notice">
                                </div>
                                <div class="col">
                                <input name="text" required type="text" class="form-control" id="rollnum" placeholder ="Text for notice">
                                </div>
                                
                            </div> <hr>

                           
                            <div class="col">
                                    <button type="submit" name="putnotice-btn" class="btn btn-danger">Submit</button>
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
