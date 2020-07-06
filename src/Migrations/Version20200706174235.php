<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200706174235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add time record';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE time_record (id SERIAL NOT NULL, project_id INT NOT NULL, owner_id INT NOT NULL, start_date_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date_time TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, note VARCHAR(256) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C2C2D067166D1F9C ON time_record (project_id)');
        $this->addSql('CREATE INDEX IDX_C2C2D0677E3C61F9 ON time_record (owner_id)');
        $this->addSql('COMMENT ON COLUMN time_record.start_date_time IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN time_record.end_date_time IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE time_record ADD CONSTRAINT FK_C2C2D067166D1F9C FOREIGN KEY (project_id) REFERENCES project (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE time_record ADD CONSTRAINT FK_C2C2D0677E3C61F9 FOREIGN KEY (owner_id) REFERENCES app_user (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE time_record');
    }
}
