<?php
	//Edit this code with your database credentials
	$link = mysql_connect('LoLCodexData.db.10536782.hostedresource.com', 'LoLCodexData', 'Israel90123!'); 
	if (!$link) { 
		die('Could not connect: ' . mysql_error()); 
	} 
	mysql_select_db('LoLCodexData', $link); 
?>