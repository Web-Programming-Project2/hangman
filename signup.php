<?php
    //signup page for new users
    include("common.php");
    top();
?>

    <form action = "signup-submit.php" method = "post">
        <!--Form containing the fields: username, password, and confirm password -->
        <fieldset class = "column">
            <legend>New User Signup:</legend>

                <label class = "heading" for = "name">Username: </label>
                <input type = "text" name = "name" size = "16"> <br> <br>

                <label class = "heading" for = "pw">Password: </label>
                <input type = "text" name = "pw" size = "16"> <br> <br>

                <label class = "heading" for = "cpw">Confirm Password: </label>
                <input type = "text" name = "cpw" size = "16"> <br> <br>

            <!--Submit button -->
            <input type = "submit" value = "signup">
        </fieldset>
    </form>

</body>
</html>
