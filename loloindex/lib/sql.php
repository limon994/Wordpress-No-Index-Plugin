<?php
    defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
    global $loloIndexDBVersion;
    $loloIndexDBVersion = '1.0';

    function lolo_index_install()
    {
        //die('lolo_index_install');
        global $wpdb;
        global $loloIndexDBVersion,$loloIndexBaseDir;
        //echo "Installing";
        $carSetCollate = $wpdb->get_charset_collate();

        $indexTable = $wpdb->prefix . 'lolo_index';


        //Creating Table
        /*
        1 = index , FOLLOW
        2 = no-index, FOLLOW
        3 = index, NO-FOLLOW
        4 = no-index, NO-FOLLOW
        */
        $indexSql = "CREATE TABLE IF NOT EXISTS $indexTable (
            id BIGINT(20) NOT NULL,
            post_index enum('1','2','3','4') not null default '1',
            UNIQUE KEY id (id)
            ) $carSetCollate;";


        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta($indexSql);
        /*
        $fp = fopen($loloIndexBaseDir."/log.txt","a+");
        fwrite($fp,$indexSql);
        fclose($fp);
        */
        add_option( 'lolo_index_db_version', $loloIndexDBVersion );
}


 ?>
