<?php
$input = "Hello";
$reversed = "";
for ($i = strlen($input) - 1; $i >= 0; $i--) {
    $reversed .= $input[$i];
}

echo "Input: \"$input\"\n";
echo "Output: \"$reversed\"";
?>
