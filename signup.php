<?php
    //signup page for new users
    include("common.php");
    top();
?>

    <form action = "signup.php" method = "post">
        <!--Form containing the fields: username and password -->
        <fieldset class = "column">
            <legend>New User Signup:</legend>

                <label class = "heading" for = "username">Username: </label>
                <input type = "text" name = "username" size = "16"> <br> <br>

                <label class = "heading" for = "password">Password: </label>
                <input type = "password" name = "password" size = "16"> <br> <br>

            <!--Submit button -->
            <input type = "submit" name = "submit" value = "signup">
        </fieldset>
    </form>

</body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $file = file_get_contents("users.txt");
        $string = "$username||$password";
        
        if(!strstr($file, "$string")){
            $myFile = "users.txt";
            $fh = fopen($myFile, 'a') or die("can't open file");
            $stringData = "$username||$password";
            $newLine = $stringData . "\n";
            fwrite($fh, $newLine);
            echo "Signup completed successfully";
            fclose($fh);
        }else{
            echo "Username already in use";
        }
    }
?>
