<?php

namespace gcd\Game;

use function Engine\gcd;
use function Engine\playGame;

const QUEST = 'Find the greatest common divisor of given numbers.';

function playGcd(): void
{
    $gameData = [];
    for ($i = 0; $i < 3; $i++) {
        $randomNumber1 = rand(1, 10);
        $randomNumber2 = rand(1, 10);
        $test = "$randomNumber1 $randomNumber2";
        $correctAnswer = gcd($randomNumber1, $randomNumber2);
        $gameData[] = ['test' => $test, 'correctAnswer' => $correctAnswer];
    }
    playGame($gameData, QUEST);
}
