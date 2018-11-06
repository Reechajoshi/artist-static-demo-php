<?php

	function get_files_from_dir( $dir_path, &$file_full_list)
	{
		$dir = glob( $dir_path );
		$file_full_list = array();
		for( $i = 0; $i < count( $dir ); $i++ ) //loops through all files in direcotry
		{
			$file_full_list[] = $dir[ $i ];
		}
	}
	
	// function not needed
	/* function validate_email( $email )
	{
		if( preg_match( '/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*[@][_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*$/',$email ) === 1 )
			return( true );
		else
			return( false );
	} */
	
	function get_f_name_from_path( $path, &$file_name )
	{
		$file_name = explode( "/", $path );
	}
	
	function remove_ext( $old_file_name, &$new_file_name )
	{
		$file_name_arr = explode( ".", $old_file_name );
		$new_file_name = $file_name_arr[ 0 ];
	}
	
	function display_index_submenu( $selected_index )
	{
		$sub_menu = array( 'videos' );
		// $sub_menu = array( 'images', 'audio', 'videos', 'texts', 'imageA' );
		foreach( $sub_menu as $menu )
		{
			echo( '
			<div class="submenu_links">
				<a href ="info.php?main=index&menu='.$menu.'" style="font-weight:'.( ( trim( $selected_index ) == $menu ) ? ( 'bold' ) : ( 'normal' ) ).'">'.$menu.'</a>
			</div>
			' );
		}
	}
	
	function display_audio_links( $csv_file_path )
	{
		/* $file_contents = array();
		$file = fopen( $csv_file_path, "r" );
		error_log( "display file" );

		while( ( $row = fgetcsv( $file ) ) )
		{
			error_log( print_r( $row, true ) );
			$file_contents[] = $row;
		}

		fclose($file); */
		
		$row = 1;
		$file_contents = array();
		if ( ( $handle = fopen( $csv_file_path, "r" ) ) !== FALSE ) {
			while ( ( $data = fgetcsv( $handle ) ) !== FALSE ) {
			$file_contents[] =$data;
			$row++;
			}
			fclose( $handle );
		}
		error_log( print_r( $handle, true ) );
		return $file_contents;
	}
	
	function remove_number( $file_with_no, &$extracted_no_file )
	{
		$file_explode_arr = explode( "=", $file_with_no );
		$extracted_no_file = $file_explode_arr[ 1 ];
	}
	
	function get_desc_of_file( $file_name, &$file_desc )
	{
		$file_desc = file_get_contents( 'data/collections/documents/'.$file_name.'.txt' );
	}
	
	function extract_no( $file_name )
	{
		$file_name_arr = explode( '=', $file_name );
		return( $file_name_arr[1] );
	}
	
	function display_main_menu( $curr_menu )
	{
		echo( '
		<div class="left_column">
			<div><a style="text-decoration:none;" href="info.php">Clark House Initiative</a>Bombay is a curatorial collaborative concerned with ideas of freedom.</div>
			<div class="br"></div>
			<div class="main_menu">
				<div class="main_menu_links"><a id="program_link" href="info.php?main=prog" style="font-weight:'.( ( trim( $curr_menu ) == 'prog' ) ? ( 'bold' ) : ( 'normal' ) ).'" onclick="">program</a></div>
				<div class="main_menu_links"><a id="collaborators_link" href="info.php?main=collab" style="font-weight:'.( ( trim( $curr_menu ) == 'collab' ) ? ( 'bold' ) : ( 'normal' ) ).'" onclick="">collaborators</a></div>
				<!-- <div class="main_menu_links"><a id="collection_link" href="info.php?main=collect"  style="font-weight:'.( ( trim( $curr_menu ) == 'all_pdf' ) ? ( 'bold' ) : ( 'normal' ) ).'">collection</a></div> -->
				<div class="main_menu_links"><a id="index_link" href="info.php?main=index" style="font-weight:'.( ( trim( $curr_menu ) == 'index' ) ? ( 'bold' ) : ( 'normal' ) ).'" onclick="">index</a></div>
				<div class="main_menu_links"><a id="about_link" href="about.php?main=abt" style="font-weight:'.( ( trim( $curr_menu ) == 'abt' ) ? ( 'bold' ) : ( 'normal' ) ).'" onclick="">about</a></div>
				<!-- <div class="main_menu_links"><a id="snitch_on_link" href="info.php?main=all_pdf" style="font-weight:'.( ( trim( $curr_menu ) == 'all_pdf' ) ? ( 'bold' ) : ( 'normal' ) ).'" onclick="">snitch on</a></div> -->
				<div class="br"></div>
			</div>
			<div>Open all days including <br>Sundays from 11am-7pm during exhibitions.</div>
			<div class="br"></div>
			<div>Location & Directions<br>c/o RBT Group, Ground Floor, Clark House building, Colaba<br>8 Nathalal Parekh Marg<br>(Old Wodehouse Road),<br>Bombay 400039.</div>
			<div class="br"></div>
			<div>Opposite Sahakari Bhandar and Regal Cinema,<br> next to Woodside Inn.</div>
			<div class="br"></div>
			<div>+919820213816 info@clarkhouseinitiative.org<br> clarkhouseinitiative.org</div>
			<div class="br"></div>
			
			<div class="clear"></div>
		
			<div class="subscr_link">
				<div style="width:60px;">newsletter</div>
				<!-- <div style="width:200px;margin-top:10px;">
					<div style="float:left;width:60px;margin-top:4px;">First Name: </div>
					<input style="width:135px;float:left;" type="text" name="subscr_fname" id="subscr_fname" />
					<div class="clear"></div>
				</div>
				<div style="width:200px;margin-top:5px;">
					<div style="float:left;width:60px;margin-top:4px;">Last Name: </div>
					<input style="float:left;width:135px" type="text" name="subscr_lname" id="subscr_lname" />
					<div class="clear"></div>
				</div> -->
				<div style="width:200px;margin-top:5px;">
					<!-- <div style="float:left;width:60px;margin-top:4px;">email: </div> -->
					<input style="float:left;width:135px" value="email" type="text" name="subscr_email" id="subscr_email" />
					<div class="clear"></div>
				</div>
				<div style="width:60px;font-weight:bold;">
					<a href="#" id="subscribe_button">subscribe</a>
				</div>
			</div>
			
		</div>
		' );
	}
	
?>
