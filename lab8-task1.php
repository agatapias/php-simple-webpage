<?php

session_start();

// Set the range of numbers to guess from
if (isset($_POST['set_range'])) {
  $range = intval($_POST['range']);
  if ($range > 0) {
    $_SESSION['range'] = $range;
  }
}

// Draw a number
if (isset($_POST['draw_number'])) {
  if (isset($_SESSION['range'])) {
    $range = $_SESSION['range'];
    $_SESSION['number'] = rand(0, $range - 1);
    $_SESSION['guesses'] = 0;
  }
}

// Guess the number
if (isset($_POST['guess']) && is_numeric($_POST['guess'])) {
  $guess = intval($_POST['guess']);
  if (isset($_SESSION['number'])) {
    $number = $_SESSION['number'];
    if ($guess == $number) {
      echo "You guessed correctly! The number was $number.<br>";
      echo "Guessed on try {$_SESSION['guesses']}.";
      unset($_SESSION['number']);
    } elseif ($guess > $number) {
      echo "Your guess was too large.";
      $_SESSION['guesses']++;
    } elseif ($guess < $number) {
      echo "Your guess was too small.";
      $_SESSION['guesses']++;
    }
  }
} else if (isset($_POST['guess'])) {
    echo 'Please input a number as your guess.';
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Guessing Game</title>
</head>
<body>
  <h1>Guessing Game</h1>

  <?php
  if (isset($_POST['player_name'])) {
    echo "Player: {$_POST['player_name']}";
  }
  ?>

  <?php
if (isset($_SESSION['range'])) {
  echo "<p>Chosen range is: {$_SESSION['range']}</p>";
}
?>

<?php
if (isset($_SESSION['number'])) {
  echo "<p>Number of guesses: {$_SESSION['guesses']}</p>";
}
?>

<form action="" method="post">
  <label for="range">Set range:</label>
  <input type="number" name="range" id="range">
  <input type="submit" name="set_range" value="Set range">
</form>

<form action="" method="post">
  <input type="submit" name="draw_number" value="Draw number">
</form>

<form action="" method="post">
  <label for="guess">Make a guess:</label>
  <input type="number" name="guess" id="guess">
  <input type="submit" name="guessButton" value="Guess">
</form>

<a href="lab8-task3.php">List all cookies</a>
</body>
</html>
