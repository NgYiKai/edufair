<?php
    include('../config/database_connect.php');
    date_default_timezone_set("Asia/Kuala_Lumpur");
    $CurrentTime=date("Y-m-d H:i:s");
    $TIMEOUT=1; //Time to auto delete a request from queue
?>
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
                        <th>First_Name</th>
                        <th>Last_Name</th>
                        <th colspan="1">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql= "SELECT queue.Student_ID, student_personal_info.First_Name, student_personal_info.Last_Name, queue.session,queue.Queue_Num FROM student_personal_info INNER JOIN queue on queue.Student_ID=student_personal_info.Student_ID";
                        $result = mysqli_query($link, $sql);
                        $resultCheck = mysqli_num_rows($result);?>

                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <?php 
                                $dsql = "DELETE FROM queue where TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP,queue.session))>'$TIMEOUT'";
                                mysqli_query($link,$dsql);
                            ?>
                            <tr>
                                <td class=column1>  <?php echo $row['Queue_Num'];        ?></td>
                                <td>                <?php echo $row['First_Name'];      ?></td>
                                <td>                <?php echo $row['Last_Name'];       ?></td>
                                <td>
                                <a href= "ShowQueue.php?delete=<?php echo $row['Student_ID'];   ?>" class= btn btn-danger>Delete</a>
                                <a href= "ShowQueue.php?accept=<?php echo $row['Student_ID'];   ?>" class= btn btn-danger>Accept</a>
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
    header('Location: AdminQueue.php');
    exit;
    }
?>