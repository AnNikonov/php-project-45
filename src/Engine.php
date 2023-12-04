<?php

namespace Engine;

require "./vendor/autoload.php";

use function cli\line;
use function cli\prompt;

function helloUser()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function answerChecker($userAnswer, $correctanswer, $name)
{
    if ($userAnswer == $correctanswer) {
        line("Correct!");
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctanswer\"");
        line("Let's try again, $name!");
        exit;
    }
}

function gcd($randomNumber1, $randomNumber2) {
    while ($randomNumber1 != $randomNumber2)
        if ($randomNumber1>$randomNumber2)
            $randomNumber1 -= $randomNumber2;
        else
            $randomNumber2 -= $randomNumber1;
    return $randomNumber1;
}
