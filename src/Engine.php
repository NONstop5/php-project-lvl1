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

function showQuestion(string $question): void
{
    line("Question: {$question}");
}

function showOkText(): void
{
    line('Correct!');
}

function getAnswer(): string
{
    return prompt('Your answer');
}
