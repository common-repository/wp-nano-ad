<?php
//disable direct access
if(!defined('DB_NAME'))
    die("Direct Access To This File Is Denied");
 
function wp_nano_ads_unix_t($date){
    $parts = explode("-",$date);
     return mktime(0,0,0,$parts[1],$parts[2],$parts[0]);
}
$wpcp_action = isset($_REQUEST['what']) ?  $_REQUEST['what'] : 'show';
$wpcp_current_page = $_SERVER['PHP_SELF'];
$wpcp_current_page .= '?page=wp_nano_ads_all_links';  
global $table_prefix;


if($wpcp_action == 'delete'){
    $link_id = (int) $_GET['id'];
    mysql_query("DELETE FROM ".$table_prefix."wp_nano_ads WHERE id=".$link_id);
    $msg = "Link Deleted";
    $wpcp_action = "show";
} 
?>
<div class="icon32" id="icon-options-general"><br/></div>

<h2>Nano Ads</h2>

<BR />    
<?php
//require_once('wp_nano_ads_ads.php');

switch($wpcp_action){
    case "show":{
$sql_show_all = "SELECT * FROM ".$table_prefix."wp_nano_ads ORDER BY end_date ";
$result_show_all = mysql_query($sql_show_all);
?>    
<style>
.expired{
background-color:#f0cecd;
}
</style>
    <table cellspacing="0" class="widefat post fixed">

    <caption id="wp_auto_status" style="font-family:tahoma;font-weight:bold;color:green"></caption>

    <thead>

    <tr>

    <th  class="manage-column column-date">ID</th>

    <th  class="manage-column column-date">Title Text</th>

    <th  class="manage-column column-date">Image</th>
    <th  class="manage-column column-date">Start Date</th>
    <th  class="manage-column column-date">End Date</th>
    
    <th  class="manage-column column-date">Edit</th>

    <th  class="manage-column column-date">Delete</th>

    

    </tr>

    </thead>



    <tfoot>
  

    <tr>

  <th  class="manage-column column-date">ID</th>

    <th  class="manage-column column-date">Title text</th>

    <th  class="manage-column column-date">Image</th>
    <th  class="manage-column column-date">Start Date</th>
    <th  class="manage-column column-date">End Date</th>
    
    <th  class="manage-column column-date">Edit</th>

    <th  class="manage-column column-date">Delete</th>
    </tr>

    </tfoot>

<tbody>
<?php
 
$srl = 0;
while($row_all = mysql_fetch_assoc($result_show_all)){
    $srl++;
    $class_css = "";
$today = date("Y-m-d");
if(wp_nano_ads_unix_t($today) > wp_nano_ads_unix_t($row_all['end_date'])){
     $class_css = "expired"; 
}
?>
<tr class="<?php echo $class_css;?>">
<td><?php echo $srl; ?></td>
<td><?php 
if($row_all['type'] == 'link'){
    echo '<a target="'.$row_all['target'].'" href="'.$row_all['href'].'">'.$row_all['anchor'].'</a>';
}
else{
    echo $row_all['anchor'];
}
?></td>
<td>
<img src="<?php echo $row_all['nano_img'];?>" title="<?php echo $row_all['anchor'];?>" width="30" height="30" /></td>

<td>
<?php
echo $row_all['start_date'];
?>
</td>
<td>
<?php
echo $row_all['end_date'];
?>
</td>

<td><a href="<?php echo $wpcp_current_page;?>&id=<?php echo $row_all['id'];?>&what=edit">Edit</a></td>
 <td><a href="<?php echo $wpcp_current_page;?>&what=delete&id=<?php echo $row_all['id'];?>">Delete</a></td>

</tr>
<?php
}
?>
</tbody>
</table>
<?php
break;
}
case "edit":{
    ?>
    <?php    
    //require_once('custom-thumb-sizes.php');
    $msg = "";
    $wp_nano_ads_link_id = (int) $_GET['id'];
    //save data
    if(isset($_POST['link_type'])){
        $wp_nano_ads_link_type = trim($_POST['link_type']);
       $wp_nano_ads_nano_img = trim($_POST['nano_img']);
        $wp_nano_ads_link_target = trim($_POST['link_target']);
        $wp_nano_ads_start_date = trim($_POST['start_date']);
        $wp_nano_ads_end_date = trim($_POST['end_date']);
        $wp_nano_ads_link_owner_name = trim($_POST['link_owner_name']);
        $wp_nano_ads_link_owner_email = trim($_POST['link_owner_email']);
        $wp_nano_ads_only_home = isset($_POST['is_home_only']) ? 1 : 0;
        $wp_nano_ads_proceed = true;
        if($wp_nano_ads_link_type == 'link'){
             $wp_nano_ads_blogrole_link = trim($_POST['blogrole_link']);
             $wp_nano_ads_blogrole_anchor = trim($_POST['blogrole_anchor']);
             $wp_nano_ads_mumble_text = '';
             
             //select nano sized img url from fullsize image.
            // $ita = str_replace(".jpg","-30x30.jpg",$wp_nano_ads_nano_img);
            // $wp_nano_ads_nano_img = $ita;
             
            /*if($wp_nano_ads_blogrole_link =='' || $wp_nano_ads_blogrole_anchor == '' || $wp_nano_ads_start_date == '' || $wp_nano_ads_end_date == '' || $wp_nano_ads_link_owner_name == '' || $wp_nano_ads_link_owner_email == '') {
                $wp_nano_ads_proceed = false;
                $msg = "Please fill all the fields";
                
            }*/
            
        }
       


        if($wp_nano_ads_proceed){
            $from_dates = explode("/",$wp_nano_ads_start_date);
            $to_dates = explode("/",$wp_nano_ads_end_date);
            if(!wp_nano_ads_is_valid_date($from_dates[0],$from_dates[1],$from_dates[2]) || !wp_nano_ads_is_valid_date($to_dates[0],$to_dates[1],$to_dates[2])){
                $wp_nano_ads_proceed = false;
                $msg = "Invalid Date Format";
            }
        }
                global $table_prefix;
        if($wp_nano_ads_proceed){
            $save_sql = "UPDATE ".$table_prefix."wp_nano_ads SET
                        href = '$wp_nano_ads_blogrole_link',
                        anchor = '$wp_nano_ads_blogrole_anchor',
                        nano_img = '$wp_nano_ads_nano_img',
                        type = '$wp_nano_ads_link_type',
                        only_home = '$wp_nano_ads_only_home',
                        target = '$wp_nano_ads_link_target',
                        start_date = '$wp_nano_ads_start_date',
                        end_date = '$wp_nano_ads_end_date',
                        link_owner_name = '$wp_nano_ads_link_owner_name',
                        link_owner_email = '$wp_nano_ads_link_owner_email' WHERE id = '$wp_nano_ads_link_id'";
                        echo $save_sql;
            if(mysql_query($save_sql)){
                $msg = "<div class='updated'><p><strong>Link Updated</strong></p></div>";
                } 
       }
                
}
        

    
//load current ad's setting
$id = (int) $_GET['id'];
$sql_edit = "SELECT * FROM ".$table_prefix."wp_nano_ads WHERE id = ".$id;
$result_edit = mysql_query($sql_edit);
if(mysql_num_rows($result_edit) == 0)
    die("Invalid Request");    
 $row_edit = mysql_fetch_assoc($result_edit);   
 wp_nano_ads_newads();
 ?>
 
 <form  method="post" name="linkform">
<input type="hidden" name="link_id" value="<?php echo $id;?>">
<input type="hidden" name="link_type" value="link" />
<table class="form-table">

<caption>

<?php echo $msg;?>

</caption>

<tbody>




<tr class="tr">

    <td width="200">Link URL*<br />(You have to add the WP Nano Ads Links Widget from the Appearance> Widgets Section to show the link in your sidebar)</td>

    <td class="first">
     <input type="text" class="regular-text" value="<?php echo $row_edit['href'];?>" id="blogrole_link" name="blogrole_link">
    
     </td>

</tr>
<tr class="tr">


 <td class="first">
 Current Image: </td><td><img id="nano_img" src="<?php echo $row_edit['nano_img'];?>" /><br /></td>
</tr>

<tr class="tr">
<td>Enter an URL or upload a new  image for the banner. <br />When you have uploaded, remember to <em>add to post at full size. The image will be auto resized to 30px x 30px.</em>
</td>
<td>
	<input id="upload_image" type="text" class="regular-text"  name="nano_img" value="<?php echo $row_edit['nano_img'];?>" /><br/> <br/>
	<input id="upload_image_button" type="button" value="Upload New" />
	</td>
</tr>

<tr class="tr">

    <td width="200">Link Title Text<br />The text to show when the nano ad is hovered over.</td>

    <td class="first">
     <input type="text" class="regular-text" value="<?php echo $row_edit['anchor'];?>" id="blogrole_anchor" name="blogrole_anchor">
    
     </td>

</tr>

<tr class="tr">

    <td width="200"><strong>Link Attributes</strong></td>

    <td class="first">
    <input type="checkbox" name="is_home_only" id="is_home_only" value="" <?php
    if($row_edit['only_home'] == 1){
        echo "checked";
    }
    ?>>Display Only on Home Page<BR>
    <input type="radio" name="link_target" id="link_target" value="_blank" <?php   
    if($row_edit['target'] == '_blank'){
        echo "checked";
    }
    ?>>Open in a New Window or Tab<BR>
    <input type="radio" name="link_target" id="link_target" value="_top" <?php
    if($row_edit['target'] == '_top'){
        echo "checked";
    }
    ?>>Current Window or Tab<BR>
  </td>

</tr>

<tr class="tr">

    <td width="200"><strong>Start Date[YYYY/MM/DD]</strong></td>

    <td class="first">
  
     <input type="text" size="15" id="start_date" name="start_date" value="<?php echo str_replace("-","/",$row_edit['start_date']);?>" >    
     *</td>

</tr>
<tr class="tr">

    <td width="200"><strong>End Date[YYYY/MM/DD]</strong></td>

    <td class="first">
     <input type="text" size="15"  value="<?php echo str_replace("-","/",$row_edit['end_date']);?>" id="end_date" name="end_date">    
     *</td>

</tr>
<tr class="tr">

    <td width="200"><strong>Link Owner Name</strong></td>

    <td class="first">
     <input type="text" class="regular-text" value="<?php echo $row_edit['link_owner_name']?>" id="link_owner_name" name="link_owner_name">    
     *</td>

</tr>
<tr class="tr">

    <td width="200"><strong>Link Owner Email</strong></td>

    <td class="first">
     <input type="text" class="regular-text" value="<?php echo $row_edit['link_owner_email']?>" id="link_owner_email" name="link_owner_email">    
     *</td>

</tr>
<tr>
<td>&nbsp;</td>
    <td class="first">


    <input type="submit" value="Save" class="button">

    

    </td>

    

</tr>

</tbody>
</table>
</form>


    
    <?php
    break;
}
}
?>