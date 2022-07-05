<?php

namespace BrainGames\Prime;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\game;

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function launchGame()
{
    $description = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $askQuestionGiveAnswer = function () {
        $num = rand(1, 100);
        $question = "{$num}";
        $correctAnswer = isPrime($num) ? 'yes' : 'no';

        return [ $question, $correctAnswer ];
    };

    game($description, $askQuestionGiveAnswer);
}
