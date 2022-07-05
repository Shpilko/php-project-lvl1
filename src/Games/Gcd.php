<?php

namespace BrainGames\Gcd;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\game;

function gcd(int $a, int $b)
{
    $i = $a;
    while ($a % $i !== 0 || $b % $i !== 0) {
        $i -= 1;
    }

    return $i;
}

function launchGame()
{
    $description = 'Find the greatest common divisor of given numbers.';

    $askQuestionGiveAnswer = function () {
        $num1 = rand(1, 100);
        $num2 = rand(1, 100);
        $question = "{$num1} {$num2}";
        $correctAnswer = (string) gcd($num1, $num2);

        return [ $question, $correctAnswer ];
    };

    game($description, $askQuestionGiveAnswer);
}
