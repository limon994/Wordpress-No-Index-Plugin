<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 *
 */
class LoloIndex
{
    public static $errorMessage = "";
    public static function Insert($id,$index)
    {
        LoloIndex::Delete($id);
        global $wpdb;
        $tableName = $wpdb->prefix .'lolo_index';
        //echo $tableName;
        $wpdb->insert(
        	$tableName,
        	array(
        		'id' => $id,
                'post_index' => $index
        	)
        );
        return $wpdb->insert_id;
    }

    public static function GetIndex($id)
    {
        global $wpdb;
        $table = $wpdb->prefix.'lolo_index';
        $query = "SELECT * FROM $table WHERE id='$id'";
        $result = $wpdb->get_row($query);
        if(isset($result->post_index))
        {
            return (int)$result->post_index;
        }
        return 1;
    }


    public static function Get()
    {
        global $wpdb;
        $table = $wpdb->prefix.'lolo_pdf_file';
        $query = "SELECT * FROM $table ORDER BY id DESC";
        return $wpdb->get_results($query);
    }



    public static function Delete($id)
    {
        global $wpdb;
        $tableName = $wpdb->prefix.'lolo_index';
        $wpdb->delete($tableName, array('id'=>$id),array('%d'));
    }


    public static function GetUrl()
    {
		$page = isset($_GET['page']) ? $_GET['page'] : "";
        $adminUrl = get_admin_url().basename($_SERVER["SCRIPT_FILENAME"], '.php').".php?page=$page";
		return $adminUrl;
    }
	public static function GetSuccessMsg($msg)
	{
		return "<div class='updated'><p>$msg</p></div>";
	}
	public static function GetErrorMsg($msg)
	{
		return "<div class='error'><p>$msg</p></div>";
	}

}

?>
