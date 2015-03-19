<?php




	$template = @file_get_contents('templates/index.html');
	$template = str_replace('{navigation}', $navigation, $template);
	$template = str_replace('{content}', $content, $template);

	print($template);
?>