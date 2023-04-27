<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424135725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE favoris ADD PRIMARY KEY (IDUser, IDRessource)');
        $this->addSql('ALTER TABLE commentaire CHANGE ContenuCommentaire ContenuCommentaire VARCHAR(255) NOT NULL, CHANGE HeureCommentaire HeureCommentaire VARCHAR(255) NOT NULL, CHANGE DateCommentaire DateCommentaire DATE NOT NULL');
        $this->addSql('ALTER TABLE ressource CHANGE FichierRessource FichierRessource VARCHAR(255) DEFAULT NULL, CHANGE TypeRessource TypeRessource INT DEFAULT NULL, CHANGE CategorieRessource CategorieRessource INT DEFAULT NULL, CHANGE IDUserRessource IDUserRessource INT DEFAULT NULL, CHANGE LangueRessource LangueRessource INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE ValidationRGPD ValidationRGPD TINYINT(1) NOT NULL, CHANGE Roleuser Roleuser VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE commentaire CHANGE ContenuCommentaire ContenuCommentaire VARCHAR(255) DEFAULT NULL, CHANGE HeureCommentaire HeureCommentaire TIME DEFAULT NULL, CHANGE DateCommentaire DateCommentaire DATE DEFAULT NULL');
        $this->addSql('DROP INDEX `primary` ON Favoris');
        $this->addSql('ALTER TABLE ressource CHANGE FichierRessource FichierRessource VARCHAR(255) NOT NULL, CHANGE LangueRessource LangueRessource INT NOT NULL, CHANGE CategorieRessource CategorieRessource INT NOT NULL, CHANGE TypeRessource TypeRessource INT NOT NULL, CHANGE IDUserRessource IDUserRessource INT NOT NULL');
        $this->addSql('ALTER TABLE utilisateur CHANGE ValidationRGPD ValidationRGPD TINYINT(1) DEFAULT NULL, CHANGE Roleuser Roleuser VARCHAR(255) NOT NULL');
    }
}
