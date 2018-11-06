<?php 
	if( isset( $_GET[ 'main' ] ) )
	$main = $_GET[ 'main' ];
?>

<html>
	<head>
	<title>Current Exhibitions</title>
		<link rel="stylesheet" href="stylesheet/main.css" type="text/css"/>
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/display_sub_menu.js"></script>
	</head>
	<body>	
		<div id="wrapper">	
			<div class="br"></div>
			
<?php
	require( 'functions.php' );
	display_main_menu( $main );
?>
		<div class="center_block" style="width:1000px;">
				<div style="float:left;height:280px;width:215px;">
					<img src="images/chi_about.jpg" style="height:auto;width:100%;" />
				</div>
				<div class="about">
					<div>
						Clark House Initiative is a curatorial collaborative and a union of artists based in Bombay.
					</div>
					<div class="br"></div>
					<div>
						Clark House was once an office of pharmaceutical research, an antiques store, and the shipping office of the Thakur Shipping Company that had links to countries in the Middle East, Eastern Europe and Japan. Curatorial interventions in the space hope to continue, differently, this history of internationalism, experiment and research. It was established in October 2010 as a curatorial collaborative concerned with ideas of freedom.
					</div>
					<div class="br"></div>
					<div>
						Each of the founders at some point or another criss-crossed and worked together at the CSMVS museum in Mumbai. We would walk across the museum to this beautiful old building, under which we used to talk, imagining the changes we felt were pressing. That beautiful, decrepit building was called Clark House, from which we took our name, and from where our projects are based.
					</div>
					<div class="br"></div>
					<!-- <div>
						Sumesh Sharma's practice is informed by cultural perspectives on political and economic history. Histories of communities in India, language religion and politics in francophone Africa, and immigrant identities in Europe, form part of his research.  His Masters in Research at the Universite Paul Cezanne (2008) was an Inquiry into Artist Careers, and he was part of the Gwangju Biennale Curators Course 2010 as well as the first Independent Curators International's Curatorial Intensive in Bombay. He has been a resident at ISCP New York (2012), Kadist Art Foundation Paris (2013) and the Manifesta Online Residency (2013). Forgotten art histories and engaging young visual art practitioners to create an alternate exhibition history is his primary curatorial concern.  
					</div>
					<div class="br"></div>
					<div>
						Zasha Colah is interested in cultural sovereignty, and the way art addresses injustice and legal frameworks. Her curatorial work researches instances of collective imagination under situations of political exigency, political and philosophic motivations for choreography; and under-represented art historical narratives. She co-founded blackrice in 2008 in Nagaland, and the Clark House Initiative in Bombay in 2010, after studying art history at Oxford University and curatorial studies at the RCA, London. She was the curator of modern Indian art at the Jehangir Nicholson Art Foundation at the CSMVS museum (2008-2011), and was head of Public Programs at the National Gallery of Modern Art (2004-2005) in Bombay.
					</div> -->
				</div>
				<div class="about">
					<div>
					<div class="bold">Information:</div>
					Clark House Initiative<br>
					c/o RBT Group, Ground Floor, Clark House building, Colaba<br>
					8 Nathalal Parekh Marg (Old Wodehouse Road),<br>
					Bombay 400039,&#160;India
					<div class="br"></div>
					Opposite Sahakari Bhandar and Regal Cinema, next to Woodside Inn.
					<div class="br"></div>
					Open all days including Sundays from 11am-7pm during exhibitions.
					<div class="br"></div>
					+919820213816 
					<div class="br"></div>
					info@clarkhouseinitiative.org
					<div class="br"></div>
					clarkhouseinitiative.org
					</div>
					<div class="br"><a target="_blank" href="https://www.facebook.com/clarkhouseinitiative">facebook</a></div>
					<div class="br"></div>
					<div>
					Bus or Taxi from the nearest stations, Chhatrapati Shivaji Terminus (Central Railway) and Churchgate (Western Railway)
					<div class="br"></div>
					Bus Numbers from Chhatrapati Shivaji Terminus: 14, 69, 101,130
					<div class="br"></div>
					Bus Numbers from Churchgate: 70, 106, 122, 123, 132, 137
					</div>
					<div class="br"></div>
					<div class="bold">
					<a target="_blank" href="https://maps.google.fr/maps?q=google+maps+clark+house+bombay&ie=UTF-8&hq=&hnear=0x3be7d1c16fdc6163:0x4083aff7edd072d5,Clark+House,+N+Parjekar+Marg,+Dr+Ambedkar+Statue+Chowk+Area,+Colaba,+Mumbai,+Maharashtra+400001,+India&gl=fr&ei=dFEnUtW9MI3JrQfp8IGwBQ&ved=0CCwQ8gEwAA">Clark House on google maps</a>
					
					</div>
				</div>
			</div>  <!-- End of center_block -->
			
			
			<!--
			<div class="center_block" style="width:1000px;">
				<div style="float:left;height:280px;width:215px;">
					<img src="images/chi_about.jpg" style="height:auto;width:100%;" />
				</div>
				<div class="about">
					<div>
						Each of the founders at some point or another criss-crossed and worked together at the CSMVS museum in Mumbai. We would walk across the museum to this beautiful old building, under which we used to talk, imagining the changes we felt were pressing. That beautiful, decrepit building was called Clark House, from which we took our name, and from where our projects are based.
					</div>
					<div class="br"></div>
					<div>
					Clark House was once an office of pharmaceutical research, an antiques store, and the shipping office of the Thakur Shipping Company that had links to countries in the Middle East, Eastern Europe and Japan. Curatorial interventions in the space hope to continue, differently, this history of internationalism, experiment and research. It was established in October 2010 as a curatorial collaborative concerned with ideas of freedom.
					</div>
					<div class="br"></div>
					<div>
					Sumesh Sharma's practice is informed by cultural perspectives of political and economic history. Histories of communities in India, language religion and politics in francophone Africa, and immigrant identities in Europe, form part of his research.
					</div>
					<div class="br"></div>
					<div>
					Zasha Colah is interested in cultural sovereignty, and the way art addresses injustice and legal frameworks. Her curatorial work researches instances of collective imagination under situations of political exigency, political and philosophic motivations for choreography; and under-represented art historical narratives. She co-founded blackrice in 2008 in Nagaland, and the Clark House Initiative in Bombay in 2010, after studying art history at Oxford University and curatorial studies at the RCA, London. She was the curator of modern Indian art at the Jehangir Nicholson Art Foundation at the CSMVS museum (2008-2011), and was head of Public Programs at the National Gallery of Modern Art (2004-2005) in Bombay.	
					</div>
					<div class="br"></div>
					<div>
					</div>
				</div>
				<div class="about">
					<div>
					<div class="bold">Information:</div>
					Clark House Initiative<br>
					c/o RBT Group, Ground Floor, Clark House building<br>
					8 Nathalal Parekh Marg (Old Wodehouse Road),<br>
					Bombay 400039.
					<div class="br"></div>
					Opposite Sahakari Bhandar and Regal Cinema, next to Woodside Inn.
					<div class="br"></div>
					Open all days including Sundays from 11am-7pm during exhibitions.
					<div class="br"></div>
					+919820213816 info@clarkhouseinitiative.org
					<div class="br"></div>
					clarkhouseinitiative.org
					</div>
					<div class="br"></div>
					<div>
					Bus or Taxi from the nearest stations, Chhatrapati Shivaji Terminus (Central Railway) and Churchgate (Western Railway)
					<div class="br"></div>
					Bus Numbers from Chhatrapati Shivaji Terminus: 14, 69, 101,130
					<div class="br"></div>
					Bus Numbers from Churchgate: 70, 106, 122, 123, 132, 137
					</div>
					<div class="br"></div>
					<div class="bold">
					<a href="https://maps.google.fr/maps?q=google+maps+clark+house+bombay&ie=UTF-8&hq=&hnear=0x3be7d1c16fdc6163:0x4083aff7edd072d5,Clark+House,+N+Parjekar+Marg,+Dr+Ambedkar+Statue+Chowk+Area,+Colaba,+Mumbai,+Maharashtra+400001,+India&gl=fr&ei=dFEnUtW9MI3JrQfp8IGwBQ&ved=0CCwQ8gEwAA">Clark House on google maps?</a>
					
					</div>
				</div>
			</div>  
			
			-->
			
		</div>  <!-- End of wrapper -->
	</body>
</html>