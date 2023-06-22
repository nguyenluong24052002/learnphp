<?php
for ($i = 1; $i <= 100; $i++) {
  if ($i % 2 == 0) { 
    echo "<div style='color:red'>" . $i . "</div><br>";
  } else {
    echo "<div style='color:blue'>" . $i . "</div><br>"; 
  }
}
