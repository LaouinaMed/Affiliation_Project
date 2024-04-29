<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240429113556 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE affiliate (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_597AA5CFA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE affiliate_link (id INT AUTO_INCREMENT NOT NULL, affiliate_id INT DEFAULT NULL, user_id INT DEFAULT NULL, link VARCHAR(255) NOT NULL, sales_count INT NOT NULL, plan1 DOUBLE PRECISION NOT NULL, plan2 DOUBLE PRECISION NOT NULL, plan3 DOUBLE PRECISION NOT NULL, plan4 DOUBLE PRECISION NOT NULL, plan5 DOUBLE PRECISION NOT NULL, plan6 DOUBLE PRECISION NOT NULL, plan7 DOUBLE PRECISION NOT NULL, plan8 DOUBLE PRECISION NOT NULL, INDEX IDX_4866744C9F12C49A (affiliate_id), INDEX IDX_4866744CA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commission (id INT AUTO_INCREMENT NOT NULL, affiliate_link_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE commission_total (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, affiliate_link_id INT NOT NULL, total_amount DOUBLE PRECISION NOT NULL, commission_requested TINYINT(1) NOT NULL, INDEX IDX_8C6EF3CDA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, price NUMERIC(10, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sale (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, visitor_identifier VARCHAR(255) NOT NULL, pricing_plans VARCHAR(255) NOT NULL, commissions_calculated TINYINT(1) NOT NULL, INDEX IDX_E54BC005A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sales (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, affiliate_link_id INT NOT NULL, amount NUMERIC(10, 2) NOT NULL, created_at DATETIME NOT NULL, unique_identifier VARCHAR(255) DEFAULT NULL, INDEX IDX_6B817044A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, phone_number VARCHAR(255) DEFAULT NULL, address VARCHAR(255) DEFAULT NULL, image VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE affiliate ADD CONSTRAINT FK_597AA5CFA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE affiliate_link ADD CONSTRAINT FK_4866744C9F12C49A FOREIGN KEY (affiliate_id) REFERENCES affiliate (id)');
        $this->addSql('ALTER TABLE affiliate_link ADD CONSTRAINT FK_4866744CA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE commission_total ADD CONSTRAINT FK_8C6EF3CDA76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE sale ADD CONSTRAINT FK_E54BC005A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE sales ADD CONSTRAINT FK_6B817044A76ED395 FOREIGN KEY (user_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE affiliate_link DROP FOREIGN KEY FK_4866744C9F12C49A');
        $this->addSql('ALTER TABLE affiliate DROP FOREIGN KEY FK_597AA5CFA76ED395');
        $this->addSql('ALTER TABLE affiliate_link DROP FOREIGN KEY FK_4866744CA76ED395');
        $this->addSql('ALTER TABLE commission_total DROP FOREIGN KEY FK_8C6EF3CDA76ED395');
        $this->addSql('ALTER TABLE sale DROP FOREIGN KEY FK_E54BC005A76ED395');
        $this->addSql('ALTER TABLE sales DROP FOREIGN KEY FK_6B817044A76ED395');
        $this->addSql('DROP TABLE affiliate');
        $this->addSql('DROP TABLE affiliate_link');
        $this->addSql('DROP TABLE commission');
        $this->addSql('DROP TABLE commission_total');
        $this->addSql('DROP TABLE product');
        $this->addSql('DROP TABLE sale');
        $this->addSql('DROP TABLE sales');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
