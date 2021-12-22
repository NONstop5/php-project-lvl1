<?php

declare(strict_types=1);

namespace App\Games\BrainGcd;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'Find the greatest common divisor of given numbers.';

function run(): void
{
    runGame(fn() => gcd(), GAME_DESCRIPTION);
}

function gcd(): array
{
    [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ] = generateData();

    return [
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function generateData(): array
{
    $number1 = null;
    $number2 = null;
    $node = null;

    while ($node === null) {
        $number1 = rand(0, MAX_NUMBER);
        $number2 = rand(0, MAX_NUMBER);

        $node = getGreatestCommonDivisor($number1, $number2);
    }

    return [
        'question' => "{$number1} {$number2}",
        'correctAnswer' => $node,
    ];
}

function getGreatestCommonDivisor($number1, $number2): ?int
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
