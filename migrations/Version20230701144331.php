<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701144331 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE doctor ADD specialty_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9A353316 FOREIGN KEY (specialty_id) REFERENCES speciality (id)');
        $this->addSql('CREATE INDEX IDX_1FC0F36A9A353316 ON doctor (specialty_id)');
        $this->addSql('ALTER TABLE user ADD photp VARCHAR(30) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP photp');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36A9A353316');
        $this->addSql('DROP INDEX IDX_1FC0F36A9A353316 ON doctor');
        $this->addSql('ALTER TABLE doctor DROP specialty_id');
    }
}
