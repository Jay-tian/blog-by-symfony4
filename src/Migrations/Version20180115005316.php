<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180115005316 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        $sql = "CREATE TABLE IF NOT EXISTS `user` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
            `email` varchar(128) NOT NULL COMMENT '用户邮箱',
            `mobile` varchar(32) NOT NULL DEFAULT  '' COMMENT '手机',
            `password` varchar(64) NOT NULL COMMENT '用户密码',
            `username` varchar(64) NOT NULL COMMENT '用户名',
            `avatar` varchar(1024) NOT NULL DEFAULT '' COMMENT '头像',
            `login_time` int(11) NOT NULL DEFAULT '0' COMMENT '最后登录时间',
            `loginIp` varchar(64) NOT NULL DEFAULT '' COMMENT '最后登录IP',
            `create_ip` varchar(64) NOT NULL DEFAULT '' COMMENT '注册IP',
            `roles` varchar(256) NOT NULL DEFAULT '|ROLE_USER|' COMMENT '角色',
            `gender` TINYINT UNSIGNED NOT NULL DEFAULT '2' COMMENT '性别 0女性，1男性，2未知',
            `locked` TINYINT UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否验证',
            `delete` TINYINT UNSIGNED NOT NULL DEFAULT '1' COMMENT '是否被删除',
            `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
            `update_time` INT UNSIGNED NOT NULL DEFAULT '0' COMMENT '最后更新时间',
            PRIMARY KEY (`id`),
            UNIQUE KEY `email` (`email`),
            UNIQUE KEY `username` (`username`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            CREATE TABLE IF NOT EXISTS `article` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `title` varchar(255) NOT NULL COMMENT '标题',
            `category_id` int(11) NOT NULL default '0' COMMENT '分类',
            `status` varchar(64) NOT NULL default 'create' COMMENT '状态',
            `cover` varchar(1024) not null default '' COMMENT '封面',
            `user_id` int(11) not null COMMENT '用户',
            `like_num` int(11) not null default '0' COMMENT '被赞数',
            `hits` int(11) not null default 0 COMMENT '浏览量',
            `content` text not null COMMENT '内容',
            `recommend` int(11) not null default 0 COMMENT '是否推荐',
            `seq` int(11) not null default 0 COMMENT '推荐权重',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            CREATE TABLE IF NOT EXISTS `category` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `parent_Id` int(11) NOT NULL COMMENT '父Id',
            `name` varchar(255) not null comment '名称',
            `code` varchar(255) not null comment '编码，便于查询所有子分类',
            `recommend` int(11) not null default 0 COMMENT '是否推荐',
            `seq` int(11) not null default 0 COMMENT '推荐权重',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            ALTER TABLE `article` ADD `content_md` text not null COMMENT '内容' AFTER `content`;
            CREATE TABLE IF NOT EXISTS `setting` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `name` varchar(255) not null unique comment '名称',
            `value` varchar(2048) not null comment '内容',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            PRIMARY KEY (`id`),
            INDEX(name)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
            CREATE TABLE IF NOT EXISTS `article_view_log` (
            `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
            `ip` varchar(255) not null unique comment '名称',
            `fingerprint` varchar(2048) not null comment '浏览器指纹',
            `user_id` int(11) NOT NULL COMMENT '用户Id',
            `article_id` int(11) NOT NULL COMMENT '资讯Id',
            `create_time` int(11) not null default 0 COMMENT '创建时间',
            `update_time` int(11) not null default 0 COMMENT '更新时间',
            UNIQUE KEY index_user_article (article_id, user_id),
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
        ";
            
        $this->connection->exec($sql);

    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
