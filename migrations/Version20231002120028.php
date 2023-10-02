<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231002120028 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE enrollment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE enrollment (id INT NOT NULL, course_id INT DEFAULT NULL, student_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_DBDCD7E1591CC992 ON enrollment (course_id)');
        $this->addSql('CREATE INDEX IDX_DBDCD7E1CB944F1A ON enrollment (student_id)');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E1591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE enrollment ADD CONSTRAINT FK_DBDCD7E1CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE enrollment_id_seq CASCADE');
        $this->addSql('ALTER TABLE enrollment DROP CONSTRAINT FK_DBDCD7E1591CC992');
        $this->addSql('ALTER TABLE enrollment DROP CONSTRAINT FK_DBDCD7E1CB944F1A');
        $this->addSql('DROP TABLE enrollment');
    }
}
