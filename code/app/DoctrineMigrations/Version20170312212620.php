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
            'CREATE TABLE `item` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR (50),
                `value` INT,
                `type` SMALLINT,
                `min_level` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `player` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `name` VARCHAR (50),
                `item_store_id` SMALLINT,
                `weapon_item_id` INT,
                `armor_item_id` INT,
                `health` SMALLINT,
                `moves` SMALLINT,
                PRIMARY KEY (`id`),
                CONSTRAINT fk_weapon_item FOREIGN KEY (`weapon_item_id`) REFERENCES `item` (`id`),
                CONSTRAINT fk_armor_item FOREIGN KEY (`armor_item_id`) REFERENCES `item` (`id`)
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `player_abilities` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `level` SMALLINT,
                `experience` SMALLINT,
                `strength` SMALLINT,
                `agility` SMALLINT,
                `perceive` SMALLINT,
                `luck` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDB'
        );
        $this->addSql(
            'CREATE TABLE `item_store` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `player_id` SMALLINT,
                `item_id` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `fight_scenario` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `enemies_count` SMALLINT,
                `experience_reward` SMALLINT,
                `min_health` SMALLINT,
                `max_health` SMALLINT,
                `min_attack` SMALLINT,
                `max_attack` SMALLINT,
                `moves` SMALLINT,
                `description` TINYTEXT,
                PRIMARY KEY (`id`)              
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `discover_scenario` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `items_count` SMALLINT,
                `min_health` SMALLINT,
                `max_health` SMALLINT,
                `description` TINYTEXT,
                PRIMARY KEY (`id`)              
            ) ENGINE InnoDB;'
        );
        $this->addSql(
            'CREATE TABLE `current_scenario` (
                `id` INT NOT NULL AUTO_INCREMENT,
                `scenario_id` SMALLINT,
                `distance` SMALLINT,
                `enemy_health` SMALLINT,
                `enemies_left` SMALLINT,
                PRIMARY KEY (`id`)
            ) ENGINE InnoDb'
        );
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->addSql('ALTER TABLE `player` DROP FOREIGN KEY `fk_weapon_item`;');
        $this->addSql('ALTER TABLE `player` DROP FOREIGN KEY `fk_armor_item`;');
        $this->addSql('DROP TABLE `item`;');
        $this->addSql('DROP TABLE `player`;');
        $this->addSql('DROP TABLE `player_abilities`;');
        $this->addSql('DROP TABLE `item_store`;');
        $this->addSql('DROP TABLE `fight_scenario`;');
        $this->addSql('DROP TABLE `discover_scenario`;');
        $this->addSql('DROP TABLE `current_scenario`;');
    }
}
