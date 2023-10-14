<?php

namespace calc\Game;

require "./src/Engine.php";

use function cli\line;
use function cli\prompt;
use function Engine\helloUser;
use function Engine\answerChecker;

function calcGame()
{
    $name = helloUser();
    line('What is the result of the expression?');
    $operators = ["+", "-", "*"];

    for ($i = 0; $i < 3; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $randomOperator = $operators[array_rand($operators)];
        line("Question: %s", $randomNumber1 . $randomOperator . $randomNumber2 );
        $userAnswer = prompt("Yuor answer");

        if ($randomOperator == "+") {
            $correctanswer = $randomNumber1 + $randomNumber2;
            answerChecker($userAnswer, $correctanswer, $name);
        } elseif ($randomOperator == "-") {
            $correctanswer = $randomNumber1 - $randomNumber2;
            answerChecker($userAnswer, $correctanswer, $name);
        } elseif ($randomOperator == "*") {
            $correctanswer = $randomNumber1 * $randomNumber2;
            answerChecker($userAnswer, $correctanswer, $name);
        }

    }
    line("Congratulations, %s!", $name);
}
