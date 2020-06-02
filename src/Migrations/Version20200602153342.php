<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200602153342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add user\'s billing information';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE app_user ADD street VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE app_user ADD city VARCHAR(128) NOT NULL');
        $this->addSql('ALTER TABLE app_user ADD postal_code INT NOT NULL');
        $this->addSql('ALTER TABLE app_user ADD cid_number INT NOT NULL');
        $this->addSql('ALTER TABLE app_user ADD tax_number INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_user ADD bank_account VARCHAR(64) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE app_user DROP street');
        $this->addSql('ALTER TABLE app_user DROP city');
        $this->addSql('ALTER TABLE app_user DROP postal_code');
        $this->addSql('ALTER TABLE app_user DROP cid_number');
        $this->addSql('ALTER TABLE app_user DROP tax_number');
        $this->addSql('ALTER TABLE app_user DROP bank_account');
    }
}
