<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106194725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE family_tree_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE family_tree (id INT NOT NULL, owner_id INT NOT NULL, aggregation_tree JSON DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C349FCF87E3C61F9 ON family_tree (owner_id)');
        $this->addSql('ALTER TABLE family_tree ADD CONSTRAINT FK_C349FCF87E3C61F9 FOREIGN KEY (owner_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person ADD tree_id INT NOT NULL');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD17678B64A2 FOREIGN KEY (tree_id) REFERENCES family_tree (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_34DCD17678B64A2 ON person (tree_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE person DROP CONSTRAINT FK_34DCD17678B64A2');
        $this->addSql('DROP SEQUENCE family_tree_id_seq CASCADE');
        $this->addSql('ALTER TABLE family_tree DROP CONSTRAINT FK_C349FCF87E3C61F9');
        $this->addSql('DROP TABLE family_tree');
        $this->addSql('DROP INDEX IDX_34DCD17678B64A2');
        $this->addSql('ALTER TABLE person DROP tree_id');
    }
}
