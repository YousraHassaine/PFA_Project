<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230701123655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE doctor (id INT NOT NULL, subscription_id INT NOT NULL, disponibilite TINYINT(1) NOT NULL, INDEX IDX_1FC0F36A9A1887DC (subscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT NOT NULL, assurance VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36A9A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id)');
        $this->addSql('ALTER TABLE doctor ADD CONSTRAINT FK_1FC0F36ABF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBBF396750 FOREIGN KEY (id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C26B899279');
        $this->addSql('ALTER TABLE notice ADD CONSTRAINT FK_480D45C26B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6499A1887DC');
        $this->addSql('DROP INDEX IDX_8D93D6499A1887DC ON user');
        $this->addSql('ALTER TABLE user DROP subscription_id, DROP disponibilite, DROP assurance, DROP date_naissance');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C26B899279');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36A9A1887DC');
        $this->addSql('ALTER TABLE doctor DROP FOREIGN KEY FK_1FC0F36ABF396750');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBBF396750');
        $this->addSql('DROP TABLE doctor');
        $this->addSql('DROP TABLE patient');
        $this->addSql('ALTER TABLE notice DROP FOREIGN KEY FK_480D45C26B899279');
        $this->addSql('ALTER TABLE notice ADD CONSTRAINT FK_480D45C26B899279 FOREIGN KEY (patient_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE user ADD subscription_id INT NOT NULL, ADD disponibilite TINYINT(1) DEFAULT NULL, ADD assurance VARCHAR(255) DEFAULT NULL, ADD date_naissance DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6499A1887DC FOREIGN KEY (subscription_id) REFERENCES subscription (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_8D93D6499A1887DC ON user (subscription_id)');
    }
}
