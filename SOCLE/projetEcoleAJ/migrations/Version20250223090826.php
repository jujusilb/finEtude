<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250223090826 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut_ouvrage (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE ouvrage ADD statut_ouvrage_id INT NOT NULL, DROP statut');
        $this->addSql('ALTER TABLE ouvrage ADD CONSTRAINT FK_52A8CBD8601389BC FOREIGN KEY (statut_ouvrage_id) REFERENCES statut_ouvrage (id)');
        $this->addSql('CREATE INDEX IDX_52A8CBD8601389BC ON ouvrage (statut_ouvrage_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE ouvrage DROP FOREIGN KEY FK_52A8CBD8601389BC');
        $this->addSql('DROP TABLE statut_ouvrage');
        $this->addSql('DROP INDEX IDX_52A8CBD8601389BC ON ouvrage');
        $this->addSql('ALTER TABLE ouvrage ADD statut VARCHAR(255) NOT NULL, DROP statut_ouvrage_id');
    }
}
