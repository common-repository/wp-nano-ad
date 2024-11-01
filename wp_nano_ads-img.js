jQuery(document).ready(function() {
 
jQuery('#upload_image_button').click(function() {
 formfield = jQuery('#upload_image').attr('name');
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 function getExtension(filename) {
    return filename.split('.').pop().toLowerCase();
}

function nanoFile(file) { 
    switch(getExtension(file)) {
        case 'jpg':
			var newname = file.replace(".jpg", "-30x30.jpg");
            return newname;
        case 'jpeg':
			var newname = file.replace(".jpeg", "-30x30.jpeg");
            return newname;
        case 'png':
			var newname = file.replace(".png", "-30x30.png");
            return newname;
        case 'gif':
			var newname = file.replace(".gif", "-30x30.gif");
            return newname;
    }
}

window.send_to_editor = function(html) {
	imgurl = jQuery('img',html).attr('src');
	nano_imge = nanoFile(imgurl);
	jQuery('#upload_image').val(nano_imge);
//	jQuery('#nano_img').attr('src') = nano_imge;
 	tb_remove();
}
 
});