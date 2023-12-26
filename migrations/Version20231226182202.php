<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231226182202 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE children (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE education (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eyes (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE familly (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE hair (id INT AUTO_INCREMENT NOT NULL, lang VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE profile ADD familly_id INT DEFAULT NULL, CHANGE family_status lang VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F8D6893A3 FOREIGN KEY (familly_id) REFERENCES familly (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0F8D6893A3 ON profile (familly_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F8D6893A3');
        $this->addSql('DROP TABLE children');
        $this->addSql('DROP TABLE education');
        $this->addSql('DROP TABLE eyes');
        $this->addSql('DROP TABLE familly');
        $this->addSql('DROP TABLE hair');
        $this->addSql('DROP INDEX UNIQ_8157AA0F8D6893A3 ON profile');
        $this->addSql('ALTER TABLE profile DROP familly_id, CHANGE lang family_status VARCHAR(255) NOT NULL');
    }
}
