<?php
	/*
	EACH ROW HAS A DIV CALLED item_block AND AT END display_desc DISPLAYS DESCRIPTION
	*/
	get_files_from_dir( 'collections/images/*', $file_full_list );
	for( $i = 1; $i <= count( $file_full_list); $i++ )
	{
		get_f_name_from_path( $file_full_list[ $i - 1 ], $file_name );
		$cnt = count( $file_name );
		remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
		$file_desc = file_get_contents( 'collections/documents/'.$new_file_name.'.txt' );
		// starts the div for each row
		if( ( ( $i - 1 ) % 4 == 0 ) || ( $i == 1 ) )
		{
			echo('<div class="item_block">');
		}
		echo( "
		<div class='item'>
			<a href='display_orig_img.php?collect&src=$new_file_name&orig=".$file_full_list[ $i - 1 ]."'><img class='collect_img' src='".$file_full_list[ $i - 1 ]."' />
			<div class='caption'>
				<p>$file_desc</p>
			</div>
			<a>
		</div>
		" );
		// ends the div when 4 images are displayed
		if( ( $i == count( $file_full_list ) ) || ( $i % 4 == 0 ) )
		{
			echo( '<div class="display_desc"></div><div class="clear"></div></div>' );
		}
	}
?>