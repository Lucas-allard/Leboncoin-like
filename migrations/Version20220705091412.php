<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220705091412 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files ADD category_id INT NOT NULL');
        $this->addSql('ALTER TABLE files ADD CONSTRAINT FK_635405912469DE2 FOREIGN KEY (category_id) REFERENCES categories (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_635405912469DE2 ON files (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE files DROP FOREIGN KEY FK_635405912469DE2');
        $this->addSql('DROP INDEX UNIQ_635405912469DE2 ON files');
        $this->addSql('ALTER TABLE files DROP category_id');
    }
}
