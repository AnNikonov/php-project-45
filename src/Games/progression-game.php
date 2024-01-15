<?php

namespace progression\Game;

require "./src/Engine.php";

use function cli\line;
use function cli\prompt;
use function Engine\helloUser;
use function Engine\answerChecker;
use function Engine\makeProgression;
use function Engine\playGame;

const QUEST = 'What number is missing in the progression?';
function progressGame ()
{
    $gameData = [
        'type' => 'progress',
        'quest' => QUEST,
        'test' => [],
        'correctAnswer' => []
    ];

    $testData = makeProgression();
    $gameData['test'] = $testData['test'];
    $gameData['correctAnswer'] = $testData['correctAnswer'];

//    print_r($gameData);
    return $gameData;


}

playGame(progressGame());