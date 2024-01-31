<?php

namespace App\Service;

use App\Entity\Answer;
use App\Entity\TestResult;
use App\Model\CheckedAnswer;
use App\Repository\QuestionRepository;

class AnswerValidator
{
    public function __construct(
        private readonly QuestionRepository $questionRepository
    )
    {
    }

    /**
     * @param CheckedAnswer[] $checkedAnswers
     * @return TestResult
     */
    public function validate(array $checkedAnswers): TestResult
    {
        $checkedAnswers = $this->groupByQuestionKey($checkedAnswers);
        $questions = $this->questionRepository->findBy(['id' => array_keys($checkedAnswers)]);

        $testResult = new TestResult();

        foreach ($questions as $question) {
            $checkedAnswersForQuestion = $checkedAnswers[(string)$question->getId()];

            $rightAnswerCount = 0;
            $wrongAnswerCount = 0;

            $pickedOptions = [];
            foreach ($question->getAnswerOptions() as $answerOption) {
                foreach ($checkedAnswersForQuestion as $checkedAnswerKey) {
                    if ($answerOption->key !== $checkedAnswerKey) {
                        continue;
                    }

                    $pickedOptions[] = $answerOption;
                    if ($answerOption->isCorrect) {
                        $rightAnswerCount++;
                    } else {
                        $wrongAnswerCount++;
                    }
                }
            }

            $testResult->addAnswer((new Answer())
                ->setCorrect($rightAnswerCount > 0 && $wrongAnswerCount === 0)
                ->setQuestionText($question->getQuestionText())
                ->setPickedOptions($pickedOptions));
        }

        return $testResult;
    }


    /**
     * @param CheckedAnswer[] $checkedAnswers
     * @return array<string[]>
     */
    private function groupByQuestionKey(array $checkedAnswers): array
    {
        $groupedAnswers = [];
        foreach ($checkedAnswers as $checkedAnswer) {
            if (!isset($groupedAnswers[$checkedAnswer->questionKey])) {
                $groupedAnswers[$checkedAnswer->questionKey] = [];
            }
            $groupedAnswers[$checkedAnswer->questionKey] = [...$groupedAnswers[$checkedAnswer->questionKey], ...$checkedAnswer->answerKeys];
        }
        return $groupedAnswers;
    }
}