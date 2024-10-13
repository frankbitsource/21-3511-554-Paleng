<?php
    $correctPassword = "password123"; 
    $inputPassword = "";  

    do {
        echo "Please enter your password: ";
        $inputPassword = trim(fgets(STDIN));  

       
        if ($inputPassword !== $correctPassword) {
            echo "Incorrect password. Try again.\n";
        }
    } while ($inputPassword !== $correctPassword);  

    echo "Access Granted.\n";
?>