<?php
$n = isset($_GET['n']) ? (int) $_GET['n'] : 10;

if ($n < 5 || $n > 20) {
  $n = 10;
  echo "Invalid value for n. Using default value of 10.";
}

echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo '</head>';
echo '<body>';

echo '<table>';
echo '<thead>';
echo '<tr>';
echo '<th></th>';

$randomArray = array();

for ($i = 0; $i < $n; $i++) {
  $randomNumber = rand(1, 99);
  array_push($randomArray, $randomNumber);
}

// headings
foreach ($randomArray as $value) {
    echo '<th>' . $value . '</th>';
}

echo '</tr>';
echo '</thead>';

echo '<tbody>';

foreach ($randomArray as $value1) {
  echo '<tr>';
  echo '<th>' . $value1 . '</th>';

  foreach ($randomArray as $value2) {
    $value = $value1 * $value2;
    $class = ($value % 2 == 0) ? "even" : "odd";
    echo '<td class="' . $class . '">' . $value . '</td>';
  }

  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo '</body>';
echo '</html>';
?>
