<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Sistem Pendaftaran Online</title>
<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>jqueryui/development-bundle/themes/base/jquery-ui.css" rel="stylesheet"/>

	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/jquery-1.8.3.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.datepicker.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/external/jquery.bgiframe-2.1.2.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.mouse.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.button.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.draggable.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.position.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.resizable.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.dialog.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.ui.effect.js"></script>
	<script src="<?php echo base_url(); ?>jqueryui/development-bundle/ui/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
   
    $('a[href=#top]').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
    });

});

$(function() {
	$('#loading').ajaxStart(function(){
		$(this).fadeIn();
	}).ajaxStop(function(){
		$(this).fadeOut();
	});

	$('#leftPan ul li a').click(function() {
		var url = $(this).attr('href');
		$('#ambil').load(url);
		return true;
	});
});
</script>
</head>
<div id="loading" style="display:none"><img src="<?php echo base_url(); ?>images/loading.gif" /><br />Lagi Loading..... Tunggu...!</div>
