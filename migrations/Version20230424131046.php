<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424131046 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time CHANGE am_open am_open VARCHAR(2) NOT NULL, CHANGE am_close am_close VARCHAR(2) NOT NULL, CHANGE pm_open pm_open VARCHAR(2) NOT NULL, CHANGE pm_close pm_close VARCHAR(2) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time CHANGE am_open am_open TIME NOT NULL, CHANGE am_close am_close TIME NOT NULL, CHANGE pm_open pm_open TIME NOT NULL, CHANGE pm_close pm_close TIME NOT NULL');
    }
}
