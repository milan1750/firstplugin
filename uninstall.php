<?php 

global $wpdb;
$prefix = $wpdb->prefix;
$sql = "
    DROP TABLE IF EXISTS `{$prefix}first_plugin_max_adds`;
";
$wpdb->query($sql);

