<?php

declare(strict_types=1);

namespace App\Games\BrainProgression;

use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function cli\line;

use const App\Engine\ROUND_COUNT;

const PROGRESSION_MIN_COUNT = 5;
const PROGRESSION_MAX_COUNT = 10;
const PROGRESSION_MIN_STEP = 1;
const PROGRESSION_MAX_STEP = 5;

function progression(): array
{
    $isGameResultSuccessful = true;
    $answer = null;
    $correctAnswer = null;

    line('What number is missing in the progression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        [$progression, $correctAnswer] = getProgressionData();

        $answer = (int)showQuestion($progression);

        if ($correctAnswer === $answer) {
            showOkText();
            continue;
        }

        $isGameResultSuccessful = false;
        break;
    }

    return [
        $isGameResultSuccessful,
        $answer,
        $correctAnswer,
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
        implode(' ', $numbers),
        $answerNumber,
    ];
}
