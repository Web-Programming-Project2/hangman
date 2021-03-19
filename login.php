<?php
    //login page will use sessions
    include("common.php");
    top();
?>
    <form action = "login-validate.php" method = "post">
    <!--Form containing the the fields: username, password-->
        <fieldset class = column>
            <legend>Login:</legend>

                <label class = "heading" for = "username">Username: </label>
                <input type = "text" name = "username" size = "16"> <br> <br>

                <label class = "heading" for = "password">Password: </label>
                <input type = "password" name = "password" size = "16"> <br> <br>

            <!--Submit button-->
            <button name = "login">Login</button>
        </fieldset>
    </form>

    <?php
        if(@$_GET['Empty'] == true){
    ?>
        <div id = "alert">
            <?php
                echo $_GET['Empty']
            ?>
        </div>
    <?php
        }
    ?>
    
    <?php
        if(@$_GET['Invalid'] == true){
    ?>
        <div id = "alert">
            <?php
                echo $_GET['Invalid']
            ?>
        </div>
    <?php
        }
    ?>
</body>
</html>