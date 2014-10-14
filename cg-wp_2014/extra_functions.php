<?php
//functions tell whether there are previous or next 'pages' from the current page
//returns 0 if no 'page' exists, returns a number > 0 if 'page' does exist
//ob_ functions are used to suppress the previous_posts_link() and next_posts_link() from printing their output to the screen

function has_previous_posts() {
ob_start();
previous_posts_link();
$result = strlen(ob_get_contents());
ob_end_clean();
return $result;
}

function has_next_posts() {
ob_start();
next_posts_link();
$result = strlen(ob_get_contents());
ob_end_clean();
return $result;
}
?>
