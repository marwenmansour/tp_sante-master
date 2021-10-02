<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211002105552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dossier (id INT AUTO_INCREMENT NOT NULL, nombre_rdv INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE patient ADD dossier_id INT NOT NULL');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EB611C0C56 FOREIGN KEY (dossier_id) REFERENCES dossier (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EB611C0C56 ON patient (dossier_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EB611C0C56');
        $this->addSql('DROP TABLE dossier');
        $this->addSql('DROP INDEX UNIQ_1ADAD7EB611C0C56 ON patient');
        $this->addSql('ALTER TABLE patient DROP dossier_id');
    }
}
