<!-- If you'd like to display the date through your templates, and you don't want to change this through the WordPress settings (because it'd be universally applied), through PHP, then use the Formatting options in an array, like this: -->

<?php echo (types_render_field( "class-date", array("format" => "m/d/y @ g:ia") ));?>
