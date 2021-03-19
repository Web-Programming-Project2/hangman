<?php
    //signup page for new users
    include("common.php");
    top();
?>

    <form action = "signup-submit.php" method = "post">
        <!--Form containing the fields: username, password, and confirm password -->
        <fieldset class = "column">
            <legend>New User Signup:</legend>

                <label class = "heading" for = "username">Username: </label>
                <input type = "text" name = "username" size = "16"> <br> <br>

                <label class = "heading" for = "password">Password: </label>
                <input type = "password" name = "password" size = "16"> <br> <br>

                <label class = "heading" for = "confirm">Confirm Password: </label>
                <input type = "password" name = "confirm" size = "16"> <br> <br>

            <!--Submit button -->
            <input type = "submit" value = "signup">
        </fieldset>
    </form>

</body>
</html>
