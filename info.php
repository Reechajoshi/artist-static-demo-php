<?php 
	require( 'functions.php' ); 
	$url = "http://$_SERVER[HTTP_HOST]";
	
	if( isset( $_GET[ 'main' ] ) ) // values: prog, collab, index, abt
		$main = $_GET[ 'main' ];
		
	if( isset( $_GET[ 'menu' ] ) )
		$idx_menu = $_GET[ 'menu' ];
?>
<html>
	<head>
		<title>Current Exhibitions</title>
		<link rel="stylesheet" href="stylesheet/main.css" type="text/css"/>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/display_sub_menu.js"></script>
	</head>
	
	<body>	
		<div class="subscribe_msg_div" id="subscribe_msg_div" style="display:none;">
			<!-- <div class="subscribe_msg_title">Thank You for Subscribing</div> -->
			<a href="#" id="subscription_back_button"><img style="float:right;" src="images/close.gif" /></a>
			<div class="subscribe_msg_txt"><p>You have been successfully been subscribed to the Clark House Initiative Mailing List.</p></div>
			<!-- <div class="subscribe_msg_back"><a style=""  href="#">Click here to Return to the Site.</a></div> -->
			
		</div>
		<div id="loader" style="display:none;"><img id="loading_symbol" src="images/loading.gif" /></div>
		<div id="wrapper">
			<div class="br"></div>
			<?php display_main_menu( $main );// displays left column ?>
			
			<!-- DISPLAYS THE MAIN CONTENTS OF THE PAGE -->
			<div class="center_block">
				<div class="clear"></div>
					<?php
						if( ( isset( $_GET['collect'] ) ) && ( !isset( $_GET[ 'src' ] ) ) ) // if collection links is clicked then display all thumbnails
						{
							require( 'collections.php' );
						}
						else if( $main == 'prog' ) // if program is clicked then display pdfs
						{
							/* get_files_from_dir( 'data/program/*', $file_full_list );
							$file_full_list = array_reverse ( $file_full_list );
							error_log( $file_name[ $cnt - 1 ]." richa " ); 
							echo( '<div class = "submenu_link_container">' );
							foreach( $file_full_list as $file )
							{
								get_f_name_from_path( $file, $file_name );
								$cnt = count( $file_name );
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name ); */
								/* echo( '
								<div class="submenu_links"><a href ="?prog&yr='.$new_file_name.'">' .$new_file_name. '</a></div>
								' ); */
								/* echo( '
									<div class="submenu_links"><a href ="#" onclick ="display_main_content(\'data/program/'.$_GET[ 'yr' ].'/' .$file_name[ $cnt - 1 ]. '\', this.innerHTML);return false;">' .$new_file_name. '</a></div>
								' );
							} 
							echo( '</div>' ); */
							/* if( isset( $_GET[ 'yr' ] ) )
							{
								get_files_from_dir( 'data/program/'.$_GET[ 'yr' ].'/*', $file_full_list );
								$file_full_list = array_reverse ( $file_full_list );
								echo( "<div class='submenu_link_container_2'>" );
								foreach( $file_full_list as $file )
								{
									get_f_name_from_path( $file, $file_name );
									$cnt = count( $file_name );
									remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
									
									if( !( is_dir( $file ) ) )
									{
										echo( '
										<div class="submenu_links"><a href ="#" onclick ="display_main_content(\'data/program/'.$_GET[ 'yr' ].'/' .$file_name[ $cnt - 1 ]. '\', this.innerHTML);return false;">' .$new_file_name. '</a></div>
										' );
									}
								}
								echo( "</div>" );
							} */
							
							get_files_from_dir( 'data/program/*.htm*', $file_full_list ); 
							foreach( $file_full_list as $file )
							{
								get_f_name_from_path( $file, $file_name );
								$cnt = count( $file_name );
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
								$new_file_name = extract_no( $new_file_name );
								echo( '
								<div class="submenu_links"><a href ="?" onclick ="display_main_content(\'data/program/' .$file_name[ $cnt - 1 ]. '\', this.innerHTML);return false;">' .$new_file_name. '</a></div>
								' );
							} 
						}
						else if( $main == 'collab' ) // if collaborators is clicked then display pdf of artist names
						{
							get_files_from_dir( 'data/collaborators/*', $file_full_list );
							foreach( $file_full_list as $file )
							{
								get_f_name_from_path( $file, $file_name );
								
								$cnt = count( $file_name );
								
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
								if( !( is_dir( $file ) ) )
								{
									$collab_name = remove_number( $new_file_name, $extracted_no_file );
									/* echo( '								
									<div class="submenu_links"><a href = "" onclick="display_main_content(\'data/collaborators/' .$new_file_name. '.htm\', this.innerHTML);return false;">' .$extracted_no_file. '</a></div>
									' ); */
									echo( '								
									<div class="submenu_links"><a href = "" onclick="display_main_content(\'data/collaborators/' .$new_file_name. '.pdf\', this.innerHTML);return false;">' .$new_file_name. '</a></div>
									' );
									
									
								}
							}
						}
						else if( ( $main == 'index' ) && ( !isset( $_GET[ 'menu' ] ) ) && ( !isset( $_GET[ 'orig' ] ) ) ) // just display all the submenus
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='images' ) && ( !isset( $_GET[ 'orig' ] ) ) && ( !isset( $_GET[ 'exhib' ] ) ) ) // if images is clicked from index then display all exhibitions
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							get_files_from_dir( "data/collections/images/*.jpg", $file_full_list );
							for( $i = 1; $i <= count( $file_full_list); $i++ )
							{
								get_f_name_from_path( $file_full_list[ $i - 1 ], $file_name );
								$cnt = count( $file_name );
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
								$file_desc = file_get_contents( 'data/collections/documents/'.$new_file_name.'.txt' );
								if( ( ( $i - 1 ) % 4 == 0 ) || ( $i == 1 ) )
								{
									echo('<div class="item_block">');
								}
								echo( "
								<div class='item'>
									<!-- <a href='display_orig_img.php?index&menu=images&orig=".$file_full_list[ $i-1 ]."'> -->
										<a href='info.php?main=index&menu=images&exhib=$new_file_name'>
										<img src='".$file_full_list[$i-1]."' style='width:100%;height:100%;'/>
										<div class='caption'>
											<p>$file_desc</p>
										</div>
									<a>
								</div>
								" );
								
								if( ( $i == count( $file_full_list ) ) || ( $i % 4 == 0 ) )
								{
									echo( '<div class="display_desc"></div><div class="clear"></div></div>' );
								}
							}
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='images' ) && ( !isset( $_GET[ 'orig' ] ) ) && ( isset( $_GET[ 'exhib' ] ) ) ) // if images is clicked from index then display all exhibitions
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							$exhibition_name = $_GET[ "exhib" ];
							get_files_from_dir( "data/collections/images/".$exhibition_name."/*.jpg", $file_full_list );
							
							for( $i = 0; $i < count( $file_full_list ); $i++ )
							{
								get_f_name_from_path( $file_full_list[ $i ], $file_name );
								$cnt = count( $file_name );
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
								$file_desc = file_get_contents( 'data/collections/documents/'.$exhibition_name.'/'.$new_file_name.'.txt' );
								if( ( $i % 4 == 0 ) || ( $i == 0 ) )
								{
									echo('<div class="item_block">');
								}
								echo( "
								<div class='item'>
										<a href='display_orig_img.php?index&menu=images&exhib=$exhibition_name&orig=".$file_full_list[ $i ]."'>
										<img src='".$file_full_list[$i]."' style='width:100%;height:100%;'/>
										<div class='caption'>
											<p>$file_desc</p>
										</div>
									<a>
								</div>
								" );
								
								if( ( ( $i == count( $file_full_list ) ) || ( $i % 3 == 0 ) ) && ( $i != 0 )  )
								{
									echo( '<div class="display_desc"></div><div class="clear"></div></div>' );
								}
							}
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='audio' ) ) // display all audio
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							// $audio_links_contents = display_audio_links( "/data/audio/links.csv" );
							$audio_links_contents = display_audio_links( "data/audio/links.csv" );
							for( $i = 0; $i <= count( $audio_links_contents ); $i++ )
							{
								echo('<a href="'.$audio_links_contents[ $i ][ 0 ].'">'.$audio_links_contents[ $i ][ 1 ].'</a>');
							}
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='videos' ) ) // display all video
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							
							$video_links_contents = display_audio_links( "data/video/links.csv" );
							for( $i = 0; $i <= count( $video_links_contents ); $i++ )
							{
								
								echo('<a target="blank" href="'.$video_links_contents[ $i ][ 0 ].'">'.$video_links_contents[ $i ][ 1 ].'</a>');
							}
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='texts' ) ) // display all texts
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							// $text_links_contents = display_audio_links( "/data/text/links.csv" );
							/* $text_links_contents = display_audio_links( "data/text/links.csv" );
							for( $i = 0; $i <= count( $text_links_contents ); $i++ )
							{
								echo('<a href="'.$text_links_contents[ $i ][ 0 ].'">'.$text_links_contents[ $i ][ 1 ].'</a>');
							} */
						}
						else if( ( isset( $_GET[ 'menu' ] ) ) && ( $_GET[ 'menu' ]=='imageA' ) )
						{
							display_index_submenu( $idx_menu );
							echo( '<div class="br"></div>' );
							echo( 'display all imageA' );
						}
						else if( isset( $_GET[ 'all_pdf' ] ) ) // if snitch on is clicked then display all pdfs
						{
							$dir = glob( "*/*.htm" );
							foreach( $dir as $pdf_file )
							{
								get_f_name_from_path( $pdf_file, $file_name );
								$cnt = count( $file_name );
								remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
								echo( '
								<div class="submenu_links">
									<a href="?all_pdf" onclick="display_main_content(\''.$pdf_file. '\', this.innerHTML);return false;">'.$new_file_name.'</a>
								</div>
								' );
							}
						}
						else
						{
							echo( "<div class='main_image'>
								<iframe name = 'home_page_pdf' id='home_page_pdf' src='data/home_page/home.pdf' style='width:100%;height:100%;'></iframe>
							</div>
							" );
							/* echo( "<div class='main_image'>
							<img style='width:800px;height:auto;'src = 'data/home_page/home.jpg'>
							</div>
							" ); */
						}
					?>
				<div class="clear"></div>
				
				<!-- DISPLAY SUBMENU -->
				<div class="submenu">
					<!-- CONTENTS ARE DISPLAYED WHEN LINKS ARE CLICKED -->
				</div>
			</div>
			<!-- USED TO DISPLAY PDF AT RIGHT OF PAGE -->
			<div class="main_content" style="display:none;">
				<!-- GENERATED THRU JAVASCRIPT -->
			</div>
			<div class="clear"></div>
		</div>
	</body>
</html>