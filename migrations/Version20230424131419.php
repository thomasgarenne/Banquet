<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424131419 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time DROP FOREIGN KEY FK_6F9498453256915B');
        $this->addSql('DROP INDEX IDX_6F9498453256915B ON time');
        $this->addSql('ALTER TABLE time CHANGE am_open am_open VARCHAR(5) NOT NULL, CHANGE am_close am_close VARCHAR(5) NOT NULL, CHANGE pm_open pm_open VARCHAR(5) NOT NULL, CHANGE pm_close pm_close VARCHAR(5) NOT NULL, CHANGE relation_id restaurant_id INT NOT NULL');
        $this->addSql('ALTER TABLE time ADD CONSTRAINT FK_6F949845B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_6F949845B1E7706E ON time (restaurant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time DROP FOREIGN KEY FK_6F949845B1E7706E');
        $this->addSql('DROP INDEX IDX_6F949845B1E7706E ON time');
        $this->addSql('ALTER TABLE time CHANGE am_open am_open VARCHAR(2) NOT NULL, CHANGE am_close am_close VARCHAR(2) NOT NULL, CHANGE pm_open pm_open VARCHAR(2) NOT NULL, CHANGE pm_close pm_close VARCHAR(2) NOT NULL, CHANGE restaurant_id relation_id INT NOT NULL');
        $this->addSql('ALTER TABLE time ADD CONSTRAINT FK_6F9498453256915B FOREIGN KEY (relation_id) REFERENCES restaurant (id)');
        $this->addSql('CREATE INDEX IDX_6F9498453256915B ON time (relation_id)');
    }
}
