<?php

	require( 'functions.php' );
	$sub_fname = $_GET[ 'subscr_fname' ];
	$sub_lname = $_GET[ 'subscr_lname' ];
	$sub_email = $_GET[ 'subscr_email' ];
	
	file_get_contents( "http://snow.organisedmail.co.in/nok.x?s=amVoYW4=&ctid=NDE2NzkwZGUyNTViYThiNjFhMmZjODc1NmU5NDlkNzE=&emaddr=".$sub_email."&firstname=".$sub_fname."&lastname=".$sub_lname );
	
?>