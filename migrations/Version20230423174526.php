<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423174526 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, plate_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6ADF66E98B (plate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plate (id INT AUTO_INCREMENT NOT NULL, allergies_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, INDEX IDX_719ED75B7104939B (allergies_id), INDEX IDX_719ED75B12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, domain VARCHAR(150) NOT NULL, year INT NOT NULL, grappes VARCHAR(255) NOT NULL, INDEX IDX_560C646812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ADF66E98B FOREIGN KEY (plate_id) REFERENCES plate (id)');
        $this->addSql('ALTER TABLE plate ADD CONSTRAINT FK_719ED75B7104939B FOREIGN KEY (allergies_id) REFERENCES allergies (id)');
        $this->addSql('ALTER TABLE plate ADD CONSTRAINT FK_719ED75B12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646812469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ADF66E98B');
        $this->addSql('ALTER TABLE plate DROP FOREIGN KEY FK_719ED75B7104939B');
        $this->addSql('ALTER TABLE plate DROP FOREIGN KEY FK_719ED75B12469DE2');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646812469DE2');
        $this->addSql('DROP TABLE allergies');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE plate');
        $this->addSql('DROP TABLE wine');
    }
}
