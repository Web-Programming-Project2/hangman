<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="hangman.css?<?php echo time(); ?>" />
    <title></title>
  </head>
  <body>
    <div class="main">

      <h1>Choose your difficulty</h1>
      <br>
      <br>
      <form action= "Hangman.php" method="get" class="form">
          <label> easy </label>
          <input type="radio" name="level" value="easy">

          <label>medium</label>
          <input type="radio" name="level" value="medium">

          <label> hard </label>
          <input type="radio" name="level" value="hard">

          <label> expert </label>
          <input type="radio" name="level" value="expert">
          <br>
          <br>
          <br>
          <input type = "submit" value = "Let's Play">
      </form>
  </div>
  </body>
</html>