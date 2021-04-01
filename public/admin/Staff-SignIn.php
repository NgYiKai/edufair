<?php
    session_start();
    // $_SESSION = array();
    $_SESSION['Staff_ID']=NULL;
    include('../../config/database_connect.php');
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="../../design/StaffStyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script>
    sessionStorage.setItem("AutoAssign", "Disabled");
    sessionStorage.setItem("Log", "");

</script>
<body>
    <div class="container-Staff">
        <div class="container-Signin-Main">
            <div class="Signin-Header">
                <label class="Signin-Title">Staff Login</label>
            </div>
            <form class="form-Signin" action="../../src/SignInCheck.php" method="post">

                <div class="container-Signin">
                    <label for="uname"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="uname" required>

                    <label for="psw"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="psw" required>

                    <button class="button-Signin" type="submit">Login</button>
                    <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                    </label>
                </div>
            </form>
        </div>
        

    </div>
</body>
</html>

