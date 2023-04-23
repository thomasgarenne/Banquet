<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423170449 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, about_us LONGTEXT NOT NULL, stars INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time (id INT AUTO_INCREMENT NOT NULL, relation_id INT NOT NULL, day VARCHAR(50) NOT NULL, am_open TIME NOT NULL, am_close TIME NOT NULL, pm_open TIME NOT NULL, pm_close TIME NOT NULL, INDEX IDX_6F9498453256915B (relation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE time ADD CONSTRAINT FK_6F9498453256915B FOREIGN KEY (relation_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE user ADD firstname VARCHAR(150) NOT NULL, ADD lastname VARCHAR(150) NOT NULL, ADD phone VARCHAR(20) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE time DROP FOREIGN KEY FK_6F9498453256915B');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE time');
        $this->addSql('ALTER TABLE user DROP firstname, DROP lastname, DROP phone');
    }
}
