<?php

declare(strict_types=1);

namespace App\Games\BrainProgression;

use function App\Engine\runGame;

const PROGRESSION_MIN_COUNT = 5;
const PROGRESSION_MAX_COUNT = 10;
const PROGRESSION_MIN_STEP = 1;
const PROGRESSION_MAX_STEP = 5;
const GAME_DESCRIPTION = 'What number is missing in the progression?';

function run(): void
{
    runGame(fn() => progression(), GAME_DESCRIPTION);
}

function progression(): array
{
    [
        'question' => $question,
        'correctAnswer' => $correctAnswer,
    ] = getProgressionData();

    return [
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function getProgressionData(): array
{
    $progressionCount = rand(PROGRESSION_MIN_COUNT, PROGRESSION_MAX_COUNT);
    $progressionStep = rand(PROGRESSION_MIN_STEP, PROGRESSION_MAX_STEP);
    $progressionMissingNumber = rand(1, $progressionCount);
    $progressionFirstElement = rand(1, ($progressionCount * PROGRESSION_MAX_STEP));

    $progression = getProgression($progressionFirstElement, $progressionStep, $progressionCount);
    $correctAnswer = getProgressionElement($progressionFirstElement, $progressionStep, $progressionMissingNumber);
    $progression[$progressionMissingNumber - 1] = '..';

    return [
        'question' => implode(' ', $progression),
        'correctAnswer' => $correctAnswer,
    ];
}

function getProgression(int $progressionFirstElement, int $progressionStep, int $progressionCount): array
{
    $progressionLastElement = getProgressionElement($progressionFirstElement, $progressionStep, $progressionCount);

    return range($progressionFirstElement, $progressionLastElement, $progressionStep);
}

function getProgressionElement(int $progressionFirstElement, int $progressionStep, int $elementNumber): int
{
    return $progressionFirstElement + ($elementNumber - 1) * $progressionStep;
}
