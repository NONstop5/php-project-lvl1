<?php

declare(strict_types=1);

namespace App\Games\BrainGcd;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $number1 = null;
    $number2 = null;
    $correctAnswer = null;

    while ($correctAnswer === null) {
        $number1 = rand(0, MAX_NUMBER);
        $number2 = rand(0, MAX_NUMBER);

        $correctAnswer = getGreatestCommonDivisor($number1, $number2);
    }

    return [
        'question' => "{$number1} {$number2}",
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function getGreatestCommonDivisor(int $number1, int $number2): ?int
{
    $maxNumber = $number1;
    $minNumber = $number2;

    if ($number2 > $number1) {
        $maxNumber = $number2;
        $minNumber = $number1;
    }

    for ($n = $minNumber; $n > 1; $n--) {
        if (($maxNumber % $n === 0) && ($minNumber % $n === 0)) {
            return $n;
        }
    }

    return null;
}
