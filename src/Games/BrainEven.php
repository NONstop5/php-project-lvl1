<?php

declare(strict_types=1);

namespace App\Games\BrainEven;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $booleanTextMap = [
        true => 'yes',
        false => 'no',
    ];

    $number = rand(0, MAX_NUMBER);

    $question = $number;
    $correctAnswer = $booleanTextMap[isEven($number)];

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ];
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
