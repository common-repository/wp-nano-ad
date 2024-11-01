<?php
//disable direct access
if(!defined('DB_NAME'))
    die("Direct Access To This File Is Denied");
    
require_once('custom-thumb-sizes.php');
    
    $msg = "";
    
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
            $save_sql = "INSERT INTO ".$table_prefix."wp_nano_ads VALUES('','$wp_nano_ads_blogrole_link','$wp_nano_ads_blogrole_anchor','$wp_nano_ads_nano_img','$wp_nano_ads_link_type','$wp_nano_ads_only_home','$wp_nano_ads_link_target','$wp_nano_ads_start_date','$wp_nano_ads_end_date','$wp_nano_ads_link_owner_name','$wp_nano_ads_link_owner_email','0','0')";
            if(mysql_query($save_sql)){
                $msg = "Link Added";
                }
       }
                
}
        
    


    
    
    
    
    
    
 ?>
 <div class="icon32" id="icon-options-general"><br/></div>

<h2>Add Link</h2>

<BR />
<?php 
//require_once('wp_nano_ads_ads.php');
wp_nano_ads_newads();
?>
 <form  method="post" name="linkform">

<table class="form-table">

<caption>
<div class="updated">
<p><strong>
<?php echo $msg;?>
</strong></p>
</div>
</caption>

<tbody>




<tr class="tr">

    <td width="200">Link URL*<br />(You have to add the WP Nano Ads Links Widget from the Appearance> Widgets Section to show the link in your sidebar)</td>

    <td class="first">
     <input type="text" class="regular-text" value="" id="blogrole_link" name="blogrole_link">
    
     </td>

</tr>
<tr class="tr">
<input type="hidden" name="link_type" value="link" />
   <!-- <td width="200">Anchor Text*</td>-->
 <td class="first">
Enter an URL or upload an image for the banner.
</td><td>
<input id="upload_image" type="text" size="36" name="nano_img" value="" />
<input id="upload_image_button" type="button" value="Upload Image" />

</td>
   
</tr>

<tr class="tr">

    <td width="200">Link Title Text<br />The text to show when the nano ad is hovered over.</td>

    <td class="first">
     <input type="text" class="regular-text" value="" id="blogrole_anchor" name="blogrole_anchor">
    
     </td>

</tr>
<tr class="tr">

    <td width="200"><strong>Link Attributes</strong></td>

    <td class="first">
    <input type="checkbox" name="is_home_only" id="is_home_only" value="">Display Only Home Page<BR>
    <input type="radio" name="link_target" id="link_target" value="_blank">New Window or Tab<BR>
    <input type="radio" name="link_target" id="link_target" value="_top">Current Window or Tab<BR>
  </td>

</tr>

<tr class="tr">

    <td width="200"><strong>Start Date[YYYY/MM/DD]*</td>
<td class="first">
     <input type="text" size="15"  value="" id="start_date" name="start_date">    
     </td>
</tr>
<tr class="tr">

    <td width="200"><strong>End Date[YYYY/MM/DD]*</strong></td>

    <td class="first">
     <input type="text" size="15"  value="" id="end_date" name="end_date">    
     </td>

</tr>
<tr class="tr">

    <td width="200"><strong>Link Owner Name*</strong></td>

    <td class="first">
     <input type="text" class="regular-text" value="" id="link_owner_name" name="link_owner_name">    
     </td>

</tr>
<tr class="tr">

    <td width="200"><strong>Link Owner Email*</strong></td>

    <td class="first">
     <input type="text" class="regular-text" value="" id="link_owner_email" name="link_owner_email">    
     </td>

</tr>
<tr>
<td>* = Required Field</td>
    <td class="first">


    <input type="submit" value="Save" class="button">

    

    </td>

    

</tr>

</tbody>
</table>
</form>


    