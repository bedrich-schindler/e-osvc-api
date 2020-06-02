<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200510153525 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add invoice, invoice item, invoice client info and invoice project info entities';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE invoice_project_info (id SERIAL NOT NULL, original_id INT DEFAULT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4DDFD63B108B7592 ON invoice_project_info (original_id)');
        $this->addSql('CREATE TABLE invoice_client_info (id SERIAL NOT NULL, original_id INT DEFAULT NULL, name VARCHAR(64) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D5B9006108B7592 ON invoice_client_info (original_id)');
        $this->addSql('CREATE TABLE invoice_item (id SERIAL NOT NULL, invoice_id INT NOT NULL, quantity INT NOT NULL, price_per_quantity_unit DOUBLE PRECISION NOT NULL, quantity_unit VARCHAR(8) DEFAULT NULL, note TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1DDE477B2989F1FD ON invoice_item (invoice_id)');
        $this->addSql('CREATE TABLE invoice (id SERIAL NOT NULL, invoice_client_info_id INT NOT NULL, invoice_project_info_id INT NOT NULL, owner_id INT NOT NULL, invoice_identifier VARCHAR(32) NOT NULL, invoice_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, invoice_due_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, invoice_payment_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_90651744EF34BBE9 ON invoice (invoice_client_info_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_906517448F7162D0 ON invoice (invoice_project_info_id)');
        $this->addSql('CREATE INDEX IDX_906517447E3C61F9 ON invoice (owner_id)');
        $this->addSql('COMMENT ON COLUMN invoice.invoice_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN invoice.invoice_due_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN invoice.invoice_payment_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE invoice_project_info ADD CONSTRAINT FK_4DDFD63B108B7592 FOREIGN KEY (original_id) REFERENCES project (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_client_info ADD CONSTRAINT FK_D5B9006108B7592 FOREIGN KEY (original_id) REFERENCES client (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice_item ADD CONSTRAINT FK_1DDE477B2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_90651744EF34BBE9 FOREIGN KEY (invoice_client_info_id) REFERENCES invoice_client_info (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517448F7162D0 FOREIGN KEY (invoice_project_info_id) REFERENCES invoice_project_info (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT FK_906517447E3C61F9 FOREIGN KEY (owner_id) REFERENCES app_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_906517448F7162D0');
        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT FK_90651744EF34BBE9');
        $this->addSql('ALTER TABLE invoice_item DROP CONSTRAINT FK_1DDE477B2989F1FD');
        $this->addSql('DROP TABLE invoice_project_info');
        $this->addSql('DROP TABLE invoice_client_info');
        $this->addSql('DROP TABLE invoice_item');
        $this->addSql('DROP TABLE invoice');
    }
}
