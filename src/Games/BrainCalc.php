<?php

declare(strict_types=1);

namespace App\Games\BrainCalc;

use function App\Engine\exitWithText;
use function App\Engine\showCongratulation;
use function App\Engine\showOkText;
use function App\Engine\showQuestion;
use function App\Cli\welcome;
use function cli\line;

use const App\Engine\MAX_NUMBER;
use const App\Engine\ROUND_COUNT;

function calc(): void
{
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
    $name = welcome();

    line('What is the result of the expression?');

    for ($i = 1; $i <= ROUND_COUNT; $i++) {
        $operand1 = rand(0, MAX_NUMBER);
        $operand2 = rand(0, MAX_NUMBER);
        $operatorNumber = rand(0, (count($operators) - 1));
        $operator = $operators[$operatorNumber];
        $expressionResult = $operations[$operatorNumber]($operand1, $operand2);

        $answer = showQuestion("{$operand1} {$operator} {$operand2}");

        if ($expressionResult === (int)$answer) {
            showOkText();
            continue;
        }

        exitWithText($answer, (string)$expressionResult, $name);
    }

    showCongratulation($name);
}
