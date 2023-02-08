<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230125083216 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE publications');
        $this->addSql('ALTER TABLE artist CHANGE name name VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE comment CHANGE content content VARCHAR(2048) DEFAULT NULL');
        $this->addSql('ALTER TABLE concert DROP prix');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE publications (idPublication INT AUTO_INCREMENT NOT NULL, message TEXT CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, date DATETIME NOT NULL, loginAuteur VARCHAR(20) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, PRIMARY KEY(idPublication)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_general_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE concert ADD prix VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE comment CHANGE content content VARCHAR(2048) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE artist CHANGE name name VARCHAR(255) DEFAULT \'NULL\'');
    }
}
