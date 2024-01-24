<?php

namespace prime\Game;

use function Engine\playGame;

const QUEST = 'Answer "yes" if given number is prime. Otherwise answer "no".';
function playPrime(): void
{
    $gameData = [];
    for ($i = 0; $i < 3; $i++) {
        $num = rand(1, 100);
        $correct = 'yes';

        for ($in = 2; $in < $num; $in++) {
            if ($num % $in == 0) {
                $correct = 'no';
            }
        }
        $gameData[] = ['test' => $num, 'correctAnswer' => $correct];
    }
    playGame($gameData, QUEST);
}
