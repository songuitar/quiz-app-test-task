<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131081032 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE answer_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE question_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE test_result_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE answer (id INT NOT NULL, test_result_id INT NOT NULL, picked_options JSON NOT NULL, question_text VARCHAR(255) NOT NULL, correct BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DADD4A25853A2189 ON answer (test_result_id)');
        $this->addSql('CREATE TABLE question (id INT NOT NULL, question_text VARCHAR(255) NOT NULL, answer_options JSON NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE test_result (id INT NOT NULL, conducted_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN test_result.conducted_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE answer ADD CONSTRAINT FK_DADD4A25853A2189 FOREIGN KEY (test_result_id) REFERENCES test_result (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE answer_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE question_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE test_result_id_seq CASCADE');
        $this->addSql('ALTER TABLE answer DROP CONSTRAINT FK_DADD4A25853A2189');
        $this->addSql('DROP TABLE answer');
        $this->addSql('DROP TABLE question');
        $this->addSql('DROP TABLE test_result');
    }
}
