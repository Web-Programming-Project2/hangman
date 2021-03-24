
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" type="text/css" href="temp.css?<?php echo time(); ?>" />
  </head>
  <body>

    <div id="circle" >
    <div class="a">
      <a href="home.php" id="back"> <- Back to home page</a>
    <div class="main">


<?php
    //signup page for new users
    include("common.php");
    top();
?>

    <form action = "signup.php" method = "post" >
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
            echo <<< ENDPAGE
            <!DOCTYPE html>
            <html>
              <head>
              </head>
            </html>
            <body>
            <form action="difficulty.php" method= "post">
              <input type="hidden" name="username" value= "$username"/>
                <input type="hidden" name="password" value= "$password"/>
                <input type="submit"name = "submit" value = "next">
            </form>
            </body>
            ENDPAGE;
        }else{
            echo "Username already in use";
        }
    }
?>
    </div>
  </div>
</div>
  </body>
</html>
