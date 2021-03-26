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
    $userCheck = "$user||";
    $string = "$user||$score";

      // open file
        $fh = fopen("scores.txt", 'a') or die("can't open file");
        $file = file_get_contents("scores.txt");
        //no score found, add score
        if(!strstr($file, "$userCheck")){
            $newL = $string . "\n";
            fwrite($fh, $newL);
            echo "Score added";
        }else{
              while (true) {
                $str = fgets($fh);
                $arr = explode("",$str); //scores.txt player info
                // if no more lines to read break
                print_r($arr);
                if (!$str) {break;}
                    //if score is same break
                else if (strcmp($str,$string)==0) { break;}
                //if score is greater
                else if (strcmp($score,$arr[2])>0 && ($user == $arr[0])) {
                  $fh = $string;
                  echo "Score updated";
                  file_put_contents("scores.txt",$fh);
                  break;
                }
                // if score is less than
                else if (strcmp($score,$arr[1])<0 && ($user == $arr[0])){
                  break;
                }

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
            echo $data;
            echo "<br>";

        }

        fclose($file);
    ?>
        </div>
   </div>
 </div>
  </body>
</html>
