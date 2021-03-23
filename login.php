
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="temp.css?<?php echo time(); ?>" />
 </head>
  </head>
  <body>
    <div id="circle" >
    <div class="a">
      <a href="home.php" id="back"> <- Back to home page</a>
    <div class="main">

      <?php
          //login page will use sessions
          include("common.php");
          top();
      ?>
          <form action = "difficulty.php" method = "post">
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
      </body>
      </html>

      <?php
          session_start();
          if(isset($_POST['submit'])){
              $username = $_POST['username'];
              $password = $_POST['password'];

              $file = file_get_contents("users.txt");
              if(!strstr($file, "$username||$password")){
                  echo "Invalid username or password";
              }else{
                  $_SESSION['user'] = $username;
                  $_SESSION['logged'] = "yes";
                  header("Location:Hangman.php");
              }
          }
      ?>
        </div>
      </div>
    </div>
  </body>
</html>
