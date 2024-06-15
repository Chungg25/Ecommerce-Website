<?php
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 13-12-2020 04:46 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 

require_once 'config.php';

unset($_SESSION['facebook_access_token']);


unset($_SESSION['fb_user_id']);
unset($_SESSION['fb_user_name']);
unset($_SESSION['fb_user_email']);
unset($_SESSION['fb_user_pic']);


header("Location:index.php");
?>
