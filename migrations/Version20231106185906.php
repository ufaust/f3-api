<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231106185906 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE person_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE person (id INT NOT NULL, father_id INT DEFAULT NULL, mother_id INT DEFAULT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, patronymic VARCHAR(255) DEFAULT NULL, alive BOOLEAN NOT NULL, martial_status VARCHAR(255) DEFAULT NULL, maiden_name VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, phone VARCHAR(255) DEFAULT NULL, birth_place VARCHAR(255) DEFAULT NULL, birth_day INT DEFAULT NULL, birth_month INT DEFAULT NULL, birth_year INT DEFAULT NULL, death_date DATE DEFAULT NULL, wedding_date DATE DEFAULT NULL, wedding_place VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_34DCD1762055B9A2 ON person (father_id)');
        $this->addSql('CREATE INDEX IDX_34DCD176B78A354D ON person (mother_id)');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD1762055B9A2 FOREIGN KEY (father_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE person ADD CONSTRAINT FK_34DCD176B78A354D FOREIGN KEY (mother_id) REFERENCES person (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE person_id_seq CASCADE');
        $this->addSql('ALTER TABLE person DROP CONSTRAINT FK_34DCD1762055B9A2');
        $this->addSql('ALTER TABLE person DROP CONSTRAINT FK_34DCD176B78A354D');
        $this->addSql('DROP TABLE person');
    }
}
