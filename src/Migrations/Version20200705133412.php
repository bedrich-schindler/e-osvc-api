<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200705133412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add social insurance';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE social_insurance (id SERIAL NOT NULL, owner_id INT NOT NULL, date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, amount DOUBLE PRECISION NOT NULL, variant VARCHAR(255) NOT NULL, note VARCHAR(256) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5658F23B7E3C61F9 ON social_insurance (owner_id)');
        $this->addSql('COMMENT ON COLUMN social_insurance.date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE social_insurance ADD CONSTRAINT FK_5658F23B7E3C61F9 FOREIGN KEY (owner_id) REFERENCES app_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE social_insurance');
    }
}
