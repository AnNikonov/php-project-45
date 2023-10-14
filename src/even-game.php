<?php

namespace even\Game;

require_once "src/answer-checker.php";

use function cli\line;
use function cli\prompt;
use function answer\Checker\answerChecker;

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
            answerChecker($userAnswer, $correctanswer, $name);

        } elseif($randomNumber % 2 != 0) {
            $correctanswer = "no";
            answerChecker($userAnswer, $correctanswer, $name);
        }
    }
    line("Congratulations, %s!", $name);
}
