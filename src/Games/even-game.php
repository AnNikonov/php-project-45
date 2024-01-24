<?php

namespace even\Game;

use function Engine\playGame;

const QUEST = 'Answer "yes" if the number is even, otherwise answer "no".';

function playEven(): void
{
    $gameData = [];
    for ($i = 0; $i < 3; $i++) {
        $randNum = rand(1, 10);

        switch ($randNum % 2) {
            case 0:
                $correct = 'yes';
                break;
            case 1:
                $correct = 'no';
                break;
        }
        $gameData[] = ['test' => $randNum, 'correctAnswer' => $correct];
    }
    playGame($gameData, QUEST);
}
