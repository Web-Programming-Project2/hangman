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
  <p>Leaderboard!</p>
    <?php

    $user = $_GET["username"];
    $pw = $_GET["password"];
    $score = $_GET['score'];
    $userpass = "$user||$pw";
    $string = "$user||$pw||$score";
    print_r($score);

      // open file
        $fh = fopen("scores.txt", 'r+') or die("can't open file");
        $file = file_get_contents("scores.txt");
        while (true) {
          $str2 = fgets($fh);
          $arr = explode("||",$string); //current user info
          $arr2 = explode("||",$str2); //scores.txt player info
          // if no more lines to read break
          if (!$str2) {break;}

          //no score found, add score
          if(!strstr($file, "$userpass")){
              $newL = $string . "\n";
              fwrite($fh, $newL);
              echo "Score added";
              break;
            }
              //if score is same break
          else if (strncmp($str2,$string)==0) { break;}
          //if score is greater
          else if (strncmp($arr2[2],$arr[2])>0) {
            $fh = $string2;
            echo "Score updated";
            file_put_content("scores.txt",$fn);
            break;
          }
          // if score is less than
          else if (strncmp($arr2[2],$arr[2])<0){
            break;
          }


        fclose($fh);
        }


     ?>
        </div>
   </div>
 </div>
  </body>
</html>
