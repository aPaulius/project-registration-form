<?php declare(strict_types=1);

namespace Application\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20181030155127 extends AbstractMigration
{
    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, phone VARCHAR(255) NOT NULL, house_number INT NOT NULL, has_compensation TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE measure_value (id INT AUTO_INCREMENT NOT NULL, measure_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, rate INT NOT NULL, INDEX IDX_D13CF6E75DA37D00 (measure_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, created_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_2FB3D0EEA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE project_measure_value (id INT AUTO_INCREMENT NOT NULL, measure_value_id INT DEFAULT NULL, project_id INT DEFAULT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_5AD61E1A7653978 (measure_value_id), INDEX IDX_5AD61E1166D1F9C (project_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE measure (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET UTF8 COLLATE UTF8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE measure_value ADD CONSTRAINT FK_D13CF6E75DA37D00 FOREIGN KEY (measure_id) REFERENCES measure (id)');
        $this->addSql('ALTER TABLE project ADD CONSTRAINT FK_2FB3D0EEA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE project_measure_value ADD CONSTRAINT FK_5AD61E1A7653978 FOREIGN KEY (measure_value_id) REFERENCES measure_value (id)');
        $this->addSql('ALTER TABLE project_measure_value ADD CONSTRAINT FK_5AD61E1166D1F9C FOREIGN KEY (project_id) REFERENCES project (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE project DROP FOREIGN KEY FK_2FB3D0EEA76ED395');
        $this->addSql('ALTER TABLE project_measure_value DROP FOREIGN KEY FK_5AD61E1A7653978');
        $this->addSql('ALTER TABLE project_measure_value DROP FOREIGN KEY FK_5AD61E1166D1F9C');
        $this->addSql('ALTER TABLE measure_value DROP FOREIGN KEY FK_D13CF6E75DA37D00');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE measure_value');
        $this->addSql('DROP TABLE project');
        $this->addSql('DROP TABLE project_measure_value');
        $this->addSql('DROP TABLE measure');
    }
}
