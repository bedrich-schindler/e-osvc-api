<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602173308 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add user\'s and client\'s billing information and payment variable symbol to invoice';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE invoice_user_info (id SERIAL NOT NULL, first_name VARCHAR(32) NOT NULL, last_name VARCHAR(32) NOT NULL, street VARCHAR(128) NOT NULL, city VARCHAR(128) NOT NULL, postal_code INT NOT NULL, cid_number INT NOT NULL, tax_number INT DEFAULT NULL, bank_account VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE invoice_client_info ADD street VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE invoice_client_info ADD city VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE invoice_client_info ADD postal_code INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_client_info ADD cid_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice_client_info ADD tax_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE invoice ADD invoice_user_info_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD payment_variable_symbol INT NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744BA41F086 FOREIGN KEY (invoice_user_info_id) REFERENCES invoice_user_info (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90651744BA41F086 ON invoice (invoice_user_info_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_90651744BA41F086');
        $this->addSql('DROP TABLE invoice_user_info');
        $this->addSql('ALTER TABLE invoice_client_info DROP street');
        $this->addSql('ALTER TABLE invoice_client_info DROP city');
        $this->addSql('ALTER TABLE invoice_client_info DROP postal_code');
        $this->addSql('ALTER TABLE invoice_client_info DROP cid_number');
        $this->addSql('ALTER TABLE invoice_client_info DROP tax_number');
        $this->addSql('DROP INDEX UNIQ_90651744BA41F086');
        $this->addSql('ALTER TABLE invoice DROP invoice_user_info_id');
        $this->addSql('ALTER TABLE invoice DROP payment_variable_symbol');
    }
}
