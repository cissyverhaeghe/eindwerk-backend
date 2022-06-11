<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220610103248 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptionrequest ADD animal_id INT NOT NULL, ADD user_id INT NOT NULL, ADD status_id INT NOT NULL');
        $this->addSql('ALTER TABLE adoptionrequest ADD CONSTRAINT FK_37E7B1978E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('ALTER TABLE adoptionrequest ADD CONSTRAINT FK_37E7B197A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE adoptionrequest ADD CONSTRAINT FK_37E7B1976BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_37E7B1978E962C16 ON adoptionrequest (animal_id)');
        $this->addSql('CREATE INDEX IDX_37E7B197A76ED395 ON adoptionrequest (user_id)');
        $this->addSql('CREATE INDEX IDX_37E7B1976BF700BD ON adoptionrequest (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE adoptionrequest DROP FOREIGN KEY FK_37E7B1978E962C16');
        $this->addSql('ALTER TABLE adoptionrequest DROP FOREIGN KEY FK_37E7B197A76ED395');
        $this->addSql('ALTER TABLE adoptionrequest DROP FOREIGN KEY FK_37E7B1976BF700BD');
        $this->addSql('DROP INDEX IDX_37E7B1978E962C16 ON adoptionrequest');
        $this->addSql('DROP INDEX IDX_37E7B197A76ED395 ON adoptionrequest');
        $this->addSql('DROP INDEX IDX_37E7B1976BF700BD ON adoptionrequest');
        $this->addSql('ALTER TABLE adoptionrequest DROP animal_id, DROP user_id, DROP status_id');
    }
}
