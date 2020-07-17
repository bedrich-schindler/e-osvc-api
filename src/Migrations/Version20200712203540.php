<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200712203540 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add nullable invoice to time record';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE time_record ADD invoice_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE time_record ADD CONSTRAINT FK_C2C2D0672989F1FD FOREIGN KEY (invoice_id) REFERENCES invoice (id) ON DELETE SET NULL NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_C2C2D0672989F1FD ON time_record (invoice_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE time_record DROP CONSTRAINT FK_C2C2D0672989F1FD');
        $this->addSql('DROP INDEX IDX_C2C2D0672989F1FD');
        $this->addSql('ALTER TABLE time_record DROP invoice_id');
    }
}
