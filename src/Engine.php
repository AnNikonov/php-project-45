<?php

namespace Engine;

require "./vendor/autoload.php";
//require "Games/even-game.php";

use function cli\line;
use function cli\prompt;
use function even\Game\makeEven;
use function calc\Game\makeCalc;
use function progression\Game\progressGame;

///main game start function///
function playGame($gameData) {

    $name = helloUser();
    line(getQuest($gameData));

    for ($i = 0; $i < 3; $i++) {
        line("Question: %s", getTest($gameData));
        $userAnswer = prompt("Your answer");
        if (answerChecker($userAnswer, getCorrectAnswer($gameData), $name)) {
            switch (getType($gameData)) {
                case "calc":
                    $gameData = makeCalc();
                    break;
                case "progress":
                    $gameData = makeProgression();
                    break;
                case "even":
                    $gameData = makeEven();
                    break;
                case "gcd":
                    $gameData = makeGcd();
                    break;
                default:
                    $gameData = null;
                    break;
            }
        }
    }
    line("Congratulations, %s!", $name);
}

///help functions///
function helloUser()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function answerChecker($userAnswer, $correctAnswer, $name): bool
{
    if ($userAnswer == $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctAnswer\"");
        line("Let's try again, $name!");
        exit;
    }
}

function gcd($randomNumber1, $randomNumber2) {
    while ($randomNumber1 != $randomNumber2)
        if ($randomNumber1>$randomNumber2)
            $randomNumber1 -= $randomNumber2;
        else
            $randomNumber2 -= $randomNumber1;
    return $randomNumber1;
}

///getters///
function getTest ($gameData)
{
    return $gameData['test'];
}

function getType ($gameData)
{
    return $gameData['type'];
}

function getCorrectAnswer ($gameData)
{
    return $gameData['correctAnswer'];
}

function getQuest ($gameData)
{
    return $gameData['quest'];
}

function makeProgression($count = 10): array
{
    $beginNum = rand(1,10);
    $range = rand(1,10);

    $result = [$beginNum];

    for ($i = 1; $i <= $count; $i++) {
        $result[] = $result[$i - 1] + $range;
    }

    $rand = rand(0,$count);
    $correctNum = $result[$rand];
    $result[$rand] = '..';

    $result = implode(' | ', $result);

//    print_r (['test' => $result, 'correctAnswer' => $correctNum]);
    return ['type' =>'progress','test' => $result, 'correctAnswer' => $correctNum];
}







