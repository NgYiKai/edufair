<?php
    $Student_First_Name = "David";
    $Student_Last_Name = "Smith";
    $Student_High_Qual = "A Level";
    $Student_Prev_School = "Taylor";
    $Student_M_Pref = "Email";

?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../design/StaffStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    // $(document).ready(function(){
    //     $("#div_refresh").load("ShowQueue.php");
    //     setInterval(function() {
    //         $("#div_refresh").load("ShowQueue.php");
    //     }, 500);
    // });

</script>
<body>
    <div class="container-Staff">
        <div class="wrap-table100cat">
            <button class="Staff-Name" style="float: left">Johnny Appleseed</label>
            <button class="LogOut" style="float: left">Log Out</button>
            <br><br><br><br>
            <button class="button-GetNext"style="float: right"><span>Get Next</span></button>
            <button class="button-Done"style="float: right;">Done</button>
            <br><br><br>
            <table>
                <colgroup>
                    <col class="columnleft"/>
                    <col/>
                </colgroup>
                <tbody>
                    <tr>
                        <th> First Name </th>
                        <td> <?php echo $Student_First_Name ?> </td>
                    </tr>
                    <tr>
                        <th> Last Name </th>
                        <td> <?php echo $Student_Last_Name ?> </td>
                    </tr>
                    <tr>
                        <th> Highest Qualification </th>
                        <td> <?php echo $Student_High_Qual ?> </td>
                    </tr>
                    <tr>
                        <th> Previous School </th>
                        <td> <?php echo $Student_Prev_School ?> </td>
                    </tr>
                    <tr>
                        <th> Marketing Preference </th>
                        <td> <?php echo $Student_M_Pref ?> </td>
                    </tr>
                </tbody>


            </table>
        </div>
    </div>
</body>
</html>