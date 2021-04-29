<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210429172620 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_game_type DROP FOREIGN KEY FK_672BB6E1508EF3BC');
        $this->addSql('CREATE TABLE evaluate (id INT AUTO_INCREMENT NOT NULL, id_voter_id INT NOT NULL, id_recipient_id INT NOT NULL, love INT NOT NULL, dislike INT NOT NULL, INDEX IDX_8E840A88BB6F5438 (id_voter_id), INDEX IDX_8E840A88CAEEFA0A (id_recipient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE message (id INT AUTO_INCREMENT NOT NULL, id_from_id INT NOT NULL, id_to_id INT NOT NULL, content LONGTEXT NOT NULL, INDEX IDX_B6BD307FA653707B (id_from_id), INDEX IDX_B6BD307FDEB00B55 (id_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE evaluate ADD CONSTRAINT FK_8E840A88BB6F5438 FOREIGN KEY (id_voter_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE evaluate ADD CONSTRAINT FK_8E840A88CAEEFA0A FOREIGN KEY (id_recipient_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FA653707B FOREIGN KEY (id_from_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE message ADD CONSTRAINT FK_B6BD307FDEB00B55 FOREIGN KEY (id_to_id) REFERENCES `user` (id)');
        $this->addSql('DROP TABLE game_type');
        $this->addSql('DROP TABLE user_game_type');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user_game_type (user_id INT NOT NULL, game_type_id INT NOT NULL, INDEX IDX_672BB6E1508EF3BC (game_type_id), INDEX IDX_672BB6E1A76ED395 (user_id), PRIMARY KEY(user_id, game_type_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_game_type ADD CONSTRAINT FK_672BB6E1A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_game_type ADD CONSTRAINT FK_672BB6E1508EF3BC FOREIGN KEY (game_type_id) REFERENCES game_type (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE evaluate');
        $this->addSql('DROP TABLE message');
    }
}
