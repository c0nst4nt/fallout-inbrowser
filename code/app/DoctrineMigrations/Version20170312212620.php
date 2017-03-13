<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

class Version20170312212620 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->addSql(
            'CREATE TABLE `items` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR (50),
                `value` INT,
                `type` SMALLINT,
                `min_level` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `players` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR (50),
                `weapon_item_id` SMALLINT,
                `armor_item_id` SMALLINT,
                `health` SMALLINT,
                `moves` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDB;'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('DROP TABLE `items`');
        $this->addSql('DROP TABLE `players`');
    }
}
