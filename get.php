<!DOCTYPE html>
<html >
<head> 
    <title>Select</title>
    </head>
<body >
           
            <form method="get" class="form">	
                <select id="table" name="table" >
                    <option value="personal" >Personal Info</option>
                    <option value="contact">Contact Info</option>
                    <option value="add">Additional Info</option>	
                </select>  
                <input type="submit" name="button" value="Select" >
            </form>


    <?php
        
        if (!empty($_GET['table'])||isset($query)) {
            switch($_GET['table']){
                case 'personal':
                    echo '<form method="get" >
                    <input type="hidden" name="table2" value="personal">

                    <input type="checkbox" name="id" value="Student_ID">
                    <label > Student ID</label><br>

                    <input type="checkbox"  name="first" value="First_Name">
                    <label > First Name</label><br>

                    <input type="checkbox"  name="last" value="Last_Name">
                    <label > Last Name</label><br>  

                    <input type="checkbox"  name="last" value="Age">
                    <label > Age</label><br><br>

                   
                    <input type="submit" name="button" value="submit">
                    </form>';
                break; 
                
                case 'contact':
                    echo '<form method="get" >
                    <input type="hidden" name="table2" value="contact">

                    <input type="checkbox" name="id" value="Student_ID">
                    <label > Student ID</label><br>

                    <input type="checkbox"  name="phone" value="phone">
                    <label > Phone</label><br>

                    <input type="checkbox"  name="email" value="email">
                    <label > Email </label><br>  

                    <input type="submit" name="button" value="submit">
                    </form>';
                break;

                case 'add':
                    echo '<form method="get" >
                    <input type="hidden" name="table2" value="add">

                    <input type="checkbox" name="school" value="Previous_School">
                    <label > Previous School</label><br>

                    <input type="checkbox"  name="qualification" value="Highest_Qualification">
                    <label > Highest Qualification</label><br>

                    <input type="checkbox"  name="Preference" value="Marketing_Preference">
                    <label > Marketing Preference</label><br>  

    

                   
                    <input type="submit" name="button" value="submit">
                    </form>';

                
            }          
                  
        }

        if (!empty($_GET['table2'])){
            $conn=new mysqli('localhost','yk','abc123','education fair');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }     
            
            $query=$_GET['table2'];
            $columns='';
            $column_name=array();
            $i = 0;
            $len = count($_GET)-2;
            foreach ($_GET as $column){
                if ($column!=$_GET['button']&&$column!=$_GET['table2']){
                    if ($i != $len - 1){
                        $columns=$columns . $column.',';
                    }
                    else{
                        $columns=$columns . $column;
                    }
                    $column_name[]=$column;
                    $i++;
                }
                
            }

            $sql= "SELECT $columns FROM $query";
            $data_queryresult = $conn->query($sql);
            if ($data_queryresult->num_rows > 0) {

                echo "<table><tr>";
                for($counter=0,$i=0;$counter<count($column_name);$counter++){
                    echo "<th>".$column_name[$i]."</th>";
                    $i++;
                }   
                echo "</tr>";   
                
                while($row = $data_queryresult->fetch_assoc()) {
                    echo "<tr>";
                    for($counter=0,$i=0;$counter<count($column_name);$counter++){
                        echo "<td>".$row["$column_name[$i]"]."</td>";
                        $i++;
                    }   
                    echo "<tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }
            
            $conn->close();
        }
    ?>

</body>
</html>

