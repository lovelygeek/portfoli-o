<div id="sidebar">

<?php 
// Widgetized sidebar, if you have the plugin installed.
// If you don't want widgets at all but want to write your own sidebar code,
// then just delete everything between the <ul> tags and go from there!
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar() ) : ?>
<p>No sidebar.</p>

<?php endif; ?>


</div>