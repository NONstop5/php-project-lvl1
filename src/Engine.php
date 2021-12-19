<?php

declare(strict_types=1);

namespace App\Engine;

use Closure;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;
const MAX_NUMBER = 100;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);

    return $name;
}

function exitWithText(string $userAnswer, string $correctAnswer, string $userName): void
{
    exit(
        "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." .
        PHP_EOL . "Let's try again, {$userName}!" . PHP_EOL
    );
}

function runGame(Closure $gameName): void
{
    $userName = welcome();

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        [
            'gameDescription' => $gameDescription,
            'question' => $question,
            'correctAnswer' => $correctAnswer,
        ] = $gameName();

        line($gameDescription);

        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            exitWithText($userAnswer, $correctAnswer, $userName);
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}
