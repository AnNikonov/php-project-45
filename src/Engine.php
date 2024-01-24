<?php

namespace Engine;

require __DIR__ . "/../vendor/autoload.php";

use function cli\line;
use function cli\prompt;

///main game start function///
function playGame(array $gameData, $quest): void
{

    $name = helloUser();
    line($quest);

    foreach ($gameData as $round) {
        line("Question: %s", getTest($round));
        $userAnswer = prompt("Your answer");
        if (!answerChecker($userAnswer, getCorrectAnswer($round), $name)) {
            return;
        }
        line("Congratulations, %s!", $name);
    };
}

///help functions///
function helloUser(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}

function answerChecker(string $userAnswer, string $correctAnswer, string $name): bool
{
    if ($userAnswer == $correctAnswer) {
        line("Correct!");
        return true;
    } else {
        line("\"$userAnswer\", is wrong answer ;(. Correct answer was \"$correctAnswer\"");
        line("Let's try again, $name!");
        return false;
    }
}

function gcd(int $randomNumber1, int $randomNumber2)
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
function getTest(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('test', $gameData)) {
        return $gameData['test'];
    } else {
        return null;
    }
}

function getType(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('type', $gameData)) {
        return $gameData['type'];
    } else {
        return null;
    }
}

function getCorrectAnswer(array|null $gameData)
{
    if ($gameData !== null && array_key_exists('correctAnswer', $gameData)) {
        return $gameData['correctAnswer'];
    } else {
        return null;
    }
}

function getQuest(array $gameData)
{
    return $gameData['quest'];
}
