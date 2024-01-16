<?php

namespace even\Game;

const QUEST = 'Answer "yes" if the number is even, otherwise answer "no".';

function makeEven(): array
{
    $randNum = rand(1,10);

    switch ($randNum) {
        case $randNum % 2 == 0:
            $correct = 'yes';
            break;
        case $randNum % 2 != 0:
            $correct = 'no';
            break;
    }

    return ['quest' => QUEST, 'type' =>'even', 'test' => $randNum, 'correctAnswer' => $correct];
}

