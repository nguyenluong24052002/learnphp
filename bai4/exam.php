<?php
echo "<table width='100%'>";
for ($i = 1; $i <= 10; $i++) {
  echo "<tr>";
  for ($j = 1; $j <= 9; $j++) {
    $result = $j * $i;
    echo "<td style='border: 1px solid black '>$j * $i = $result</td>";
  }
  echo "</tr>";
}
echo "</table>";

