<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240405154947 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categories (id UUID NOT NULL, parent_id UUID DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, category_type_id UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3AF346682B36786B ON categories (title)');
        $this->addSql('COMMENT ON COLUMN categories.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN categories.parent_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN categories.category_type_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE category_types (id UUID NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN category_types.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE professions (id UUID NOT NULL, name VARCHAR(255) NOT NULL, user_id UUID NOT NULL, category_id UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN professions.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN professions.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN professions.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE "user" (id UUID NOT NULL, first_name VARCHAR(255) NOT NULL, middle_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, about TEXT DEFAULT NULL, user_type_id UUID NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN "user".user_type_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE user_services (id UUID NOT NULL, user_id UUID NOT NULL, category_id UUID NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, price NUMERIC(10, 2) NOT NULL, old_price NUMERIC(10, 2) DEFAULT NULL, discount INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93BF0569A76ED395 ON user_services (user_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_93BF056912469DE2 ON user_services (category_id)');
        $this->addSql('COMMENT ON COLUMN user_services.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN user_services.user_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN user_services.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE user_types (id UUID NOT NULL, name VARCHAR(255) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN user_types.id IS \'(DC2Type:uuid)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE categories');
        $this->addSql('DROP TABLE category_types');
        $this->addSql('DROP TABLE professions');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_services');
        $this->addSql('DROP TABLE user_types');
    }
}
