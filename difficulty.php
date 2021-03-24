<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="temp.css?<?php echo time(); ?>" />
    <title></title>
  </head>
  <body>
    <div id="circle" >
    <div class="a">
      <a href="home.php" id="back"> <- Back to home page</a>
    <div class="main">
      <?php
      $user =$_POST["username"];
      echo "Hello $user, choose your difficulty";
      echo "<br>";
      echo "<br>";
    
        $user = $_POST["username"];
        $pw = $_POST["password"];
        echo <<< ENDPAGE
        <!DOCTYPE html>
        <html>
          <head>
          </head>
        </html>
        <body>
        <form action= "Hangman.php" method="get" class="form">
            <label> easy </label>
            <input type="radio" name="level" value="easy">

            <label>medium</label>
            <input type="radio" name="level" value="medium">

            <label> hard </label>
            <input type="radio" name="level" value="hard">

            <label> expert </label>
            <input type="radio" name="level" value="expert">

            <input type="hidden" name="username" value= "$user"/>
            <input type="hidden" name="password" value= "$pw"/>
            <br>
            <br>
            <br>
            <input type = "submit" value = "Let's Play">
        </form>
        </body>
        ENDPAGE;

       ?>
  </div>
</div>
  </div>


  </body>
</html>
