<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\game;

function isEven($num)
{
    return $num % 2 === 0 ?: false;
}



function launchGame()
{
    $description = 'Answer "yes" if the number is even, otherwise answer "no".';

    $askQuestionGiveAnswer = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';
        
        return [ $question, $correctAnswer ];
    };

    game($description, $askQuestionGiveAnswer);
}
