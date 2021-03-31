<?php
    include('../config/database_connect.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $CurrentTime=date("Y-m-d H:i:s");
    $TIMEOUT=1; //Time to auto delete a request from queue
?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="https://momentjs.com/downloads/moment.js"></script>
<script>
    var flag;

    var date_format ='DD-MM-YY h:mm:ss A';

    function log( errorType, errorMessage) {
        var initial_append_log = " [Undefined] : ";
        var now = new moment();
        var log = document.getElementById("Log");
        
        if(errorType == 1) {
            initial_append_log = " [Notice] : ";
        }
        if(errorType == 2) {
            initial_append_log = " [Prevention] : ";
        }
        if(errorType == 3) {
            initial_append_log = " [Error] : ";
        }
        if(errorType == 4) {
            initial_append_log = " [Action] : ";
        }

        log_Message = log_Message + "\r\n" + now.format(date_format) + initial_append_log + errorMessage;
        sessionStorage.setItem("Log", log_Message);
    }
    function log_SD_delete() {
        log(4,"Attempting to Delete A Student From Queue!");
    }
</script>
<!DOCTYPE html>
<html>
<div class="container-table100">
    <div class="wrap-table100cit">
        <div class="table100">
        <h6 style="font-size:30px;color:white;font-family:verdana"><b><center>Student Queue</center></b></h6>
        <br>
            <table>
                <thead>
                    <tr class="table100-head"> 
                        <th class="column1">Queue</th>
                        <th class="column2">First_Name</th>
                        <th class="column2">Last_Name</th>
                        <th class="column3" colspan="1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql= "SELECT queue.Student_ID, student_personal_info.First_Name, student_personal_info.Last_Name, queue.session,queue.Queue_Num FROM student_personal_info INNER JOIN queue on queue.Student_ID=student_personal_info.Student_ID";
                        $result = mysqli_query($link, $sql);
                        $resultCheck = mysqli_num_rows($result);?>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>

                            <tr>
                                <td class="column1n">  <?php echo $row['Queue_Num'];        ?></td>
                                <td class="column2">                <?php echo $row['First_Name'];      ?></td>
                                <td class="column2">                <?php echo $row['Last_Name'];       ?></td>
                                <td class="column3">
                                <a onClick = "log_SD_delete()" href= "../../src/ShowQueue.php?delete=<?php echo $row['Student_ID'];   ?>" class= btn btn-danger>Delete</a>
                                </td>
                            </tr>  
                        <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</html>

<?php
    if (isset( $_GET['delete'])) {
    $links = mysqli_connect("localhost", "root", "", $Database_Name);
    // Check connection
    if($links === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $Student_IDs=  $_GET['delete'];

    // Attempt insert query execution
    $sqls = "DELETE FROM queue WHERE Student_ID='$Student_IDs'";


    if(mysqli_query($links, $sqls)){
    echo "Records added successfully.";
    } else{
    echo "ERROR: Could not able to execute $sqls. " . mysqli_error($link);
    }
    header('Location: ../public/admin/AdminQueue.php');
    exit;
    }
?>