<!DOCTYPE html>
<html>

  <head>
      <meta charset="UTF-8">
      <div class="logo"></div>
      <title>Registration </title>
      <br>
      <h1>Registration</h1>
  </head>

  <body>

    <link rel="stylesheet" href="main.css">
    
    <div class = 'write'> 
        <h2>Register now for us to know you more !</h2>
        <br>
        <form method = "POST" action = "../Database_Insert_Script/Insert_Form.php"> <!action="/action_page.php" where action is the destination where form is send to >

            <! convert into POST method>

            <label for="first_name">First Name</label>
            <br>
            <input class = 'input' type="text" id="First_Name" name="First_Name">
            <br><br>
            
            <label for="last_name">Last Name</label>
            <br>
            <input class = 'input' type="text" id="Last_Name" name="Last_Name">
            <br><br>
            
            <label for="phone_no">Phone Number</label>
            <br>
            <input class = 'input' type="tel" id="Phone_Number" name="Phone_Number" placeholder="012-345678910" pattern="[0-9]{3}-[0-9]{10-11}" required>
            <br><br>
            
            <label for="email">Email</label>
            <br>
            <input class = 'input' type="email" id="Email" name="Email" placeholder="sample@email.com">
            <br><br>
            
            <label for="high_quali">Highest Academic Qualification</label>
            <br>
            <input class = 'input' type="text" id="HighestQualification" name="HighestQualification">
            <br><br>
            
            <label for="old_skul">Previous Education Instituition</label>
            <br>
            <input class = 'input' type="text" id="PreviousSchool" name="PreviousSchool">
            <br><br>

            <h3>
                How would you like us to inform you about the latest information ?
                <br>
            </h3>
          
            <select name="notify">
              <option value="Email">Email</option>
              <option value="SMS">SMS</option>
              <option value="Both">Email & SMS</option>
              <option value="None">None</option>
            </select>
            <br>
            <br>
            <h2>
                Data Protection Statement 
            </h2>

            <h3>
                Please tick:
            </h3>
            
            <input type="checkbox" id="protect" name="protect" value= true required>
            
            <label for="protection">
                I hereby agree to receive information from and about the University of Nottingham Malaysia's courses and events, in accordance with Data Protection Policy.
            </label> 
            
            <p>
                <a href="https://www.nottingham.edu.my/Utilities/DataProtection.aspx" target="_blank">Read Data Protection Policy</a>
            </p>
            
            <!--- submit button --->
            <input type="submit" value="Submit">

        </form>

    </div>

  </body>
    <br>
    <br>

</html>




