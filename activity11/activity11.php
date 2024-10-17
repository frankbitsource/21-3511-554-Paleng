<?php
$first = 0;
$second = 1;
$count = 0;
$totalNumbers = 10;
echo "$first $second ";
while ($count < $totalNumbers - 2) {
    $next = $first + $second;
    echo "$next ";
    $first = $second;
    $second = $next;
    $count++;
}
?>
