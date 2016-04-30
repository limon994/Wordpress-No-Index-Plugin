<?php
/**
 * @package LoloPDF
 * @version 1.0
 */
/*
Plugin Name: SEO INDEX / NO-INDEX, FOLLOW / NO-FOLLOW
Plugin URI: http://lolobyte.com
Description: Customize your posts/pages from indexing or not indexing
Author: Mizan Limon, Sirajul, Kumar Surunjit
Version: 1.0
Author URI: http://lolobyte.com
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

global $loloIndexBaseDir,$wpBaseDir;
$loloIndexBaseDir = dirname(__FILE__);

//For Admin Part//

require_once($loloIndexBaseDir."/includes.php");
if(is_admin())
{
	//die('test');
	register_activation_hook( __FILE__, 'lolo_index_install' );
}
add_action( 'edit_form_after_editor', 'lolo_index_edit_form' );
add_action('wp_head','lolo_index_head');
add_action('save_post','lolo_index_save_post',10,3);
//For Font Office


?>
