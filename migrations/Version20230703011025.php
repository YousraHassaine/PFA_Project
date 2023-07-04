<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230703011025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
       // $this->addSql('DROP TABLE login');
        $this->addSql('ALTER TABLE appointment ADD doctor_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE appointment ADD CONSTRAINT FK_FE38F84487F4FB17 FOREIGN KEY (doctor_id) REFERENCES doctor (id)');
        $this->addSql('CREATE INDEX IDX_FE38F84487F4FB17 ON appointment (doctor_id)');
        $this->addSql('ALTER TABLE patient ADD appointment_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBE5B533F9 FOREIGN KEY (appointment_id) REFERENCES appointment (id)');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBE5B533F9 ON patient (appointment_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
       // $this->addSql('CREATE TABLE login (id INT AUTO_INCREMENT NOT NULL, login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, mot_de_passe VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE appointment DROP FOREIGN KEY FK_FE38F84487F4FB17');
        $this->addSql('DROP INDEX IDX_FE38F84487F4FB17 ON appointment');
        $this->addSql('ALTER TABLE appointment DROP doctor_id');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBE5B533F9');
        $this->addSql('DROP INDEX IDX_1ADAD7EBE5B533F9 ON patient');
        $this->addSql('ALTER TABLE patient DROP appointment_id');
    }
}
