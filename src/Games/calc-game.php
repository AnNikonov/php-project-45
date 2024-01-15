<?php

namespace calc\Game;

require "./src/Engine.php";

use function cli\line;
use function cli\prompt;
use function Engine\helloUser;
use function Engine\answerChecker;
use function Engine\makeProgression;
use function Engine\playGame;
use function Engine\makeCalc;

const QUEST = 'What is the result of the expression?';
function calcGame()
{
    $gameData = [
        'type' => 'calc',
        'quest' => QUEST,
        'test' => [],
        'correctAnswer' => []
    ];

    $testData = makeCalc();
    $gameData['test'] = $testData['test'];
    $gameData['correctAnswer'] = $testData['correctAnswer'];

//    print_r($gameData);
    return $gameData;

}

playGame(calcGame());