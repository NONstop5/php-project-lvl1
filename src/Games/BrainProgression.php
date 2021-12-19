<?php

declare(strict_types=1);

namespace App\Games\BrainProgression;

use function App\Engine\runGame;

const PROGRESSION_MIN_COUNT = 5;
const PROGRESSION_MAX_COUNT = 10;
const PROGRESSION_MIN_STEP = 1;
const PROGRESSION_MAX_STEP = 5;

function run(): void
{
    runGame('\App\Games\BrainProgression\progression');
}

function progression(): array
{
    $gameDescription = 'What number is missing in the progression?';

    [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ] = getProgressionData();

    return [
        'gameDescription' => $gameDescription,
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function getProgressionData(): array
{
    $numbers = [];
    $answerNumber = null;
    $progressionCount = rand(PROGRESSION_MIN_COUNT, PROGRESSION_MAX_COUNT);
    $progressionStep = rand(PROGRESSION_MIN_STEP, PROGRESSION_MAX_STEP);
    $progressionMissingNumber = rand(1, $progressionCount);
    $progressionStartValue = rand(1, ($progressionCount * PROGRESSION_MAX_STEP));

    $number = $progressionStartValue;

    for ($n = 1; $n <= $progressionCount; $n++) {
        if ($n === $progressionMissingNumber) {
            $numbers[] = '..';
            $answerNumber = $number;
        } else {
            $numbers[] = $number;
        }

        $number += $progressionStep;
    }

    return [
        'question' => implode(' ', $numbers),
        'correctAnswer' => $answerNumber,
    ];
}
