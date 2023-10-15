<?php

namespace gcd\Game;

require "./src/Engine.php";

use function cli\line;
use function cli\prompt;
use function Engine\helloUser;
use function Engine\answerChecker;
use function Engine\gcd;

function gcdGame()
{
    $name = helloUser();
    line('What is the result of the expression?');

    for ($i = 0; $i < 3; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        line("Question: $randomNumber1 $randomNumber2" );
        $userAnswer = prompt("Yuor answer");
        $correctanswer = gcd($randomNumber1, $randomNumber2);
        answerChecker($userAnswer, $correctanswer, $name);
    }
    line("Congratulations, %s!", $name);
}
