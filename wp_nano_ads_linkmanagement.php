<?php
/*
WP Nano Ads 1.31
Plugin Name: WP Nano Ads
Plugin URI: http://wplinkmanagement.com/wp-nano-ad
Description: WP Nano Ads is your complete image link management solution. <strong>You can use this plugin for adding tiny Sponsor link images, which we call 'Nano Ads'!</strong>. You can set only home page linking option or all pages. This plugin will help you to notify the ad owner when his / her ad is expiring and incase if the owner does not renew the link, this plugin will delete that link automatically. You can set the email notification, ad Link adding and delete date, notification date etc.
Author: Kayes | iMarcus
Version: 1.31
Author URI: http://www.luvwp.com

Copyright (C) 2012  Kayes

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/


//protect direct access to this plugin
if(!defined('DB_HOST')){
    die("Direct Access Restricted");
}
function wp_nano_ads_setup_defaults(){
	update_option('wp_nano_ads_is_email_admin_owner','1');
	update_option('wp_nano_ads_is_email_owner_after_expire','1');
	update_option('wp_nano_ads_is_email_admin_after_expire','1');
	update_option('wp_nano_ads_is_delete_after_expire','1');
}
register_activation_hook( __FILE__, 'wp_nano_ads_setup_defaults' );
function wp_nano_ads_newads(){
	?>
	
<div style="top:155px;left:880px;width:320px;height:320px;position:fixed;">
<h2>Plugin Sponsors</h2>
<div style="width:125px;padding:10px;float:left;">
<script language='JavaScript' type='text/javascript' src='http://ariyes.net/adnetwork/adx.js'></script>
<script language='JavaScript' type='text/javascript'>
<!--
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);
   
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ariyes.net/adnetwork/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:20");
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
   document.write ("'><" + "/script>");
//-->
</script><noscript><a href='http://ariyes.net/adnetwork/adclick.php?n=a9627862' target='_blank'><img src='http://ariyes.net/adnetwork/adview.php?what=zone:20&amp;n=a9627862' border='0' alt=''></a></noscript>
</div>
<div style="width:125px;padding:10px;float:left;">
<script language='JavaScript' type='text/javascript' src='http://ariyes.net/adnetwork/adx.js'></script>
<script language='JavaScript' type='text/javascript'>
<!--
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);
   
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ariyes.net/adnetwork/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:21");
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
   document.write ("'><" + "/script>");
//-->
</script><noscript><a href='http://ariyes.net/adnetwork/adclick.php?n=aa456dd9' target='_blank'><img src='http://ariyes.net/adnetwork/adview.php?what=zone:21&amp;n=aa456dd9' border='0' alt=''></a></noscript>
</div>
<div style="width:125px;padding:10px;;float:left;">
<script language='JavaScript' type='text/javascript' src='http://ariyes.net/adnetwork/adx.js'></script>
<script language='JavaScript' type='text/javascript'>
<!--
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);
   
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ariyes.net/adnetwork/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:22");
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
   document.write ("'><" + "/script>");
//-->
</script><noscript><a href='http://ariyes.net/adnetwork/adclick.php?n=a3851772' target='_blank'><img src='http://ariyes.net/adnetwork/adview.php?what=zone:22&amp;n=a3851772' border='0' alt=''></a></noscript>
</div>
<div style="width:125px;padding:10px;float:left;">
<script language='JavaScript' type='text/javascript' src='http://ariyes.net/adnetwork/adx.js'></script>
<script language='JavaScript' type='text/javascript'>
<!--
   if (!document.phpAds_used) document.phpAds_used = ',';
   phpAds_random = new String (Math.random()); phpAds_random = phpAds_random.substring(2,11);
   
   document.write ("<" + "script language='JavaScript' type='text/javascript' src='");
   document.write ("http://ariyes.net/adnetwork/adjs.php?n=" + phpAds_random);
   document.write ("&amp;what=zone:23");
   document.write ("&amp;exclude=" + document.phpAds_used);
   if (document.referrer)
      document.write ("&amp;referer=" + escape(document.referrer));
   document.write ("'><" + "/script>");
//-->
</script><noscript><a href='http://ariyes.net/adnetwork/adclick.php?n=ae0ad87d' target='_blank'><img src='http://ariyes.net/adnetwork/adview.php?what=zone:23&amp;n=ae0ad87d' border='0' alt=''></a></noscript>
</div>
</div>

	<?php
}

    function wp_nano_ads_token_replacer($text,$replacers = array()){
        $text = str_replace("{admin_email}",$replacers['admin_email'],$text);
        $text = str_replace("{linkowner_email}",$replacers['linkowner_email'],$text);
        $text = str_replace("{linkowner_name}",$replacers['linkowner_name'],$text);
        $text = str_replace("{expire_date}",$replacers['expire_date'],$text);
        $text = str_replace("{link_url}",$replacers['link_url'],$text);
        $text = str_replace("{site_url}",get_option('site_url'),$text);
        return $text;
    }
     function wp_nano_ads_expired_email($content){
        global $table_prefix;
        //get the expire limit days
         $email_admin_now = (int) get_option('wp_nano_ads_is_email_admin_after_expire');
         $email_owner_now = (int) get_option('wp_nano_ads_is_email_owner_after_expire');
         $del_after_expire = (int) get_option('wp_nano_ads_is_delete_after_expire');
        if($email_admin_now == 1 || $email_owner_now){
            //get email format
            $admin_format = get_option('wp_nano_ads_expired_email_format_admin');
            $owner_format = get_option('wp_nano_ads_expired_email_format_owner');
            $admin_email  = get_option('wp_nano_ads_admin_email');
            $today = date("Y-m-d");
        
            $sql = "SELECT * FROM ".$table_prefix."wp_nano_ads WHERE end_date < '$today' AND notify_expired=0";
            $del_ids = "";
            $result = mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
               $replacers = array("admin_email" => $admin_email, "linkowner_email" => $row['link_owner_email'], "linkowner_name" =>$row['link_owner_name'],"expire_date" => $row['end_date']);
                if($row['type'] == 'link'){
                    $replacers['link_url'] = '<a href="'.$row['href'].'" target="'.$row['target'].'">'.$row['anchor'].'</a>';
                }
        else{
            $replacers['link_url'] = $row['anchor'];
        }
                $owner_message = wp_nano_ads_token_replacer($owner_format,$replacers);
                $admin_message = wp_nano_ads_token_replacer($admin_format,$replacers);
                //send owner email
                mail($row['link_owner_email'],"Link Expired",$owner_message); //change this later to wp_email 
                //send admin email
                mail($admin_email,"Link Expired",$admin_message); //change this later to wp_email
                //update the status
                mysql_query("UPDATE ".$table_prefix."wp_nano_ads SET notify_expired = 1 WHERE id = ".$row['id']);
                $del_ids .= $row['id'] . ",";
            }
            $del_ids = trim($del_ids,",");
            if($del_after_expire == 1 && $del_ids != ""){
                mysql_query("DELETE FROM ".$table_prefix."wp_nano_ads WHERE id IN($del_ids)");
            }
            
            
        }
        return $content;
    }
    
   function wp_nano_ads_custom_add_date($date,$day){
#$newdate = strtotime ( '-3 day' , strtotime ( $date ) ) ;
$newdate = strtotime ( $day , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-j' , $newdate );
return $newdate;

}

    function wp_nano_ads_expiring_email($content){
        global $table_prefix;
        //get the expire limit days
        $days_before = (int) get_option('wp_nano_ads_days_before');
        $email_now = (int) get_option('wp_nano_ads_is_email_admin_owner');
        if($email_now == 1){
            //get email format
            $admin_format = get_option('wp_nano_ads_expiring_email_format_admin');
            $owner_format = get_option('wp_nano_ads_expiring_email_format_owner');
            $admin_email  = get_option('wp_nano_ads_admin_email');

            $today = date("Y-m-d");
            if(function_exists('date_add')){
            $date = date_create($today);
            date_add($date, date_interval_create_from_date_string($days_before .' days'));
            $expiring_day = date_format($date, 'Y-m-d');
            }
else{
$expiring_day = wp_nano_ads_custom_add_date($today,'+'.$days_before.' day');
}
            
            
            $sql = "SELECT * FROM ".$table_prefix."wp_nano_ads WHERE end_date BETWEEN  '$today' AND '$expiring_day' AND notify_expire=0";
        
            $result = mysql_query($sql);
            while($row = mysql_fetch_assoc($result)){
                $replacers = array("admin_email" => $admin_email, "linkowner_email" => $row['link_owner_email'], "linkowner_name" =>$row['link_owner_name'],"expire_date" => $row['end_date']);
                
                 if($row['type'] == 'link'){
                    $replacers['link_url'] = '<a href="'.$row['href'].'" target="'.$row['target'].'">'.$row['anchor'].'</a>';
                }
        else{
            $replacers['link_url'] = $row['anchor'];
        }
                $owner_message = wp_nano_ads_token_replacer($owner_format,$replacers);
                $admin_message = wp_nano_ads_token_replacer($admin_format,$replacers);
                //send owner email
                mail($row['link_owner_email'],"Link Is Expiring",$owner_message); //change this later to wp_email 
                //send admin email
                mail($admin_email,"Link Is Expiring",$admin_message); //change this later to wp_email
                //update the status
                mysql_query("UPDATE ".$table_prefix."wp_nano_ads SET notify_expire = 1 WHERE id = ".$row['id']);
            }
        }
        return $content;
    }

    //widget part
	//LINKS PRINT AS STRINGS
	function wp_nano_ads_display_widget(){

	global $table_prefix;
    $today = date("Y-m-d");
    $sql_load_links = "SELECT * FROM ".$table_prefix."wp_nano_ads WHERE type='link' AND '$today' BETWEEN start_date AND end_date ORDER BY end_date";           
	$result_load = mysql_query($sql_load_links);
	
	
	echo '<div>';
	echo '<style>
		.nano_ad {
			display:inline;
			float:left;
			margin: 0 9px 9px 0;
			width:30px; height:30px;
		}
		.nano_ad a img {max-width:100%;}
		.nano_ad a { 
			float:left;
			width:30px;
			height:30px;
			border: 2px solid #c7c5c5;
			}
		.nano_ad a:hover {
			border: 2px solid #fff;
			}
		</style>
		';
	while($row = mysql_fetch_assoc($result_load)){
		if(is_home()){
		
			echo '<div class="nano_ad" ><a href="'.$row['href'].'" target="'.$row['target'].'" title ="'.$row['anchor'].'"><img width="30" height="30" src="'.$row['nano_img'].'" alt="'.$row['anchor'].'" /></a></div>';                      		
		}else{
           if($row['only_home'] != 1){
			echo '<div class="nano_ad" ><a href="'.$row['href'].'" target="'.$row['target'].'" title ="'.$row['anchor'].'"><img width="30" height="30"src="'.$row['nano_img'].'" alt="'.$row['anchor'].'" /></a></div>';
			}
        }
	}
	echo '</div><br style="clear:both;" />';
	$buy_ad_page = get_option('wp_nano_ads_buy_ad_page');
	$linkcolour = get_option('wp_nano_ads_buy_ad_colour');
	$show_by_ad = get_option('wp_nano_ads_buy_ad');
	if ($show_by_ad !=""){
		echo '<div><a style="color:#'.$linkcolour.'; display:block; font-size:8px; width:100%; margin:0px auto; text-align:center;" href="'.$buy_ad_page.'" title="buy and ad">Your ad here!</a></div>';
		}
	}
	
	//WIDGETS MANAGEMENT TOOL WHERE FETCH TITLE AND SHOW DATA
	function wp_nano_ads_widget($args) {
	extract($args);
 
	$options = get_option("wp_nano_ads_widget");
	if (!is_array( $options )){
		$options = array(
		'title' => 'WP Nano Ads Links'
      );
	}
 
	echo $before_widget;
    echo $before_title;
		echo $options['title'];
    echo $after_title;
 
    wp_nano_ads_display_widget();
	echo $after_widget;
	
	}
	
	
	
	//WIDGET CONTROL TOOLS
	function wp_nano_ads_widget_control(){
	$options = get_option("wp_nano_ads_widget");
	if (!is_array( $options )){
		$options = array('title' => 'WP Nano Ads Link Title');
	}
 
	if ($_POST['wpNanoAds-Submit']){
    $options['title'] = htmlspecialchars($_POST['wpNanoAds-WidgetTitle']);
    update_option("wp_nano_ads_widget", $options);
	}
 
	?>
	<p>
		<label for="wpNanoAds-WidgetTitle">Widget Title: </label>
		<input type="text" id="wpNanoAds-WidgetTitle" name="wpNanoAds-WidgetTitle" value="<?php echo $options['title'];?>" />
		<input type="hidden" id="wpNanoAds-Submit" name="wpNanoAds-Submit" value="1" />
	</p>
	<?php
	}


	//WIDGETS REGISTRATION FUNCTION 	
	function wpNanoAds_init(){
	register_sidebar_widget(__('WP Nano Ads Links'), 'wp_nano_ads_widget');
	register_widget_control(   'WP Nano Ads Links', 'wp_nano_ads_widget_control', 300, 200 );
	}

	//REGISTERED YOUR WIDGET HERE
	add_action("plugins_loaded", "wpNanoAds_init");
	
   function nano_widget_link_management_init() {		
    } 
    
	//===============================================================
	//---------------------------------------------------------------
	//===============================================================
	

	
	
 
    
    
    
//start of admin functionalities
if(preg_match('/wp-admin/',$_SERVER['PHP_SELF'])){

    /**
     * Function to add WP Nano Ads menu items to the wordpress menu
     */
    function wp_nano_ads_admin_menus(){
        add_menu_page('WP Link Management', 'WP Nano Ads', 8, __FILE__, 'wp_nano_ads_basic_config');
        add_submenu_page(__FILE__, 'Links', 'Links', 8, 'wp_nano_ads_all_links', 'wp_nano_ads_all_links');   
        add_submenu_page(__FILE__, 'Add Link', 'Add Link', 8, 'wp_nano_ads_add_link', 'wp_nano_ads_add_link');
        
    }
    
	function wp_nano_ads_is_valid_date($y,$m,$d){   
    if(!checkdate($m,$d,$y))
        return false;
    return true;
        
}
    /**
     * Function to include the basic configuration
     */
    function wp_nano_ads_basic_config(){
        require_once('wp_nano_adsconfig.php');
    }
    /**
     * Function to include all the links page
     */
    function wp_nano_ads_all_links(){
        require_once('show_allthe_links.php');
    }

    function wp_nano_ads_add_css_js(){
       $plugin_folder = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__)) . 'dp/'; 
        ?>
   <link rel="stylesheet" href="<?php echo $plugin_folder;?>themes/base/jquery.ui.all.css">
	<script src="<?php echo $plugin_folder;?>jquery-1.4.2.js"></script>
	<script src="<?php echo $plugin_folder;?>jquery.ui.core.js"></script>
	<script src="<?php echo $plugin_folder;?>jquery.ui.datepicker.js"></script>
	<link rel="stylesheet" href="<?php echo $plugin_folder;?>demos.css">
<script>
$(document).ready(function() {
	$(function() {
		$( "#start_date" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo $plugin_folder;?>/calendar.gif",
			buttonImageOnly: true
		});
		//$( "#start_date" ).datepicker( "option", "dateFormat", 'yy/mm/dd');
		$( "#end_date" ).datepicker({
			showOn: "button",
			buttonImage: "<?php echo $plugin_folder;?>/calendar.gif",
			buttonImageOnly: true
		});
	//	$( "#end_date" ).datepicker( "option", "dateFormat", 'yy/mm/dd');
	});
	
});

	</script>
        <?php
    }
    /**
     * Function to include add link page
     */
    function wp_nano_ads_add_link(){
        
        require_once('add_links.php');
    }
   
    function wp_nano_ads_create_db(){
    global $table_prefix;
    	$sql = "CREATE TABLE `".$table_prefix."wp_nano_ads` (
  `id` int(11) NOT NULL auto_increment,
  `href` varchar(300) collate latin1_general_ci NOT NULL,
  `anchor` text collate latin1_general_ci NOT NULL,
  `nano_img` varchar(300) collate latin1_general_ci NOT NULL,
  `type` varchar(20) collate latin1_general_ci NOT NULL,
  `only_home` int(11) NOT NULL,
  `target` varchar(15) collate latin1_general_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `link_owner_name` varchar(255) collate latin1_general_ci NOT NULL,
  `link_owner_email` varchar(255) collate latin1_general_ci NOT NULL,
  `notify_expired` int(11) NOT NULL,
  `notify_expire` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
)";
    	mysql_query($sql);
    }
	
   
} // end of admin functionalities
add_action('admin_menu', 'wp_nano_ads_admin_menus');
add_action('widgets_init', 'nano_widget_link_management_init');

add_action('the_content','wp_nano_ads_expiring_email');
add_action('the_content','wp_nano_ads_expired_email');
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'wp_nano_ads', 30, 30, true);
}


function wp_nano_ads_admin_scripts() {
	wp_enqueue_script('media-upload');
	wp_enqueue_script('thickbox');
	wp_register_script('my-upload', WP_PLUGIN_URL.'/wp-nano-ad/wp_nano_ads-img.js', array('jquery','media-upload','thickbox'));
	wp_enqueue_script('my-upload');
	
}
 add_shortcode('show_nano_ads', 'wp_nano_ads_display_widget');
 
function wp_nano_ads_admin_styles() {
wp_enqueue_style('thickbox');
}

if (isset($_GET['page']) && ($_GET['page'] == 'wp_nano_ads_add_link' || $_GET['page'] == 'wp_nano_ads_all_links')){
	
	
}
register_activation_hook(__FILE__, 'wp_nano_ads_create_db');
if(isset($_GET['page']) && ($_GET['page'] == 'wp_nano_ads_all_links' || $_GET['page'] == 'wp_nano_ads_add_link')){
	add_action('admin_head','wp_nano_ads_add_css_js');
	add_action('admin_print_scripts', 'wp_nano_ads_admin_scripts');
	add_action('admin_print_styles', 'wp_nano_ads_admin_styles');
	
}
?>