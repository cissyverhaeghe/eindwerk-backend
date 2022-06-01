<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220601135905 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE breed ADD species_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE breed ADD CONSTRAINT FK_F8AF884FB2A1D860 FOREIGN KEY (species_id) REFERENCES species (id)');
        $this->addSql('CREATE INDEX IDX_F8AF884FB2A1D860 ON breed (species_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE breed DROP FOREIGN KEY FK_F8AF884FB2A1D860');
        $this->addSql('DROP INDEX IDX_F8AF884FB2A1D860 ON breed');
        $this->addSql('ALTER TABLE breed DROP species_id');
    }
}
