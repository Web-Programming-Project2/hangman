
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" type="text/css" href="temp.css?<?php echo time(); ?>" />
  </head>
  <body>
    <div id="circle" >
        <div class="a">
      <a href="login.php" id="back"> <- Back to Login</a>

      <div class="main">
<?php

require_once 'hangedman.php';




$words = array();
$hints = array();
$numwords = 0;


function printPage($image, $guesstemplate, $which, $guessed, $wrong, $score, $gameCount) {
  $user =$_GET["username"];
  echo "Player: $user";

  echo <<<ENDPAGE
<!DOCTYPE html>
<html>
  <head>
	<title>Hangman</title>
  </head>
</html>
<body>
  <h1>Hangman Game</h1>
  <br />
  <pre>$image</pre>
  <br />
  <p><strong>Word to guess: $guesstemplate</strong></p>
  <p>Letters used in guesses so far: $guessed</p>
  <form method="post" action="$script">
	<input type="hidden" name="wrong" value="$wrong" />
	<input type="hidden" name="lettersguessed" value="$guessed" />
	<input type="hidden" name="word" value="$which" />
  <input type="hidden" name="score" value="$score" />
  <input type="hidden" name="count" value="$gameCount" />
	<fieldset>
	  <legend>Your next guess</legend>
	  <input type="text" name="letter"  />
	  <input type="submit" value="Guess" />

	</fieldset>
  </form>
</body>
ENDPAGE;

global $hints;

$which =$_POST["word"];
$hint  = $hints[$which];
echo '<br>';
echo '<br>';
echo '<br>';
echo 'hint: ';
print_r($hint);
echo '<br>';
echo '<br>';

echo 'points: ';

echo $_POST['score'];
}

function loadWords() {
  global $words;
  global $numwords;
  global $file_name;
  global $hints;

   switch ($_GET['level']) {
     case 'easy':
       $file_name= 'easyWB';
       break;
    case 'medium':
      $file_name= 'medWB';
      break;
    case 'hard':
      $file_name= 'hardWB';
      break;
    case 'expert':
      $file_name= 'expertWB';
      break;
   }

  $input = fopen("$file_name.txt", "r");

  while (true) {
	  $str = fgets($input);
	  if (!$str) break;
	  $words[] = strtok($str," ");
    $temp = explode(" ", $str);
    array_shift($temp);
    $hints[] = implode(" ",$temp);
	  $numwords++;
  }
  fclose($input);
}
function repeatGame() {
  global $words;
  global $numwords;
  global $hang;

  $which = rand(0, $numwords - 1);
  $word =  $words[$which];
  $len = strlen($word);
  $guesstemplate = str_repeat('_ ', $len);
  $script = $_SERVER["PHP_SELF"];
  $points = $_POST['score'];
  $count =$_POST['count'];
  $count++;

  printPage($hang[0], $guesstemplate, $which, "", 0,$points,$count);
}
function startGame() {
  global $words;
  global $numwords;
  global $hang;


  $which = rand(0, $numwords - 1);
  $word =  $words[$which];
  $len = strlen($word);
  $guesstemplate = str_repeat('_ ', $len);
  $script = $_SERVER["PHP_SELF"];



  printPage($hang[0], $guesstemplate, $which, "", 0,0,1);
}

function killPlayer($word) {
  $user =$_GET["username"];
  $pw =$_GET["password"];
  $score = $_POST['score'];

  echo "$user you lost!";
  echo <<<ENDPAGE
<!DOCTYPE html>
<html>
 <head>
	<title>Hangman</title>
  </head>
  <body>
  <form action= "leaderboard.php" method="get" class="form">
	<p>$user the word you were trying to guess was $word.</p>
  <input type="hidden" name="username" value= "$user"/>
  <input type="hidden" name="password" value= "$pw"/>
  <input type="hidden" name="score" value= "$score"/>
  <br>
  <br>
  <br>
  <input type = "submit" value = "Check the leaderboard">
  </form>
  </body>
</html>
ENDPAGE;
}

function congratulateWinner($word) {
$user =$_GET["username"];
echo "Congrats, $user you guessed $word correctly! Lets play again!<br><br>";
$points = $_POST['score'];
$points++;
$_POST['score']= $points;
repeatGame();

}

function endGameWinner(){
  $user =$_GET["username"];
  $pw =$_GET["password"];
  $score = $_POST['score'];

  echo "Congrats $user you win this level!";
  echo <<<ENDPAGE
<!DOCTYPE html>
<html>
 <head>
	<title>Hangman</title>
  </head>
  <body>
  <form action= "leaderboard.php" method="get" class="form">
  <input type="hidden" name="username" value= "$user"/>
  <input type="hidden" name="password" value= "$pw"/>
  <input type="hidden" name="score" value= "$score"/>
  <br>
  <br>
  <br>
  <input type = "submit" value = "Check the leaderboard">
  </form>
  </body>
</html>
ENDPAGE;
}

function matchLetters($word, $guessedLetters) {
  $len = strlen($word);
  $guesstemplate = str_repeat("_ ", $len);
  $wordArr = str_split($word);
  $glet = str_split($guessedLetters);
  $gt = explode(" ", $guesstemplate);
  $l1 = count($wordArr);
  $l2= count($glet);

  for($i=0; $i < $l2 ; $i++) {
    for($j=0; $j < $l1 ; $j++) {
      if (strcmp($glet[$i],$wordArr[$j]) == 0){
        $gt[$j]= $glet[$i];
        $guesstemplate = implode(" ",$gt);

      }
    }
  }

  return $guesstemplate;
}

function handleGuess() {
  global $words;
  global $hang;


  $which = $_POST["word"];
  $word  = $words[$which];
  $wrong = $_POST["wrong"];
  $lettersguessed = $_POST["lettersguessed"];
  $guess = $_POST["letter"];
  $letter = $guess[0];
  $points = $_POST['score'];
  $count = $_POST['count'];
  $gameCount = count($words);

  if(!strstr($word, $letter)) {
	   $wrong++;
  }

  $lettersguessed = $lettersguessed . $letter;
  $guesstemplate = matchLetters($word, $lettersguessed);

  if ((!strstr($guesstemplate, "_")) && ($count!=$gameCount)) {
   	congratulateWinner($word);
  } else if (($wrong >= 6)) {
	   killPlayer($word);
  } else if((!strstr($guesstemplate, "_"))&& ($count==$gameCount) ){
    endGameWinner();
  }else {
  	printPage($hang[$wrong], $guesstemplate, $which, $lettersguessed, $wrong, $points,$count);
  }
}


loadWords();

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "POST") {
  handleGuess();
} else {
  startGame();
}



?>
</div>
</div>
</div>
</body>
</html>
