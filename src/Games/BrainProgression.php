<?php

declare(strict_types=1);

namespace App\Games\BrainProgression;

use function App\Engine\exitWithText;
use function App\Engine\getAnswer;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function App\Games\Cli\welcome;
use function cli\line;

use const App\Engine\ROUND_COUNT;

function progression(): void
{
    $progressionMinCount = 5;
    $progressionMaxCount = 10;
    $progressionMinStep = 1;
    $progressionMaxStep = 5;

    $name = welcome();

    line('What number is missing in the progression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $numbers = [];
        $answerNumber = null;
        $progressionCount = rand($progressionMinCount, $progressionMaxCount);
        $progressionStep = rand($progressionMinStep, $progressionMaxStep);
        $progressionMissingNumber = rand(1, $progressionCount);
        $progressionStartValue = rand(1, ($progressionCount * $progressionMaxStep));

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

        $question = implode(' ', $numbers);

        showQuestion($question);
        $answer = getAnswer();

        if ($answerNumber === (int)$answer) {
            showOkText();
            continue;
        }

        exitWithText($answer, (string)$answerNumber, $name);
    }

    showCongratulation($name);
}
