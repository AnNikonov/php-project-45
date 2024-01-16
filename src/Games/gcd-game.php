<?php

namespace gcd\Game;

use function Engine\gcd;
const QUEST = 'What is the result of the expression?';

function makeGcd(): array
{

    $randomNumber1 = rand(1, 10);
    $randomNumber2 = rand(1, 10);
    $test = "$randomNumber1 $randomNumber2";
    $correctAnswer = gcd($randomNumber1, $randomNumber2);

    return ['quest' => QUEST, 'type' =>'gcd', 'test' => $test, 'correctAnswer' => $correctAnswer];
}