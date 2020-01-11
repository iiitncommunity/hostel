<?php
require 'header.php'
?>
<br>
<main class="jumbotron bg-light" style="text-align:center;">

<?php
    if(isset($_SESSION['type'])){
       echo '   
                    <div class="overflow-auto">
                        <form action="includes/leave.inc.php" method="POST" class="my-2" >
                            <div class="text-bold text-success">
                                <h3>Leave form : </h3>
                            </div><br>
                            <div class="row">
                                <div class="col">
                                <input name="l_rnum" type="text" class="form-control" id="rollnum" placeholder="Enrollment No.">
                                </div>
                                <div class="col">
                                <input name="l_email" type="email" class="form-control" id="email" placeholder="Email Id.">
                                </div>
                                <div class="col">
                                <input name="l_pwd" type="password" class="form-control" id="pwd" placeholder="Password">
                                </div>
                            </div> <hr>

                            <div class="row">
                                <div class="col">
                                    <p class="text-bold text-primary"> Reason of Leave : </p>
                                    <div class="form-group">
                                        <textarea name="reason" class="form-control" rows="2" id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-bold text-primary">Address where you will be staying?</p>
                                    <div class="form-group">
                                        <textarea name="address" class="form-control" rows="2" id="comment"></textarea>
                                    </div>
                                </div>
                               
                            </div> <hr>

                            <div class="row">
                                <div class="col">
                                    <p class="text-bold text-primary">Date of Leave : </p>
                                    <div class="col">
                                        <input type="date" name="leavedate">
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-bold text-primary">Time of Leave : </p>
                                    <div class="col">
                                        <input type="time" name="leavetime">
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-bold text-primary">Date of Arrival : </p>
                                    <div class="col">
                                        <input type="date" name="arrivaldate">
                                    </div>
                                </div>
                                <div class="col">
                                    <p class="text-bold text-primary">Time of Arrival : </p>
                                    <div class="col">
                                        <input type="time" name="arrivaltime">
                                    </div>
                                </div>
                                <div class="col">
                                    <label for="sel2"><b>Mess Status before leave:</b></label>
                                    <select class="form-control" id="sel2"  name="messL">
                                        <option value="B" selected>Will have breakfast</option>
                                        <option value="L">Will have Lunch</option>
                                        <option value="S">Will have Snacks</option>
                                        <option value="D">Will have Dinner</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="sel1"><b>Mess Status after arrival:</b></label>
                                    <select class="form-control" id="sel1"  name="messA">
                                        <option value="B" selected>Will have breakfast</option>
                                        <option value="L">Will have Lunch</option>
                                        <option value="S">Will have Snacks</option>
                                        <option value="D">Will have Dinner</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <p class="text-bold text-primary">Days on Vacation : </p>
                                    <div class="form-group">
                                        <input type="number" name="vacDays" class="form-control" id="vacationDays">
                                     </div>
                                </div>
                            </div> <hr>
                            <div class="col">
                                    <button type="submit" name="complaint-btn" class="btn btn-danger">Submit</button>
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
