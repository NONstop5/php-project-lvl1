<?php

declare(strict_types=1);

namespace App\Engine;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;
const MAX_NUMBER = 100;

function exitWithText(string $answer, string $correctAnswer, string $name): void
{
    exit(
        "'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." .
        PHP_EOL . "Let's try again, {$name}!" . PHP_EOL
    );
}

function showCongratulation(string $name): void
{
    line("Congratulations, {$name}!");
}

function showQuestion(string $question): string
{
    line("Question: {$question}");

    return prompt('Your answer');
}

function showOkText(): void
{
    line('Correct!');
}

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function runGame(string $gameName): void
{
    $gameNameModuleMap = [
        'even' => '\App\Games\BrainEven\even',
        'calc' => '\App\Games\BrainCalc\calc',
        'gcd' => '\App\Games\BrainGcd\gcd',
        'progression' => '\App\Games\BrainProgression\progression',
        'prime' => '\App\Games\BrainPrime\prime',
    ];

    $name = welcome();

    $gameResult = $gameNameModuleMap[$gameName]();

    [$isGameResultSuccessful, $answer, $correctAnswer] = $gameResult;

    if ($isGameResultSuccessful) {
        showCongratulation($name);
    } else {
        line(
            "'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." .
            PHP_EOL . "Let's try again, {$name}!" . PHP_EOL
        );
    }
}
