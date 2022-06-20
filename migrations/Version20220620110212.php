<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220620110212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal CHANGE neutered neutered TINYINT(1) DEFAULT NULL, CHANGE adopted adopted TINYINT(1) DEFAULT NULL');
        $this->addSql('DROP INDEX breed_name_uindex ON breed');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F8AF884F5E237E06 ON breed (name)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal CHANGE neutered neutered SMALLINT DEFAULT NULL, CHANGE adopted adopted SMALLINT DEFAULT NULL');
        $this->addSql('DROP INDEX uniq_f8af884f5e237e06 ON breed');
        $this->addSql('CREATE UNIQUE INDEX breed_name_uindex ON breed (name)');
    }
}
