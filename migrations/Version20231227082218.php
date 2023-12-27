<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231227082218 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE children DROP FOREIGN KEY FK_A197B1BACCFA12B8');
        $this->addSql('DROP INDEX IDX_A197B1BACCFA12B8 ON children');
        $this->addSql('ALTER TABLE children DROP profile_id');
        $this->addSql('ALTER TABLE profile DROP INDEX UNIQ_8157AA0F8D6893A3, ADD INDEX IDX_8157AA0F8D6893A3 (familly_id)');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F2A89600A');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0F2CA1BD71');
        $this->addSql('ALTER TABLE profile DROP FOREIGN KEY FK_8157AA0FD9970B58');
        $this->addSql('DROP INDEX UNIQ_8157AA0F2CA1BD71 ON profile');
        $this->addSql('DROP INDEX UNIQ_8157AA0F2A89600A ON profile');
        $this->addSql('DROP INDEX UNIQ_8157AA0FD9970B58 ON profile');
        $this->addSql('ALTER TABLE profile DROP education_id, DROP hair_id, DROP eyes_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE children ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE children ADD CONSTRAINT FK_A197B1BACCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A197B1BACCFA12B8 ON children (profile_id)');
        $this->addSql('ALTER TABLE profile DROP INDEX IDX_8157AA0F8D6893A3, ADD UNIQUE INDEX UNIQ_8157AA0F8D6893A3 (familly_id)');
        $this->addSql('ALTER TABLE profile ADD education_id INT DEFAULT NULL, ADD hair_id INT DEFAULT NULL, ADD eyes_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F2A89600A FOREIGN KEY (hair_id) REFERENCES hair (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0F2CA1BD71 FOREIGN KEY (education_id) REFERENCES education (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE profile ADD CONSTRAINT FK_8157AA0FD9970B58 FOREIGN KEY (eyes_id) REFERENCES eyes (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0F2CA1BD71 ON profile (education_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0F2A89600A ON profile (hair_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8157AA0FD9970B58 ON profile (eyes_id)');
    }
}
