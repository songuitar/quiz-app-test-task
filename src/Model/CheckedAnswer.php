<?php

namespace App\Model;

/**
 * @property string[] $answerKey
 */
class CheckedAnswer
{
    public function __construct(
        public array $answerKeys,
        public string $questionKey
    )
    {
    }
}