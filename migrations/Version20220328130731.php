<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220328130731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_praticiens (user_id INT NOT NULL, praticiens_id INT NOT NULL, INDEX IDX_A3BE10AEA76ED395 (user_id), INDEX IDX_A3BE10AE3D329473 (praticiens_id), PRIMARY KEY(user_id, praticiens_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_praticiens ADD CONSTRAINT FK_A3BE10AEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_praticiens ADD CONSTRAINT FK_A3BE10AE3D329473 FOREIGN KEY (praticiens_id) REFERENCES praticiens (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE praticiens ADD user_praticiens VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user_praticiens');
        $this->addSql('ALTER TABLE praticiens DROP user_praticiens');
    }
}
