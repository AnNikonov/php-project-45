<?php

namespace Engine;

require "./vendor/autoload.php";
//require "Games/even-game.php";

use function cli\line;
use function cli\prompt;
use function even\Game\makeEven;
use function progression\Game\progressGame;
use const even\Game\QUEST;

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

function makeCalc()
{
    $operators = ["+", "-", "*"];
    $operator = $operators[array_rand($operators)];
    $operand1 = rand(1,10);
    $operand2 = rand(1,10);

    switch ($operator) {
        case "+":
            $result = "$operand1 + $operand2";
            $correct = $operand1 + $operand2;
            break;
        case "-":
            $result = "$operand1 - $operand2";
            $correct = $operand1 - $operand2;
            break;
        case "*":
            $result = "$operand1 * $operand2";
            $correct = $operand1 * $operand2;
            break;
        default:
            $result = null;
            $correct = null;
            break;
    }

//    print_r(['test' => $result, 'correctAnswer' => $correct]);
    return ['type' =>'calc', 'test' => $result, 'correctAnswer' => $correct];

}



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

///getters
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