<?php
	require( 'functions.php' );
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
			<div class="subscribe_msg_title">Thank You for Subscribing</div>
			<div class="subscribe_msg_txt"><p>Your subscription has been confirmed. You've been added to our list and will hear from us soon.</p></div>
			<div class="subscribe_msg_back"><a style="font-size:15px;font-weight:bold;" id="subscription_back_button" href="#">Click here to Return to the Site.</a></div>
		</div>
		<div id="wrapper">
			<div class="br"></div>
			<?php display_main_menu(); // displays left column ?>
			<div class="center_block">
				<?php
				
					$exhibition = $_GET[ "exhib" ];
					
					$back_to_tnail = ( isset( $_GET[ 'index' ] ) && ( $_GET[ 'menu' ]=='images' )  ) ? ( "info.php?index&menu=images&exhib=$exhibition" ) : ( "info.php?collect" ); // href of bak to thumbnail link
					
					$current_image = $_GET[ 'orig' ]; // path of the current image
					
					// 	EXTRACT ONLY IMAGE NAME FROM THE FULL PATH
					get_f_name_from_path( $current_image, $file_name );
					$cnt = count( $file_name );
					remove_ext( $file_name[ $cnt - 1 ], $new_file_name );
					
					// CURRENT FILE NAME IS $new_file_name
					
					// EXTRACT DESCRIPTION FROM THE FOLDER WITH THE HELP OF FILE NAME
					get_desc_of_file( $exhibition.'/'.$new_file_name, $desc );
					
					// EXTRACT TOTAL NUMBER OF IMAGES IN THE FOLDER /data/collections
					get_files_from_dir( "data/collections/images/$exhibition/*.jpg", $file_full_list );
					$total_img_files = count( $file_full_list );
					
					// EXTRACT THE CURRENT IMAGE INDEX FROM THE LIST OF FILES
					$curr_idx = array_search ( $current_image, $file_full_list );
					
				?>	
				<div class="index_menu">
					<?php display_index_submenu(); ?>
				</div>
				<div class="orig_img_nav"> <!-- PREV NEXT NAVIGATION -->
				
					<!-- PREV BUTTON -->
					<a href="?<?php echo(  ( isset( $_GET[ 'index' ] ) ? ( 'index' ) : ( 'collect' ) ) ) ?>&menu=images&exhib=<?php echo( $exhibition ); ?>&orig=<?php echo( ( $curr_idx == 0 )?( $file_full_list[ $total_img_files - 1 ] ):( $file_full_list[ $curr_idx - 1 ] ) ); ?>" style="display:inline;">previous</a> / 
					<!-- NEXT BUTTON -->
					<a href="?<?php echo(  ( isset( $_GET[ 'index' ] ) ? ( 'index' ) : ( 'collect' ) ) ) ?>&menu=images&exhib=<?php echo( $exhibition ); ?>&orig=<?php echo( ( $curr_idx == ( $total_img_files - 1 ) )?( $file_full_list[ 0 ] ):( $file_full_list[ $curr_idx + 1 ] ) ); ?>" style="display:inline;">next</a>
					<!-- BACK TO THUMBNAIL -->
					<a href="<?php echo( $back_to_tnail ); ?>"> back to exhibition</a>
					
				
				<div class="br"></div>
				<?php
				echo( '
					<div>
					displaying image '.( $curr_idx + 1 ) .' of '.$total_img_files.'
					</div>
					<div class="br"></div>
					' );
					
					echo( '
					<div>'.$desc.'</div>
					' );
					?>
				</div>
				<div class="orig_img_block">
					<?php
						$src = $file_name[ 0 ].'/'.$file_name[ 1 ]."/high_res/$exhibition/".$new_file_name;
						echo( '
						<div class="orig_image">
							<a href="?index&menu=images&orig='.( ( $curr_idx == 9  ) ? ( $file_full_list[ 0 ]  ) : ( $file_full_list[ $curr_idx + 1 ] ) ).'">
								<img src="'.$src.'" title="next image"/>
							</a>
						</div>
						' );
					?>
				</div>
			</div>
		</div>
	</body>
</html>



	