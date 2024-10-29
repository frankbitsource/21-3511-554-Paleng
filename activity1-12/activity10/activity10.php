<?php
$number = 17;
$is_prime = true;
if ($number <= 1) {
    $is_prime = false;
} else {
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            $is_prime = false;
            break;
        }
    }
}

if ($is_prime) {
    echo "$number is a prime number.";
} else {
    echo "$number is not a prime number.";
}
?>
