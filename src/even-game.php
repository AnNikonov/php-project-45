<?php

namespace even\Game;

use function cli\line;
use function cli\prompt;

function evenGame()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < 3; $i++) {
        
        $randomNumber = rand(1,100);
        line("Question: %s", $randomNumber);
        $userAnswer = prompt("Yuor answer");
        
        if ($randomNumber % 2 == 0 && $userAnswer == "yes") {
            line("Correct!");
        } elseif($randomNumber % 2 != 0 && $userAnswer == "no") {
            line("Correct!");
        } else {
            line("Wrong");
            line("Try again");
            exit;
        }
    }
    line("Congratulations, %s!", $name);
}
