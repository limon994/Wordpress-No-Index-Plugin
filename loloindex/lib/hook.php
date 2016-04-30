<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function lolo_index_head()
{
    $id = get_the_ID();
    $number = LoloIndex::GetIndex($id);
    switch($number){
        case '1':
            echo "<meta name='robots' content='index, follow'>";
            break;
        case '2':
            echo "<meta name='robots' content='noindex, follow'>";
            break;
        case '3':
            echo "<meta name='robots' content='index, nofollow'>";
            break;
        case '4':
            echo "<meta name='robots' content='noindex, nofollow'>";
            break;
        default:
            echo "<meta name='robots' content='index, follow'>";
            break;
    }


}

function lolo_index_edit_form()
{
    $id = isset($_GET['post']) ? (int)$_GET['post'] : 0;
    $indexValue = LoloIndex::GetIndex($id);
    $oneCheck = "";
    $twoCheck = "";
    $threeCheck = "";
    $fourCheck = "";
    switch($indexValue){
        case 1:
            $oneCheck = "checked='checked'";
            break;
        case 2:
            $twoCheck = "checked='checked'";
            break;
        case 3:
            $threeCheck = "checked='checked'";
            break;
        case 4:
            $fourCheck = "checked='checked'";
            break;
        default:
            $oneCheck = "checked='checked'";
            break;
    }

    echo "<div class='postbox'>
            <h2 class='hndle ui-sortable-handle'><span>ROBOTS SETTINGS</span></h2>
            <div class='inside'>
                <div style='line-height:2em;'>
                    <fieldset>
                        <legend class='screen-reader-text'>Post Formats</legend>
                        <input type='radio' name='lolo_index' class='post-format' value='1' $oneCheck>
                        <label for='lolo_index' class='post-format-icon post-format-standard'>Index, Follow</label>
                        <br>
                        <input type='radio' name='lolo_index' class='post-format' value='2' $twoCheck>
                        <label for='lolo_index' class='post-format-icon post-format-standard'>No-Index, Follow</label>
                        <br>
                        <input type='radio' name='lolo_index' class='post-format' value='3' $threeCheck>
                        <label for='lolo_index' class='post-format-icon post-format-standard'>Index, No-Follow</label>
                        <br>
                        <input type='radio' name='lolo_index' class='post-format' value='4' $fourCheck>
                        <label for='lolo_index' class='post-format-icon post-format-standard'>No-Index, No-Follow</label>
                    </fieldset>
                </div>
            </div>
          </div>";
}

function lolo_index_save_post($post_id,$post,$update)
{

    $post->lolo_index = $_POST['lolo_index'];
    LoloIndex::Insert($post->ID,$post->lolo_index);
    /*
    global $loloIndexBaseDir;
    $fp = fopen($loloIndexBaseDir."/log.txt","a+");
    fwrite($fp,print_r($post,true));
    //fwrite($fp,$post_id."\n");
    fclose($fp);
    //echo "<pre>";print_r($_POST);echo "</pre>";
    */
}
?>
