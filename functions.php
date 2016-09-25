<?php
// Sidebar Widgets
// http://automattic.com/code/widgets/themes/
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

// 404 Error Email Notification
// http://codex.wordpress.org/Conditional_Tags#Helpful_404_page
function errorNotify() {
$adminemail = get_bloginfo('admin_email');
$website = get_bloginfo('url');
$websitename = get_bloginfo('name');
if (!isset($_SERVER['HTTP_REFERER'])) {
	
	$casemessage = "<p>What you were looking for doesn't exist!</p>"; // If the visitor purposefully tried to go to something that wasn't there.
	
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
	$failuremess = "404 Error: $website" .$_SERVER['REQUEST_URI']."\n\n";
	$failuremess .= "Referred: ".$_SERVER['HTTP_REFERER']. "\n\n";
	$failuremess .= "IP: " .$_SERVER['REMOTE_ADDR']. "\n\n";
	$failuremess .= "Browser: " .$_SERVER['HTTP_USER_AGENT']. "\n\n";
	mail($adminemail, "[404] ".$_SERVER['REQUEST_URI'], $failuremess, "From: $websitename <noreply@$website>");

	$casemessage = '<p>I have been notified about this error.</p>'; // If the visitor accidentally tried to go to something that wasn't there.
 
 }  echo ' <span class="searchquery">'.$website.$_SERVER['REQUEST_URI'] . '</span> '; 
 
 echo $casemessage; } ?>
