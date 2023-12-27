<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231227091859 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE children ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE children ADD CONSTRAINT FK_A197B1BACCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('CREATE INDEX IDX_A197B1BACCFA12B8 ON children (profile_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE children DROP FOREIGN KEY FK_A197B1BACCFA12B8');
        $this->addSql('DROP INDEX IDX_A197B1BACCFA12B8 ON children');
        $this->addSql('ALTER TABLE children DROP profile_id');
    }
}
