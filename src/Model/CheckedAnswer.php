<?php

namespace App\Model;

/**
 * @property string[] $answerKey
 */
class CheckedAnswer
{
    public function __construct(
        /**
         * @var string[] $answerKey
         */
        public array $answerKeys,
        public string $questionKey
    )
    {
    }
}