<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240129151728 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (1, '1 + 1 = ', 2, '3,2,0')");
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (2, '2 + 2 = ', 4, '4,3 + 1,10')");
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (3, '3 + 3 = ', 6, '1 + 5,1,6,2 + 4')");
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (4, '4 + 4 = ', 8, '8,4,0,0 + 8')");
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (5, '5 + 5 = ', 10, '6,18,10,9,0')");
        $this->addSql("INSERT INTO public.question (id, question_text, correct_answer_value, answer_options) VALUES (6, '6 + 6 = ', 12, '3,9,0,12,5 + 7')");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DELETE * from public.question');
    }
}
