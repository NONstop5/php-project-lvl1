<?php

declare(strict_types=1);

namespace App\Games\BrainEven;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function run(): void
{
    runGame(fn() => even(), GAME_DESCRIPTION);
}

function even(): array
{
    $booleanTextMap = [
        true => 'yes',
        false => 'no',
    ];

    $number = rand(0, MAX_NUMBER);
    $isEven = $number % 2 === 0;

    $question = $number;
    $correctAnswer = $booleanTextMap[$isEven];

    return [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ];
}
