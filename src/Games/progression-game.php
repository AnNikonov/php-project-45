<?php

namespace progression\Game;

use function Engine\playGame;

const QUEST = 'What number is missing in the progression?';
function playProgression(int $count = 10): void
{
    for ($i = 0; $i < 3; $i++) {
        $beginNum = rand(1, 10);
        $range = rand(1, 10);

        $result = [$beginNum];

        for ($in = 1; $in <= $count; $in++) {
            $result[] = $result[$in - 1] + $range;
        }

        $rand = rand(0, $count);
        $correct = $result[$rand];
        $result[$rand] = '..';

        $result = implode(' ', $result);
        $gameData[] = ['test' => $result, 'correctAnswer' => $correct];
    }
    print_r($gameData);
    playGame($gameData, QUEST);
}
