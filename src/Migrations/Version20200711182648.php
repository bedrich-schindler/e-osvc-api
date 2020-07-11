<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200711182648 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Extend invoice to accept multiple projects';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice DROP CONSTRAINT fk_906517448f7162d0');
        $this->addSql('DROP INDEX uniq_906517448f7162d0');
        $this->addSql('ALTER TABLE invoice DROP invoice_project_info_id');
        $this->addSql('ALTER TABLE invoice_project_info ADD invoice_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoice_project_info ADD CONSTRAINT FK_4DDFD63B2989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_4DDFD63B2989F1FD ON invoice_project_info (invoice_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE invoice_project_info DROP CONSTRAINT FK_4DDFD63B2989F1FD');
        $this->addSql('DROP INDEX IDX_4DDFD63B2989F1FD');
        $this->addSql('ALTER TABLE invoice_project_info DROP invoice_id');
        $this->addSql('ALTER TABLE invoice ADD invoice_project_info_id INT NOT NULL');
        $this->addSql('ALTER TABLE invoice ADD CONSTRAINT fk_906517448f7162d0 FOREIGN KEY (invoice_project_info_id) REFERENCES invoice_project_info (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE UNIQUE INDEX uniq_906517448f7162d0 ON invoice (invoice_project_info_id)');
    }
}
