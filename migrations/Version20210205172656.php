<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210205172656 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE director (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, picture VARCHAR(255) DEFAULT NULL, nationality VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE director_program (director_id INT NOT NULL, program_id INT NOT NULL, INDEX IDX_4153A4CB899FB366 (director_id), INDEX IDX_4153A4CB3EB8070A (program_id), PRIMARY KEY(director_id, program_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE director_program ADD CONSTRAINT FK_4153A4CB899FB366 FOREIGN KEY (director_id) REFERENCES director (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE director_program ADD CONSTRAINT FK_4153A4CB3EB8070A FOREIGN KEY (program_id) REFERENCES program (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director_program DROP FOREIGN KEY FK_4153A4CB899FB366');
        $this->addSql('DROP TABLE director');
        $this->addSql('DROP TABLE director_program');
    }
}
