<?php

namespace BrainGames\Progression;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\game;

function getProgression($start, $step, $length)
{
    $progression = [];
    for ($i = 0; $i < $length - 1; $i += 1) {
      array_push($progression, $start + $step * $i);
    }

    return $progression;
}

function generateQestion($progression, $index)
{
    $hiddenProgression = [...$progression];
    $hiddenProgression[$index] = '..';

    return implode(" ", $hiddenProgression);
}

function launchGame()
{
    $description = 'What number is missing in the progression?';

    $askQuestionGiveAnswer = function () {
        $progressionLength = 10;
        $firstElement = 0;
        $lastElement = $progressionLength - 2;
        $lastElementIndex = rand($firstElement, $lastElement);
        $progression = getProgression(rand(1, 50), rand(2, 5), $progressionLength);

        $question = generateQestion($progression, $lastElementIndex);
        $correctAnswer = (string) $progression[$lastElementIndex];

        return [ $question, $correctAnswer ];
    };

    game($description, $askQuestionGiveAnswer);
}
