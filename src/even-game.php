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
        
        if ($randomNumber % 2 == 0) {
            $correctanswer = "yes";
            if ($userAnswer == $correctanswer) {
                line("Correct!");
            } else {
                line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctanswer\"");
                line("Let's try again, $name!");
                exit;
            }
        } elseif($randomNumber % 2 != 0) {
            $correctanswer = "no";
            if ($userAnswer == $correctanswer) {
                line("Correct!");
            } else {
                line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctanswer\"");
                line("Let's try again, $name!");
                exit;
            }
        }
    }
    line("Congratulations, %s!", $name);
}
