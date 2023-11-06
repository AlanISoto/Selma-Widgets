<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231028224354 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE event (event_id INT AUTO_INCREMENT NOT NULL, intake_id INT DEFAULT NULL, sysuser_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, start_time DATETIME NOT NULL, end_time DATETIME NOT NULL, INDEX IDX_3BAE0AA7733DE450 (intake_id), INDEX IDX_3BAE0AA7BA29B9FB (sysuser_id), PRIMARY KEY(event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intake (intake_id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, PRIMARY KEY(intake_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE intake_sysuser (intake_sysuser_id INT AUTO_INCREMENT NOT NULL, intake_id INT NOT NULL, INDEX IDX_E1CEF3C0733DE450 (intake_id), PRIMARY KEY(intake_sysuser_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sysuser (sysuser_id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(sysuser_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7733DE450 FOREIGN KEY (intake_id) REFERENCES intake (intake_id)');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7BA29B9FB FOREIGN KEY (sysuser_id) REFERENCES sysuser (sysuser_id)');
        $this->addSql('ALTER TABLE intake_sysuser ADD CONSTRAINT FK_E1CEF3C0733DE450 FOREIGN KEY (intake_id) REFERENCES intake (intake_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7733DE450');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7BA29B9FB');
        $this->addSql('ALTER TABLE intake_sysuser DROP FOREIGN KEY FK_E1CEF3C0733DE450');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE intake');
        $this->addSql('DROP TABLE intake_sysuser');
        $this->addSql('DROP TABLE sysuser');
    }
}
