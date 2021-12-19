<?php

declare(strict_types=1);

namespace App\Games\BrainEven;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

function run(): void
{
    runGame('\App\Games\BrainEven\even');
}

function even(): array
{
    $booleanTextMap = [
        true => 'yes',
        false => 'no',
    ];

    $gameDescription = 'Answer "yes" if the number is even, otherwise answer "no".';

    $number = rand(0, MAX_NUMBER);
    $isEven = $number % 2 === 0;

    $question = $number;
    $correctAnswer = $booleanTextMap[$isEven];

    return [
        'gameDescription' => $gameDescription,
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}
