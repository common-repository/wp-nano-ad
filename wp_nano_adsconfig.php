<?php
//protect direct access to this plugin
if(!defined('DB_HOST')){
    die("Direct Access Restricted");
}
?>
<div class="icon32" id="icon-options-general"><br/></div>
<h2>WP Nano Ads Setup</h2>
<BR />
<?php 
//require_once('wp_nano_ads_ads.php');
//wp_nano_ads_newads();
?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options') ?>
<table class="form-table">
<tbody>
<tr class="tr">

    <td width="200"><strong>Admin Email:</strong></td>
    <td class="first">
    <?php
    if (get_option('wp_nano_ads_admin_email') == ''){
    	$wp_nano_ads_admin_email = get_option('admin_email');
    	} else {
    		$wp_nano_ads_admin_email =  get_option('wp_nano_ads_admin_email');
    }
    ?>
   <input type="text" class="regular-text" value="<?php echo $wp_nano_ads_admin_email;?>" id="wp_nano_ads_admin_email" name="wp_nano_ads_admin_email">
     </td>
</tr>

<tr class="tr">
    <td width="200"><strong>Show 'Your Ad Here' text?</strong></td>
    <td class="first"><input type="checkbox" id="wp_nano_ads_buy_ad" name="wp_nano_ads_buy_ad" <?php if(get_option('wp_nano_ads_buy_ad') == 1){echo " checked ";} ?> value="1"/></td>
</tr>
<tr class="tr">
    <td width="200"><strong>Colour for 'Your Ad Here' text</strong><br >Enter the colour code, without the #.</td>
    <td class="first">#<input type="text" class="regular-text" id="wp_nano_ads_buy_ad_colour" name="wp_nano_ads_buy_ad_colour" <?php if(get_option('wp_nano_ads_buy_ad_colour') != ""){echo 'value="'.get_option('wp_nano_ads_buy_ad_colour').'"';} ?> /></td>
</tr>
<tr class="tr">
    <td width="200"><strong>Enter URL for 'Buy an Ad' page.</strong><br />Create a page with details for buying an ad, then enter the url of that page here.</td>
    <td class="first"><input type="text" class="regular-text" id="wp_nano_ads_buy_ad_page" name="wp_nano_ads_buy_ad_page" <?php if(get_option('wp_nano_ads_buy_ad_page') != ""){echo 'value="'.get_option('wp_nano_ads_buy_ad_page').'"';} ?> /></td>
</tr>
<tr class="tr">

    <td width="200"><strong>Days before the link expires:</strong><br />Add the number of days before you want to send email notification to the link owner about their link expired, eg. 10</td>
    <td class="first">
   <input type="text" class="regular-text" value="<?php $daysbefore = get_option('wp_nano_ads_days_before'); if ($daysbefore =='') {$daysbefore=10;} echo $daysbefore; ?>" id="wp_nano_ads_days_before" name="wp_nano_ads_days_before">
     </td>
</tr>
<tr class="tr">

    <td width="200"><strong>Link Email Options:</strong></td>
    <td class="first">
   <input type="checkbox" <?php if(get_option('wp_nano_ads_is_email_admin_owner') == 1){
       echo " checked ";       
   }
 ?> name="wp_nano_ads_is_email_admin_owner" id="wp_nano_ads_is_email_admin_owner" value="1">Email Admin and Link Owner<BR>
   <input type="checkbox" <?php if(get_option('wp_nano_ads_is_email_admin_after_expire') == 1){
       echo ' checked ';       
   }?> name="wp_nano_ads_is_email_admin_after_expire" id="wp_nano_ads_is_email_admin_after_expire" value="1">Email Admin after link expire<BR>
 <input type="checkbox" <?php if(get_option('wp_nano_ads_is_email_owner_after_expire') == 1){
       echo " checked ";       
   }
 ?> name="wp_nano_ads_is_email_owner_after_expire" id="wp_nano_ads_is_email_owner_after_expire" value="1">Email Link Owner after link expire<BR>
 <input type="checkbox" <?php if(get_option('wp_nano_ads_is_delete_after_expire') == 1){
       echo " checked ";       
   }
 ?> name="wp_nano_ads_is_delete_after_expire" id="wp_nano_ads_is_delete_after_expire" value="1">Automatically Delete links after expire date<BR>
      </td>
</tr>

<tr class="tr">
    <td width="200"><strong>Link Expiring Email Notice for Link Owner:</strong></td>
    <td class="first">
    <b>Available Merge Fields</b><Br>
    Admin Email:{admin_email}<BR>
    Link Owner Email:{linkowner_email}<BR>
    Link Owner Name:{linkowner_name}<BR>
    Expire Date:{expire_date}<BR>
    Link URL:{link_url}<BR>
    Site URL:{site_url}<BR>
   <textarea  id="wp_nano_ads_expiring_email_format_owner" cols="60" rows="10" name="wp_nano_ads_expiring_email_format_owner"><?php $wp_nano_ads_expiring_email_format_owner = get_option('wp_nano_ads_expiring_email_format_owner'); if ($wp_nano_ads_expiring_email_format_owner == ""){echo "Hi {linkowner_name},

You have an ad placed on our site and its about to expire!

Your Ad for {site_url} will be removed on {expire_date}. We would like you to keep advertising with us so drop us an email at: {admin_email} and we can process another advertising slot for you.

Kind Regards,
{admin_email}";} else {echo $wp_nano_ads_expiring_email_format_owner;} ?></textarea>
     </td>
</tr>
<tr class="tr">

    <td width="200"><strong>Link Expiring Email Notice for Admin:</strong></td>
    <td class="first"> 
   <textarea  id="wp_nano_ads_expiring_email_format_admin" cols="60" rows="10" name="wp_nano_ads_expiring_email_format_admin"><?php $wp_nano_ads_exp_admin = get_option('wp_nano_ads_expiring_email_format_admin'); if ($wp_nano_ads_exp_admin == ""){ echo "Hi Admin,

An ad placed on our site is about to expire!

The Ad for {site_url} will be removed on {expire_date}. You can contact the client by email: {linkowner_email} their name is: {linkowner_name} , and their site is: {site_url}

Kind Regards,
WP Nano Ads Plugin";} else echo $wp_nano_ads_exp_admin; ?></textarea>
     </td>
</tr>
<tr class="tr">

    <td width="200"><strong>Link Expired Email Notice for Owner:</strong></td>
    <td class="first"> 
   <textarea  id="wp_nano_ads_expired_email_format_owner" cols="60" rows="10" name="wp_nano_ads_expired_email_format_owner"><?php $wp_nano_ads_expired_email_format_owner = get_option('wp_nano_ads_expired_email_format_owner'); if ($wp_nano_ads_expired_email_format_owner == ""){echo "Hi {linkowner_name},

You have an ad placed on our site and unfortunately it HAS EXPIRED!

Your Ad for {site_url} was removed on {expire_date}. We would like you to keep advertising with us so drop us an email at: {admin_email} and we can process another advertising slot for you.

Kind Regards,
{admin_email}";} else {echo $wp_nano_ads_expired_email_format_owner;} ?></textarea>
     </td>
</tr>
<tr class="tr">

    <td width="200"><strong>Link Expired Email Notice for Admin:</strong></td>
    <td class="first"> 
   <textarea  id="wp_nano_ads_expired_email_format_admin" cols="60" rows="10" name="wp_nano_ads_expired_email_format_admin"><?php $wp_nano_ads_expired_email_format_admin = get_option('wp_nano_ads_expired_email_format_admin'); if ($wp_nano_ads_expired_email_format_admin == ""){echo "Hi Admin,

An ad placed on our site HAS EXPIRED!

The Ad for {site_url} will be removed on {expire_date}. You can contact the client by email: {linkowner_email} their name is: {linkowner_name} , and their site is: {site_url}

Kind Regards,
WP Nano Ads Plugin";} else {echo $wp_nano_ads_expired_email_format_admin;} ?></textarea>
     </td>
</tr>
<tr class="tr">

    <td width="200">&nbsp;</td>
    <td class="first"> 
  <p><input type="submit" name="Submit" value="Update Options" /></p>
  <input type="hidden" name="action" value="update" />
  <input type="hidden" name="page_options" value="wp_nano_ads_admin_email,wp_nano_ads_buy_ad,wp_nano_ads_buy_ad_colour,wp_nano_ads_buy_ad_page,wp_nano_ads_days_before,wp_nano_ads_is_email_admin_owner,wp_nano_ads_is_email_admin_after_expire,wp_nano_ads_is_email_owner_after_expire,wp_nano_ads_is_delete_after_expire,wp_nano_ads_is_delete_after_expire,wp_nano_ads_expiring_email_format_owner,wp_nano_ads_expiring_email_format_admin,wp_nano_ads_expired_email_format_owner,wp_nano_ads_expired_email_format_admin" />
     </td>
</tr>

</tbody>
</table>