<?php

namespace prime\Game;

const QUEST = 'Answer "yes" if given number is prime. Otherwise answer "no"';
function makePrime(): array
{
    $num = rand(1,100);
    $correct = 'yes';

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i == 0) {
            $correct = 'no';
        }
    }

    return ['quest' => QUEST, 'type' => 'prime', 'test' => $num, 'correctAnswer' => $correct];
}
