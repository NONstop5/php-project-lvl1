<?php

declare(strict_types=1);

namespace App\Games\BrainProgression;

use function App\Cli\welcome;
use function App\Engine\exitWithText;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function cli\line;

use const App\Engine\ROUND_COUNT;

const PROGRESSION_MIN_COUNT = 5;
const PROGRESSION_MAX_COUNT = 10;
const PROGRESSION_MIN_STEP = 1;
const PROGRESSION_MAX_STEP = 5;

function progression(): void
{
    $name = welcome();

    line('What number is missing in the progression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        [$progression, $correctAnswer] = getProgressionData();

        $answer = showQuestion($progression);

        if ($correctAnswer === (int)$answer) {
            showOkText();
            continue;
        }

        exitWithText($answer, (string)$correctAnswer, $name);
    }

    showCongratulation($name);
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
