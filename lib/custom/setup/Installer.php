<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Aimeos (aimeos.org), 2017-2020
 * @package Admin
 * @subpackage JQAdm
 */


namespace Swordbros;

use Composer\Script\Event;
use Illuminate\Support\Facades\DB;

class Installer
{
    public static function postUpdate(Event $event)
    {
        //$composer = $event->getComposer();
        echo "postUpdate";
    // do stuff
    }

    public static function postPackageUpdate(Event $event)
    {
        //print_r($event);
        echo "Update\n";
        static::fix_slider_table();
        // do stuff
    }

    public static function warmCache(Event $event)
    {
    // make cache toasty
    }
    
    private static function fix_slider_table(){
        
        $sw_slider = "CREATE TABLE `sw_slider` (
  `id` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varbinary(64) NOT NULL,
  `code` varbinary(64) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sw_slider_list` (
  `id` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varbinary(134) NOT NULL DEFAULT '',
  `type` varbinary(64) NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refid` varbinary(36) NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sw_slider_list_type` (
  `id` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varbinary(64) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sw_slider_type` (
  `id` int(11) NOT NULL,
  `siteid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varbinary(64) NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pos` int(11) NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL,
  `mtime` datetime NOT NULL,
  `ctime` datetime NOT NULL,
  `editor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


ALTER TABLE `sw_slider`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msser_siteid_code` (`siteid`,`code`),
  ADD KEY `idx_msser_sid_stat_start_end` (`siteid`,`status`,`start`,`end`),
  ADD KEY `idx_msser_sid_prov` (`siteid`,`provider`),
  ADD KEY `idx_msser_sid_code` (`siteid`,`code`),
  ADD KEY `idx_msser_sid_label` (`siteid`,`label`),
  ADD KEY `idx_msser_sid_pos` (`siteid`,`pos`);

ALTER TABLE `sw_slider_list`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msserli_pid_sid_dm_ty_rid` (`parentid`,`siteid`,`domain`,`type`,`refid`),
  ADD KEY `idx_msserli_sid_key` (`siteid`,`key`),
  ADD KEY `fk_msserli_pid` (`parentid`);

ALTER TABLE `sw_slider_list_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msserlity_sid_dom_code` (`siteid`,`domain`,`code`),
  ADD KEY `idx_msserlity_sid_status_pos` (`siteid`,`status`,`pos`),
  ADD KEY `idx_msserlity_sid_label` (`siteid`,`label`),
  ADD KEY `idx_msserlity_sid_code` (`siteid`,`code`);

ALTER TABLE `sw_slider_type`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unq_msserty_sid_dom_code` (`siteid`,`domain`,`code`),
  ADD KEY `idx_msserty_sid_status_pos` (`siteid`,`status`,`pos`),
  ADD KEY `idx_msserty_sid_label` (`siteid`,`label`),
  ADD KEY `idx_msserty_sid_code` (`siteid`,`code`);

ALTER TABLE `sw_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sw_slider_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sw_slider_list_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `sw_slider_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;";
        foreach(explode(';', $sw_slider) as $sql){
            if(!empty($sql)){
                $parts = explode('`', $sql);
                echo $parts[1]." Table checking..... ";
                // \DB::statement($sql);
                DB::connection()->select('SELECT 1');
                echo $parts[1]." Checked ✓\r\n";
            }
        }

    }

}