<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200803144239 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Change tax number from integer to string type';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice_client_info ALTER tax_number TYPE VARCHAR(32)');
        $this->addSql('ALTER TABLE invoice_client_info ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE app_user ALTER tax_number TYPE VARCHAR(32)');
        $this->addSql('ALTER TABLE app_user ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER tax_number TYPE VARCHAR(32)');
        $this->addSql('ALTER TABLE client ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE invoice_user_info ALTER tax_number TYPE VARCHAR(32)');
        $this->addSql('ALTER TABLE invoice_user_info ALTER tax_number DROP DEFAULT');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice_client_info ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE invoice_client_info ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE invoice_client_info ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE app_user ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE app_user ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE app_user ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE client ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE client ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE client ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE invoice_user_info ALTER tax_number TYPE INT');
        $this->addSql('ALTER TABLE invoice_user_info ALTER tax_number DROP DEFAULT');
        $this->addSql('ALTER TABLE invoice_user_info ALTER tax_number TYPE INT');
    }
}
