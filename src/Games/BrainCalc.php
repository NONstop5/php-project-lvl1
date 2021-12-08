<?php

declare(strict_types=1);

namespace App\Games\BrainCalc;

use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function calc(): array
{
    $isGameResultSuccessful = true;
    $answer = null;
    $correctAnswer = null;

    $operators = [
        '+',
        '-',
        '*',
    ];
    $operations = [
        fn($operand1, $operand2) => $operand1 + $operand2,
        fn($operand1, $operand2) => $operand1 - $operand2,
        fn($operand1, $operand2) => $operand1 * $operand2,
    ];

    line('What is the result of the expression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $operand1 = rand(0, MAX_NUMBER);
        $operand2 = rand(0, MAX_NUMBER);
        $operatorNumber = rand(0, (count($operators) - 1));
        $operator = $operators[$operatorNumber];
        $expressionResult = $operations[$operatorNumber]($operand1, $operand2);

        $answer = (int)showQuestion("{$operand1} {$operator} {$operand2}");
        $correctAnswer = $expressionResult;

        if ($expressionResult === $answer) {
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
