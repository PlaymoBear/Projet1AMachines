<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200116140653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, default_desc LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE computer (id INT AUTO_INCREMENT NOT NULL, respo_id INT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, comment LONGTEXT DEFAULT NULL, ip_addr VARCHAR(255) NOT NULL, mac_addr VARCHAR(255) NOT NULL, location VARCHAR(255) NOT NULL, added_on DATE NOT NULL, retired_on DATE NOT NULL, last_check DATE NOT NULL, INDEX IDX_A298A7A6DCF84E11 (respo_id), INDEX IDX_A298A7A612469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json_array)\', first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A6DCF84E11 FOREIGN KEY (respo_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE computer ADD CONSTRAINT FK_A298A7A612469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A612469DE2');
        $this->addSql('ALTER TABLE computer DROP FOREIGN KEY FK_A298A7A6DCF84E11');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE computer');
        $this->addSql('DROP TABLE user');
    }
}
