<?php

namespace App\DataFixtures;

use App\Entity\Question;
use App\Model\IndexedAnswerOption;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    public function load(ObjectManager $manager): void
    {
        $manager->persist((new Question())
            ->setQuestionText('Столица Великобритании')
            ->setAnswerOptions(
                [
                    new IndexedAnswerOption('1', 'Лондон', true),
                    new IndexedAnswerOption('2', 'Гамбург', false),
                    new IndexedAnswerOption('3', 'Париж', false),
                ]
            )
        );
        $manager->persist((new Question())
            ->setQuestionText('Длинна окружности')
            ->setAnswerOptions(
                [
                    new IndexedAnswerOption('1', '2 * Pi * R', true),
                    new IndexedAnswerOption('2', 'Pi * D', true),
                    new IndexedAnswerOption('3', 'Pi * R^2', false),
                ]
            )
        );
        $manager->persist((new Question())
            ->setQuestionText('7 + 2 =')
            ->setAnswerOptions(
                [
                    new IndexedAnswerOption('1', '4.5 + 4.5', true),
                    new IndexedAnswerOption('2', '7', false),
                    new IndexedAnswerOption('3', '2 + 8 - 2', false),
                ]
            )
        );

        $manager->flush();
    }
}
