<?php
$smsPage = true;

$emails = get_posts(array(
	'posts_per_page'	=> -1,
	'orderby'			=> 'modified',
	'order'				=> 'DESC',
	'post_type'			=> 'fx_sms',
	'post_status'		=> 'publish'
));

include(__DIR__ . '/inc/templates/email-list.php');
?>