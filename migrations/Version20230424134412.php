<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230424134412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE allergies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE categories (id INT AUTO_INCREMENT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(100) NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_3AF34668727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE images (id INT AUTO_INCREMENT NOT NULL, plate_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_E01FBE6ADF66E98B (plate_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, orders_capacity_id INT DEFAULT NULL, number INT NOT NULL, dates DATE NOT NULL, times TIME NOT NULL, tables INT NOT NULL, notes LONGTEXT DEFAULT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_E52FFDEEA76ED395 (user_id), INDEX IDX_E52FFDEE150F2420 (orders_capacity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE orders_capacity (id INT AUTO_INCREMENT NOT NULL, capacity INT NOT NULL, dates DATE NOT NULL, times TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE plate (id INT AUTO_INCREMENT NOT NULL, allergies_id INT DEFAULT NULL, category_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, description LONGTEXT NOT NULL, price INT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_719ED75B7104939B (allergies_id), INDEX IDX_719ED75B12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(150) NOT NULL, address VARCHAR(255) NOT NULL, zipcode VARCHAR(5) NOT NULL, city VARCHAR(255) NOT NULL, about_us LONGTEXT NOT NULL, stars INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, day VARCHAR(50) NOT NULL, am_open VARCHAR(5) NOT NULL, am_close VARCHAR(5) NOT NULL, pm_open VARCHAR(5) NOT NULL, pm_close VARCHAR(5) NOT NULL, INDEX IDX_6F949845B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, category_id INT DEFAULT NULL, name VARCHAR(150) NOT NULL, domain VARCHAR(150) NOT NULL, year INT NOT NULL, grappes VARCHAR(255) NOT NULL, price INT NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_560C646812469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE categories ADD CONSTRAINT FK_3AF34668727ACA70 FOREIGN KEY (parent_id) REFERENCES categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE images ADD CONSTRAINT FK_E01FBE6ADF66E98B FOREIGN KEY (plate_id) REFERENCES plate (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE orders ADD CONSTRAINT FK_E52FFDEE150F2420 FOREIGN KEY (orders_capacity_id) REFERENCES orders_capacity (id)');
        $this->addSql('ALTER TABLE plate ADD CONSTRAINT FK_719ED75B7104939B FOREIGN KEY (allergies_id) REFERENCES allergies (id)');
        $this->addSql('ALTER TABLE plate ADD CONSTRAINT FK_719ED75B12469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('ALTER TABLE time ADD CONSTRAINT FK_6F949845B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C646812469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE categories DROP FOREIGN KEY FK_3AF34668727ACA70');
        $this->addSql('ALTER TABLE images DROP FOREIGN KEY FK_E01FBE6ADF66E98B');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEEA76ED395');
        $this->addSql('ALTER TABLE orders DROP FOREIGN KEY FK_E52FFDEE150F2420');
        $this->addSql('ALTER TABLE plate DROP FOREIGN KEY FK_719ED75B7104939B');
        $this->addSql('ALTER TABLE plate DROP FOREIGN KEY FK_719ED75B12469DE2');
        $this->addSql('ALTER TABLE time DROP FOREIGN KEY FK_6F949845B1E7706E');
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C646812469DE2');
        $this->addSql('DROP TABLE allergies');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE orders');
        $this->addSql('DROP TABLE orders_capacity');
        $this->addSql('DROP TABLE plate');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE time');
        $this->addSql('DROP TABLE wine');
    }
}
