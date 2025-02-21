<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250221142315 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE statut_emprunt (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE exercice ADD promotion_id INT NOT NULL, ADD matiere_id INT NOT NULL, ADD professeur_id INT NOT NULL, ADD libelle VARCHAR(100) NOT NULL, ADD contenu VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74D139DF194 FOREIGN KEY (promotion_id) REFERENCES promotion (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE exercice ADD CONSTRAINT FK_E418C74DBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES professeur (id)');
        $this->addSql('CREATE INDEX IDX_E418C74D139DF194 ON exercice (promotion_id)');
        $this->addSql('CREATE INDEX IDX_E418C74DF46CD258 ON exercice (matiere_id)');
        $this->addSql('CREATE INDEX IDX_E418C74DBAB22EE9 ON exercice (professeur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE statut_emprunt');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74D139DF194');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DF46CD258');
        $this->addSql('ALTER TABLE exercice DROP FOREIGN KEY FK_E418C74DBAB22EE9');
        $this->addSql('DROP INDEX IDX_E418C74D139DF194 ON exercice');
        $this->addSql('DROP INDEX IDX_E418C74DF46CD258 ON exercice');
        $this->addSql('DROP INDEX IDX_E418C74DBAB22EE9 ON exercice');
        $this->addSql('ALTER TABLE exercice DROP promotion_id, DROP matiere_id, DROP professeur_id, DROP libelle, DROP contenu');
    }
}
