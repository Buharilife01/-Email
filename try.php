<?php
$input = readline("Enter a number: ");

function access($age)
{
    if ($age < 18) {
        throw new Exception("You are not old enough to access this content.");
    } else {
        echo "Access granted.";
    }
}
function valid($age)
{
    if (!is_numeric($age)) {
        throw new Exception("Invalid input. Please enter a numeric value.");
    }
    return true;
}

try {
    access($input);
    valid($input);
} catch (\Exception $ex) {
    echo $ex->getMessage();
}
// mail();