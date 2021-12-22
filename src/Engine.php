<?php

declare(strict_types=1);

namespace App\Engine;

use Closure;

use function cli\line;
use function cli\prompt;

const ROUND_COUNT = 3;
const MAX_NUMBER = 100;

function runGame(Closure $getGameData, $gameDescription): void
{
    line('Welcome to the Brain Game!');
    $userName = prompt('May I have your name?');
    line("Hello, %s!", $userName);

    line($gameDescription);

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        [
            'question' => $question,
            'correctAnswer' => $correctAnswer,
        ] = $getGameData();

        line("Question: {$question}");

        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            exit(
                "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'." .
                PHP_EOL . "Let's try again, {$userName}!" . PHP_EOL
            );
        }

        line('Correct!');
    }

    line("Congratulations, {$userName}!");
}
