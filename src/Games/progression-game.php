<?php

namespace progression\Game;

const QUEST = 'What number is missing in the progression?';
function makeProgression(int $count = 10): array
{
    $beginNum = rand(1, 10);
    $range = rand(1, 10);

    $result = [$beginNum];

    for ($i = 1; $i <= $count; $i++) {
        $result[] = $result[$i - 1] + $range;
    }

    $rand = rand(0, $count);
    $correct = $result[$rand];
    $result[$rand] = '..';

    $result = implode(' ', $result);

    return ['quest' => QUEST, 'type' => 'progress', 'test' => $result, 'correctAnswer' => $correct];
}
