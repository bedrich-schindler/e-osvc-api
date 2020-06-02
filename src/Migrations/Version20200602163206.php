<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602163206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add client\'s billing and contact information';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE client ADD street VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE client ADD city VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE client ADD postal_code INT NOT NULL');
        $this->addSql('ALTER TABLE client ADD cid_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD tax_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD contact_email VARCHAR(128) DEFAULT NULL');
        $this->addSql('ALTER TABLE client ADD contact_phone_number VARCHAR(32) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE client DROP street');
        $this->addSql('ALTER TABLE client DROP city');
        $this->addSql('ALTER TABLE client DROP postal_code');
        $this->addSql('ALTER TABLE client DROP cid_number');
        $this->addSql('ALTER TABLE client DROP tax_number');
        $this->addSql('ALTER TABLE client DROP contact_email');
        $this->addSql('ALTER TABLE client DROP contact_phone_number');
    }
}
