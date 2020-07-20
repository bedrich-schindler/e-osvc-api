<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200720153021 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add user notifications';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE app_user_notifications (id SERIAL NOT NULL, user_id INT NOT NULL, health_insurance_enabled BOOLEAN NOT NULL, health_insurance_day_of_month INT NOT NULL, sickness_insurance_enabled BOOLEAN NOT NULL, sickness_insurance_day_of_month INT NOT NULL, social_insurance_enabled BOOLEAN NOT NULL, social_insurance_day_of_month INT NOT NULL, tax_enabled BOOLEAN NOT NULL, tax_day_of_month INT NOT NULL, overdue_invoice_enabled BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('
            DO
            $do$
            DECLARE
                appUser record;
            BEGIN
                FOR appUser IN (SELECT * FROM app_user)
                LOOP
                    INSERT INTO app_user_notifications (user_id, health_insurance_enabled, health_insurance_day_of_month, sickness_insurance_enabled, sickness_insurance_day_of_month, social_insurance_enabled, social_insurance_day_of_month, tax_enabled, tax_day_of_month, overdue_invoice_enabled) VALUES (appUser.id, false, 1, false, 1, false, 1, false, 1, true);
                END LOOP;
            END;
            $do$;
        ');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EE9FD6FBA76ED395 ON app_user_notifications (user_id)');
        $this->addSql('ALTER TABLE app_user_notifications ADD CONSTRAINT FK_EE9FD6FBA76ED395 FOREIGN KEY (user_id) REFERENCES app_user (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('DROP TABLE app_user_notifications');
    }
}
