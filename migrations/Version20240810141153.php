<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240810141153 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist DROP type');
        $this->addSql('ALTER TABLE score_artist DROP FOREIGN KEY FK_E283D15912EB0A51');
        $this->addSql('ALTER TABLE score_artist DROP FOREIGN KEY FK_E283D159B7970CF8');
        $this->addSql('ALTER TABLE score_artist ADD id INT AUTO_INCREMENT NOT NULL, ADD type VARCHAR(255) NOT NULL, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE score_artist ADD CONSTRAINT FK_E283D15912EB0A51 FOREIGN KEY (score_id) REFERENCES score (id)');
        $this->addSql('ALTER TABLE score_artist ADD CONSTRAINT FK_E283D159B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist ADD type VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE score_artist MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE score_artist DROP FOREIGN KEY FK_E283D15912EB0A51');
        $this->addSql('ALTER TABLE score_artist DROP FOREIGN KEY FK_E283D159B7970CF8');
        $this->addSql('DROP INDEX `PRIMARY` ON score_artist');
        $this->addSql('ALTER TABLE score_artist DROP id, DROP type');
        $this->addSql('ALTER TABLE score_artist ADD CONSTRAINT FK_E283D15912EB0A51 FOREIGN KEY (score_id) REFERENCES score (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE score_artist ADD CONSTRAINT FK_E283D159B7970CF8 FOREIGN KEY (artist_id) REFERENCES artist (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE score_artist ADD PRIMARY KEY (score_id, artist_id)');
    }
}
