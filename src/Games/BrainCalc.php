<?php

declare(strict_types=1);

namespace App\Games\BrainCalc;

use function App\Engine\runGame;

use const App\Engine\MAX_NUMBER;

const GAME_DESCRIPTION = 'What is the result of the expression?';

function run(): void
{
    runGame(fn() => generateData(), GAME_DESCRIPTION);
}

function generateData(): array
{
    $operators = [
        '+',
        '-',
        '*',
    ];

    $operand1 = rand(0, MAX_NUMBER);
    $operand2 = rand(0, MAX_NUMBER);
    $operatorIndex = array_rand($operators);
    $operator = $operators[$operatorIndex];

    $question = "{$operand1} {$operator} {$operand2}";
    $correctAnswer = calculate($operand1, $operator, $operand2);

    return [
        'question' => $question,
        'correctAnswer' => (string)$correctAnswer,
    ];
}

function calculate(int $operand1, string $operator, int $operand2): int
{
    switch ($operator) {
        case '+':
            return $operand1 + $operand2;
        case '-':
            return $operand1 - $operand2;
        default:
            return $operand1 * $operand2;
    }
}
