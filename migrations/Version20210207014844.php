<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210207014844 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director ADD country_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE director ADD CONSTRAINT FK_1E90D3F0F92F3E70 FOREIGN KEY (country_id) REFERENCES country (id)');
        $this->addSql('CREATE INDEX IDX_1E90D3F0F92F3E70 ON director (country_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE director DROP FOREIGN KEY FK_1E90D3F0F92F3E70');
        $this->addSql('DROP INDEX IDX_1E90D3F0F92F3E70 ON director');
        $this->addSql('ALTER TABLE director DROP country_id');
    }
}
