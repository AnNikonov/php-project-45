<?php

namespace Engine;

require __DIR__ . "/../vendor/autoload.php";

use function cli\line;
use function cli\prompt;
use function even\Game\makeEven;
use function calc\Game\makeCalc;
use function prime\Game\makePrime;
use function progression\Game\makeProgression;
use function gcd\Game\makeGcd;

///main game start function///
function playGame($gameData): void
{

    $name = helloUser();
    line(getQuest($gameData));

    for ($i = 0; $i < 3; $i++) {
        line("Question: %s", getTest($gameData));
        $userAnswer = prompt("Your answer");
        if (answerChecker($userAnswer, getCorrectAnswer($gameData), $name)) {
            $gameData = match (getType($gameData)) {
                "calc" => makeCalc(),
                "progress" => makeProgression(),
                "even" => makeEven(),
                "gcd" => makeGcd(),
                "prime" => makePrime(),
                default => null,
            };
        }
    }
    line("Congratulations, %s!", $name);
}

///help functions///
function helloUser(): string
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

function gcd($randomNumber1, $randomNumber2)
{
    while ($randomNumber1 != $randomNumber2) {
        if ($randomNumber1 > $randomNumber2) {
            $randomNumber1 -= $randomNumber2;
        } else {
            $randomNumber2 -= $randomNumber1;
        }
    }
    return $randomNumber1;
}

///getters///
function getTest($gameData)
{
    return $gameData['test'];
}

function getType($gameData)
{
    return $gameData['type'];
}

function getCorrectAnswer($gameData)
{
    return $gameData['correctAnswer'];
}

function getQuest($gameData)
{
    return $gameData['quest'];
}
