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

   <table>
    <?php

    $arr = array();

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
            echo '<br>';
        }else{
              while (true) {
                $str = fgets($fh);
                $arr = explode("||",$str); //scores.txt player info
                // if no more lines to read break

                if(!$str){break;}
                    //if score is same break
                if (strcmp($score,$arr[2])==0 && ($user == $arr[0])) {
                  echo $arr[2];
                  break;}
                //if score is greater
                else if (strcmp($score,$arr[2])>0 && ($user == $arr[0])) {
                  $fh = $string;
                  echo "Score updated";
                  echo "<br>";
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


            echo "<tr><th> Player</th> <th> score</th></tr>";


              $file = fopen("scores.txt", "r") or die("Unable to open file!");
              while (!feof($file)){
                  $data = fgets($file);
                  $scoreBoard = explode("||",$data);
                  echo "<tr><td> $scoreBoard[0]<td> $scoreBoard[1]</td></tr>";

              }
              fclose($file);
          ?>
        </table>
    </div>
   </div>
 </div>
  </body>
</html>
