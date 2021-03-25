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
    $score = $_GET['score'];
    $userpass = "$user||";
    $string = "$user||$score";
    print_r($score);

      // open file
        $fh = fopen("scores.txt", 'r+') or die("can't open file");
        $file = file_get_contents("scores.txt");
        while (true) {
          $str2 = fgets($fh);
          $arr = explode("||",$string); //current user info
          $arr2 = explode("",$str2); //scores.txt player info
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
          else if (strcmp($str2,$string)==0) { break;}
          //if score is greater
          else if (strcmp($arr2[2],$arr[2])>0) {
            $fh = $string2;
            echo "Score updated";
            file_put_contents("scores.txt",$fn);
            break;
          }
          // if score is less than
          else if (strcmp($arr2[2],$arr[2])<0){
            break;
          }


        fclose($fh);
        }


     ?>
      <?php
      //table to display leaderboard
        echo '<table border="1">';
        $file = fopen("scores.txt", "r") or die("Unable to open file!");
        while (!feof($file)){   
            $data = fgets($file); 
            echo "<tr><td>" . str_replace('||','</td><td>',$data) . '</td></tr>';
        }
        echo '</table>';
        fclose($file);
    ?>
        </div>
   </div>
 </div>
  </body>
</html>
