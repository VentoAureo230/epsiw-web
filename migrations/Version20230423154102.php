<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230423154102 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bde (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, logo_url VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, bde_name_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATETIME NOT NULL, cost INT NOT NULL, is_passed TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_3BAE0AA7CDBA5C36 (bde_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goodies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, nbr_on_merch INT NOT NULL, cost INT NOT NULL, tva INT NOT NULL, is_closed TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE media (id INT AUTO_INCREMENT NOT NULL, bde_name_id INT DEFAULT NULL, event_name_id INT DEFAULT NULL, goodies_id_id INT DEFAULT NULL, url VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_6A2CA10CCDBA5C36 (bde_name_id), UNIQUE INDEX UNIQ_6A2CA10CF4403579 (event_name_id), UNIQUE INDEX UNIQ_6A2CA10CCCE72FF7 (goodies_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `member` (id INT AUTO_INCREMENT NOT NULL, bde_name_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, phone_number INT NOT NULL, mail VARCHAR(255) NOT NULL, is_already_in TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_70E4FA78CDBA5C36 (bde_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modify (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, is_verified TINYINT(1) NOT NULL, is_admin TINYINT(1) NOT NULL, is_registered TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_bde (user_id INT NOT NULL, bde_id INT NOT NULL, INDEX IDX_634D9CA3A76ED395 (user_id), INDEX IDX_634D9CA3DB4C56C (bde_id), PRIMARY KEY(user_id, bde_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7CDBA5C36 FOREIGN KEY (bde_name_id) REFERENCES bde (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CCDBA5C36 FOREIGN KEY (bde_name_id) REFERENCES goodies (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CF4403579 FOREIGN KEY (event_name_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE media ADD CONSTRAINT FK_6A2CA10CCCE72FF7 FOREIGN KEY (goodies_id_id) REFERENCES goodies (id)');
        $this->addSql('ALTER TABLE `member` ADD CONSTRAINT FK_70E4FA78CDBA5C36 FOREIGN KEY (bde_name_id) REFERENCES bde (id)');
        $this->addSql('ALTER TABLE user_bde ADD CONSTRAINT FK_634D9CA3A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_bde ADD CONSTRAINT FK_634D9CA3DB4C56C FOREIGN KEY (bde_id) REFERENCES bde (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7CDBA5C36');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CCDBA5C36');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CF4403579');
        $this->addSql('ALTER TABLE media DROP FOREIGN KEY FK_6A2CA10CCCE72FF7');
        $this->addSql('ALTER TABLE `member` DROP FOREIGN KEY FK_70E4FA78CDBA5C36');
        $this->addSql('ALTER TABLE user_bde DROP FOREIGN KEY FK_634D9CA3A76ED395');
        $this->addSql('ALTER TABLE user_bde DROP FOREIGN KEY FK_634D9CA3DB4C56C');
        $this->addSql('DROP TABLE bde');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE goodies');
        $this->addSql('DROP TABLE media');
        $this->addSql('DROP TABLE `member`');
        $this->addSql('DROP TABLE modify');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_bde');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
