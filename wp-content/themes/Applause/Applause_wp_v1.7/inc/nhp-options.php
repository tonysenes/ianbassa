<?php

/*

 * 

 * Require the framework class before doing anything else, so we can use the defined urls and dirs

 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first

 *

 */

//define('NHP_OPTIONS_URL', site_url('path the options folder'));

if(!class_exists('NHP_Options')){

	require_once( dirname( __FILE__ ) . '/options/options.php' );

}



/*

 * 

 * Custom function for filtering the sections array given by theme, good for child themes to override or add to the sections.

 * Simply include this function in the child themes functions.php file.

 *

 * NOTE: the defined constansts for urls, and dir will NOT be available at this point in a child theme, so you must use

 * get_template_directory_uri() if you want to use any of the built in icons

 *

 */

function add_another_section($sections){

	

	//$sections = array();

	$sections[] = array(

				'title' => __('A Section added by hook', 'applause'),

				'desc' => __('<p class="description">This is a section created by adding a filter to the sections array, great to allow child themes, to add/remove sections from the options.</p>', 'applause'),

				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.

				//You dont have to though, leave it blank for default.

				'icon' => trailingslashit(get_template_directory_uri()).'options/img/glyphicons/glyphicons_062_attach.png',

				//Lets leave this as a blank section, no options just some intro text set above.

				'fields' => array()

				);

	

	return $sections;

	

}//function

//add_filter('applause-sections-twenty_eleven', 'add_another_section');





/*

 * 

 * Custom function for filtering the args array given by theme, good for child themes to override or add to the args array.

 *

 */

function change_framework_args($args){

	

	//$args['dev_mode'] = false;

	

	return $args;

	

}//function

//add_filter('applause-args-twenty_eleven', 'change_framework_args');



















/*

 * This is the meat of creating the optons page

 *

 * Override some of the default values, uncomment the args and change the values

 * - no $args are required, but there there to be over ridden if needed.

 *

 *

 */



function setup_framework_options(){



	$google_fonts = array( 

		 'Abel' => "Abel",

		 'Abril+Fatface' => "Abril Fatface",

		 'Aclonica' => "Aclonica",

		 'Actor' => "Actor",

		 'Adamina' => "Adamina",

		 'Aguafina+Script' => "Aguafina Script",

		 'Aladin' => "Aladin",

		 'Aldrich' => "Aldrich",

		 'Alice' => "Alice",

		 'Alike+Angular' => "Alike Angular",

		 'Alike' => "Alike",

		 'Allan' => "Allan",

		 'Allerta+Stencil' => "Allerta Stencil",

		 'Allerta' => "Allerta",

		 'Amaranth' => "Amaranth",

		 'Amatic+SC' => "Amatic SC",

		 'Andada' => "Andada",

		 'Andika' => "Andika",

		 'Annie+Use+Your+Telescope' => "Annie Use Your Telescope",

		 'Anonymous+Pro' => "Anonymous Pro",

		 'Antic' => "Antic",

		 'Anton' => "Anton",

		 'Arapey' => "Arapey",

		 'Architects+Daughter' => "Architects Daughter",

		 'Arimo' => "Arimo",

		 'Artifika' => "Artifika",

		 'Arvo' => "Arvo",

		 'Asset' => "Asset",

		 'Astloch' => "Astloch",

		 'Atomic+Age' => "Atomic Age",

		 'Aubrey' => "Aubrey",

		 'Bangers' => "Bangers",

		 'Bentham' => "Bentham",

		 'Bevan' => "Bevan",

		 'Bigshot+One' => "Bigshot One",

		 'Bitter' => "Bitter",

		 'Black+Ops+One' => "Black Ops One",

		 'Bowlby+One+SC' => "Bowlby One SC",

		 'Bowlby+One' => "Bowlby One",

		 'Brawler' => "Brawler",

		 'Bubblegum+Sans' => "Bubblegum Sans",

		 'Buda' => "Buda",

		 'Butcherman+Caps' => "Butcherman Caps",

		 'Cabin+Condensed' => "Cabin Condensed",

		 'Cabin+Sketch' => "Cabin Sketch",

		 'Cabin' => "Cabin",

		 'Cagliostro' => "Cagliostro",

		 'Calligraffitti' => "Calligraffitti",

		 'Candal' => "Candal",

		 'Cantarell' => "Cantarell",

		 'Cardo' => "Cardo",

		 'Carme' => "Carme",

		 'Carter+One' => "Carter One",

		 'Caudex' => "Caudex",

		 'Cedarville+Cursive' => "Cedarville Cursive",

		 'Changa+One' => "Changa One",

		 'Cherry+Cream+Soda' => "Cherry Cream Soda",

		 'Chewy' => "Chewy",

		 'Chicle' => "Chicle",

		 'Chivo' => "Chivo",

		 'Coda+Caption' => "Coda Caption",

		 'Coda' => "Coda",

		 'Comfortaa' => "Comfortaa",

		 'Coming+Soon' => "Coming Soon",

		 'Contrail+One' => "Contrail One",

		 'Convergence' => "Convergence",

		 'Cookie' => "Cookie",

		 'Copse' => "Copse",

		 'Corben' => "Corben",

		 'Cousine' => "Cousine",

		 'Coustard' => "Coustard",

		 'Covered+By+Your+Grace' => "Covered By Your Grace",

		 'Crafty+Girls' => "Crafty Girls",

		 'Creepster+Caps' => "Creepster Caps",

		 'Crimson+Text' => "Crimson Text",

		 'Crushed' => "Crushed",

		 'Cuprum' => "Cuprum",

		 'Damion' => "Damion",

		 'Dancing+Script' => "Dancing Script",

		 'Dawning+of+a+New+Day' => "Dawning of a New Day",

		 'Days+One' => "Days One",

		 'Delius+Swash+Caps' => "Delius Swash Caps",

		 'Delius+Unicase' => "Delius Unicase",

		 'Delius' => "Delius",

		 'Devonshire' => "Devonshire",

		 'Didact+Gothic' => "Didact Gothic",

		 'Dorsa' => "Dorsa",

		 'Dr+Sugiyama' => "Dr Sugiyama",

		 'Droid+Sans+Mono' => "Droid Sans Mono",

		 'Droid+Sans' => "Droid Sans",

		 'Droid+Serif' => "Droid Serif",

		 'EB+Garamond' => "EB Garamond",

		 'Eater+Caps' => "Eater Caps",

		 'Expletus+Sans' => "Expletus Sans",

		 'Fanwood+Text' => "Fanwood Text",

		 'Federant' => "Federant",

		 'Federo' => "Federo",

		 'Fjord+One' => "Fjord One",

		 'Fondamento' => "Fondamento",

		 'Fontdiner+Swanky' => "Fontdiner Swanky",

		 'Forum' => "Forum",

		 'Francois+One' => "Francois One",

		 'Gentium+Basic' => "Gentium Basic",

		 'Gentium+Book+Basic' => "Gentium Book Basic",

		 'Geo' => "Geo",

		 'Geostar+Fill' => "Geostar Fill",

		 'Geostar' => "Geostar",

		 'Give+You+Glory' => "Give You Glory",

		 'Gloria+Hallelujah' => "Gloria Hallelujah",

		 'Goblin+One' => "Goblin One",

		 'Gochi+Hand' => "Gochi Hand",

		 'Goudy+Bookletter+1911' => "Goudy Bookletter 1911",

		 'Gravitas+One' => "Gravitas One",

		 'Gruppo' => "Gruppo",

		 'Hammersmith+One' => "Hammersmith One",

		 'Herr+Von+Muellerhoff' => "Herr Von Muellerhoff",

		 'Holtwood+One+SC' => "Holtwood One SC",

		 'Homemade+Apple' => "Homemade Apple",

		 'IM+Fell+DW+Pica+SC' => "IM Fell DW Pica SC",

		 'IM+Fell+DW+Pica' => "IM Fell DW Pica",

		 'IM+Fell+Double+Pica+SC' => "IM Fell Double Pica SC",

		 'IM+Fell+Double+Pica' => "IM Fell Double Pica",

		 'IM+Fell+English+SC' => "IM Fell English SC",

		 'IM+Fell+English' => "IM Fell English",

		 'IM+Fell+French+Canon+SC' => "IM Fell French Canon SC",

		 'IM+Fell+French+Canon' => "IM Fell French Canon",

		 'IM+Fell+Great+Primer+SC' => "IM Fell Great Primer SC",

		 'IM+Fell+Great+Primer' => "IM Fell Great Primer",

		 'Iceland' => "Iceland",

		 'Inconsolata' => "Inconsolata",

		 'Indie+Flower' => "Indie Flower",

		 'Irish+Grover' => "Irish Grover",

		 'Istok+Web' => "Istok Web",

		 'Jockey+One' => "Jockey One",

		 'Josefin+Sans' => "Josefin Sans",

		 'Josefin+Slab' => "Josefin Slab",

		 'Judson' => "Judson",

		 'Julee' => "Julee",

		 'Jura' => "Jura",

		 'Just+Another+Hand' => "Just Another Hand",

		 'Just+Me+Again+Down+Here' => "Just Me Again Down Here",

		 'Kameron' => "Kameron",

		 'Kelly+Slab' => "Kelly Slab",

		 'Kenia' => "Kenia",

		 'Knewave' => "Knewave",

		 'Kranky' => "Kranky",

		 'Kreon' => "Kreon",

		 'Kristi' => "Kristi",

		 'La+Belle+Aurore' => "La Belle Aurore",

		 'Lancelot' => "Lancelot",

		 'Lato' => "Lato",

		 'League+Script' => "League Script",

		 'Leckerli+One' => "Leckerli One",

		 'Lekton' => "Lekton",

		 'Lemon' => "Lemon",

		 'Limelight' => "Limelight",

		 'Linden+Hill' => "Linden Hill",

		 'Lobster+Two' => "Lobster Two",

		 'Lobster' => "Lobster",

		 'Lora' => "Lora",

		 'Love+Ya+Like+A+Sister' => "Love Ya Like A Sister",

		 'Loved+by+the+King' => "Loved by the King",

		 'Luckiest+Guy' => "Luckiest Guy",

		 'Maiden+Orange' => "Maiden Orange",

		 'Mako' => "Mako",

		 'Marck+Script' => "Marck Script",

		 'Marvel' => "Marvel",

		 'Mate+SC' => "Mate SC",

		 'Mate' => "Mate",

		 'Maven+Pro' => "Maven Pro",

		 'Meddon' => "Meddon",

		 'MedievalSharp' => "MedievalSharp",

		 'Megrim' => "Megrim",

		 'Merienda+One' => "Merienda One",

		 'Merriweather' => "Merriweather",

		 'Metrophobic' => "Metrophobic",

		 'Michroma' => "Michroma",

		 'Miltonian+Tattoo' => "Miltonian Tattoo",

		 'Miltonian' => "Miltonian",

		 'Miss+Fajardose' => "Miss Fajardose",

		 'Miss+Saint+Delafield' => "Miss Saint Delafield",

		 'Modern+Antiqua' => "Modern Antiqua",

		 'Molengo' => "Molengo",

		 'Monofett' => "Monofett",

		 'Monoton' => "Monoton",

		 'Monsieur+La+Doulaise' => "Monsieur La Doulaise",

		 'Montez' => "Montez",

		 'Mountains+of+Christmas' => "Mountains of Christmas",

		 'Mr+Bedford' => "Mr Bedford",

		 'Mr+Dafoe' => "Mr Dafoe",

		 'Mr+De+Haviland' => "Mr De Haviland",

		 'Mrs+Sheppards' => "Mrs Sheppards",

		 'Muli' => "Muli",

		 'Neucha' => "Neucha",

		 'Neuton' => "Neuton",

		 'News+Cycle' => "News Cycle",

		 'Niconne' => "Niconne",

		 'Nixie+One' => "Nixie One",

		 'Nobile' => "Nobile",

		 'Nosifer+Caps' => "Nosifer Caps",

		 'Nothing+You+Could+Do' => "Nothing You Could Do",

		 'Nova+Cut' => "Nova Cut",

		 'Nova+Flat' => "Nova Flat",

		 'Nova+Mono' => "Nova Mono",

		 'Nova+Oval' => "Nova Oval",

		 'Nova+Round' => "Nova Round",

		 'Nova+Script' => "Nova Script",

		 'Nova+Slim' => "Nova Slim",

		 'Nova+Square' => "Nova Square",

		 'Numans' => "Numans",

		 'Nunito' => "Nunito",

		 'Old+Standard+TT' => "Old Standard TT",

		 'Open+Sans+Condensed' => "Open Sans Condensed",

		 'Open+Sans' => "Open Sans",

		 'Open+Sans+Caption' => "Open Sans Caption",

		 'Open+Sans+Narrow' => "Open Sans Narrow",

		 'Orbitron' => "Orbitron",

		 'Open+Sans' => "Open Sans",

		 'Over+the+Rainbow' => "Over the Rainbow",

		 'Ovo' => "Ovo",

		 'PT+Serif+Caption' => "PT Serif Caption",

		 'PT+Serif' => "PT Serif",

		 'Pacifico' => "Pacifico",

		 'Passero+One' => "Passero One",

		 'Patrick+Hand' => "Patrick Hand",

		 'Paytone+One' => "Paytone One",

		 'Permanent+Marker' => "Permanent Marker",

		 'Petrona' => "Petrona",

		 'Philosopher' => "Philosopher",

		 'Piedra' => "Piedra",

		 'Pinyon+Script' => "Pinyon Script",

		 'Play' => "Play",

		 'Playfair+Display' => "Playfair Display",

		 'Podkova' => "Podkova",

		 'Poller+One' => "Poller One",

		 'Poly' => "Poly",

		 'Pompiere' => "Pompiere",

		 'Prata' => "Prata",

		 'Prociono' => "Prociono",

		 'Puritan' => "Puritan",

		 'Quattrocento+Sans' => "Quattrocento Sans",

		 'Quattrocento' => "Quattrocento",

		 'Questrial' => "Questrial",

		 'Quicksand' => "Quicksand",

		 'Radley' => "Radley",

		 'Raleway' => "Raleway",

		 'Rammetto+One' => "Rammetto One",

		 'Rancho' => "Rancho",

		 'Rationale' => "Rationale",

		 'Redressed' => "Redressed",

		 'Reenie+Beanie' => "Reenie Beanie",

		 'Ribeye+Marrow' => "Ribeye Marrow",

		 'Ribeye' => "Ribeye",

		 'Righteous' => "Righteous",

		 'Rochester' => "Rochester",

		 'Rock+Salt' => "Rock Salt",

		 'Rokkitt' => "Rokkitt",

		 'Rosario' => "Rosario",

		 'Ruslan+Display' => "Ruslan Display",

		 'Salsa' => "Salsa",

		 'Sancreek' => "Sancreek",

		 'Sansita+One' => "Sansita One",

		 'Satisfy' => "Satisfy",

		 'Schoolbell' => "Schoolbell",

		 'Shadows+Into+Light' => "Shadows Into Light",

		 'Shanti' => "Shanti",

		 'Short+Stack' => "Short Stack",

		 'Sigmar+One' => "Sigmar One",

		 'Signika+Negative' => "Signika Negative",

		 'Signika' => "Signika",

		 'Six+Caps' => "Six Caps",

		 'Slackey' => "Slackey",

		 'Smokum' => "Smokum",

		 'Smythe' => "Smythe",

		 'Sniglet' => "Sniglet",

		 'Snippet' => "Snippet",

		 'Sorts+Mill+Goudy' => "Sorts Mill Goudy",

		 'PT+Sans' => "PT Sans",

		 'Special+Elite' => "Special Elite",

		 'Spinnaker' => "Spinnaker",

		 'Spirax' => "Spirax",

		 'Stardos+Stencil' => "Stardos Stencil",

		 'Sue+Ellen+Francisco' => "Sue Ellen Francisco",

		 'Sunshiney' => "Sunshiney",

		 'Supermercado+One' => "Supermercado One",

		 'Swanky+and+Moo+Moo' => "Swanky and Moo Moo",

		 'Syncopate' => "Syncopate",

		 'Tangerine' => "Tangerine",

		 'Tenor+Sans' => "Tenor Sans",

		 'Terminal+Dosis' => "Terminal Dosis",

		 'The+Girl+Next+Door' => "The Girl Next Door",

		 'Tienne' => "Tienne",

		 'Tinos' => "Tinos",

		 'Tulpen+One' => "Tulpen One",

		 'Ubuntu+Condensed' => "Ubuntu Condensed",

		 'Ubuntu+Mono' => "Ubuntu Mono",

		 'Ubuntu' => "Ubuntu",

		 'Ultra' => "Ultra",

		 'UnifrakturCook' => "UnifrakturCook",

		 'UnifrakturMaguntia' => "UnifrakturMaguntia",

		 'Unkempt' => "Unkempt",

		 'Unlock' => "Unlock",

		 'Unna' => "Unna",

		 'VT323' => "VT323",

		 'Varela+Round' => "Varela Round",

		 'Varela' => "Varela",

		 'Vast+Shadow' => "Vast Shadow",

		 'Vibur' => "Vibur",

		 'Vidaloka' => "Vidaloka",

		 'Volkhov' => "Volkhov",

		 'Vollkorn' => "Vollkorn",

		 'Voltaire' => "Voltaire",

		 'Waiting+for+the+Sunrise' => "Waiting for the Sunrise",

		 'Wallpoet' => "Wallpoet",

		 'Walter+Turncoat' => "Walter Turncoat",

		 'Wire+One' => "Wire One",

		 'Yanone+Kaffeesatz' => "Yanone Kaffeesatz",

		 'Yellowtail' => "Yellowtail",

		 'Yeseva+One' => "Yeseva One",

		 'Zeyada' => "Zeyada",

	);

	$args = array();



//Set it to dev mode to view the class settings/info in the form - default is false

$args['dev_mode'] = true;



//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS

//$args['google_api_key'] = '***';



//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!

//$args['stylesheet_override'] = true;



//Add HTML before the form

//$args['intro_text'] = __('<p>Don\'t forget to save the settings!</p>', 'applause');



//Setup custom links in the footer for share icons

$args['share_icons']['twitter'] = array(

										'link' => 'http://www.twitter.com/metrothemes',

										'title' => 'My twitter account', 

										'img' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'

										);

$args['share_icons']['themeforest'] = array(

										'link' => 'http://themeforest.net/user/metrothemes',

										'title' => 'My themeforest account',

										'img' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_050_link.png'

										);


$args['share_icons']['dribbble'] = array(

										'link' => 'http://www.dribbble.com/metrothemes',

										'title' => 'My dribbble account',

										'img' => NHP_OPTIONS_URL . 'img/glyphicons/glyphicons_334_dribbble.png'

										);

//Choose to disable the import/export feature

//$args['show_import_export'] = false;



//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores

$args['opt_name'] = 'bub_mt';



$args['google_api_key'] = 'AIzaSyB0_zr4gsc6PkFl5UiHDj6ROiXtuYb7QBk';



//Custom menu icon

//$args['menu_icon'] = '';



//Custom menu title for options page - default is "Options"

$args['menu_title'] = __('Applause Options', 'applause');



//Custom Page Title for options page - default is "Options"

$args['page_title'] = __('Applause Theme Options', 'applause');



//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "nhp_theme_options"

$args['page_slug'] = 'applause_options';



//Custom page capability - default is set to "manage_options"

//$args['page_cap'] = 'manage_options';



//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"

//$args['page_type'] = 'submenu';



//parent menu - default is set to "themes.php" (Appearance)

//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters

//$args['page_parent'] = 'themes.php';



//custom page location - default 100 - must be unique or will override other items

$args['page_position'] = null;



$args['footer_credit'] = '';



//Custom page icon class (used to override the page icon next to heading)

//$args['page_icon'] = 'icon-themes';



//Want to disable the sections showing as a submenu in the admin? uncomment this line

//$args['allow_sub_menu'] = false;

		

//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		

$args['help_tabs'][] = array(

							'id' => 'applause-1',

							'title' => __('Theme Information 1', 'applause'),

							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'applause')

							);

$args['help_tabs'][] = array(

							'id' => 'applause-2',

							'title' => __('Theme Information 2', 'applause'),

							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'applause')

							);



//Set the Help Sidebar for the options page - no sidebar by default										

$args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'applause');







$sections = array();



$sections[] = array(

				'title' => __('General Settings', 'applause'),

				'desc' => __('<p class="description">Here you can configure the general aspects of the theme.!</p>', 'applause'),

				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.

				//You dont have to though, leave it blank for default.

				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png',

				'fields' => array(


					//Favicon
					array(

						'id' => 'favicon',

						'type' => 'upload',

						'title' => 'Favicon',

						'sub_desc' => 'This is the little icon in the address bar for your website Size should be 32x32px'

						),

					// Site Logo
					array(

						'id' => 'logo',

						'type' => 'upload',

						'title' => 'Logo',

						'sub_desc' => 'Upload your site logo , 222x246 recommended'
						
						),

				//Header Image 
					array(

						'id' => 'header_image',

						'type' => 'button_set',

						'options' => array('1' => 'Yes', '0' => 'No'),

						'title' => 'Enable Home Page Image',

						'sub_desc' => '<strong>Please note that if you enable it , Then you need to disable Home Page Video option </strong>',

						'std' => 1

						),

				 //home page background
					array(

						'id' => 'home_bg',

						'type' => 'upload',

						'title' => 'Home Background for Big Display',

						'sub_desc' => 'Upload your home background image For Big display 1920px width recommended'
						
						),	

				 //home page background For Tablet
					array(

						'id' => 'home_bg_tab',

						'type' => 'upload',

						'title' => 'Home Background for Tablet',

						'sub_desc' => 'Upload your home background image For Big display 800px width recommended'
						
						),	

				 //home page background For Mobile
					array(

						'id' => 'home_bg_mobile',

						'type' => 'upload',

						'title' => 'Home Background for Mobile',

						'sub_desc' => 'Upload your home background image For Big display 400px width recommended'
						
						),	



				//Header Video 
					array(

						'id' => 'header_video',

						'type' => 'button_set',

						'options' => array('1' => 'Yes', '0' => 'No'),

						'title' => 'Enable Home Page Video',

						'sub_desc' => '<strong>Please note that if you enable it , Then you need to disable Header Page Image option </strong>',

						'std' => 0

						),

				//Header Video url
					array(

						'id' => 'header_video_url',

						'type' => 'text',

						'title' => 'Past your Home page video url',

						'std' => 'https://www.youtube.com/watch?v=cfaE_mcixpQ'

						),	



				//Contact Background Image
					array(

						'id' => 'contact_bg',

						'type' => 'upload',

						'title' => 'Contact Background',

						'sub_desc' => 'Upload your contact background image'
						
						),

				//Contact Background color 
					array(

						'id' => 'contact_color',

						'title' => 'Contact Background Color',

						'type' => 'color',

						'sub_desc' => 'Background Color For the contact section',

						'std' => ''

						),
					//blog page

					array(

						'id' => 'blog_page_link',

						'type' => 'pages_multi_select',

						'title' => 'Page used for the blog page',

						'sub_desc' => 'This will be added in the menu if you don\'t setup the menu in Appearance > Menus',

						'args' => array(),

						'std' => ''

						),

				    //Contact Page Title

					array(

						'id' => 'c_title',

						'type' => 'text',

						'title' => 'Contact Page Title',

						'std' => 'Connect with us'

						),					


					//Title For social network

					array(

						'id' => 's_title',

						'type' => 'text',

						'title' => 'Social Network Title',

						'std' => 'follow us on social networks'

						),

					//Contact Address

					array(

						'id' => 'contact_address',

						'type' => 'text',

						'title' => 'Contatct Address',

						'sub_desc' => 'Add your contact address <br/>Example: <b>Street 123, New York</b>',

						'std' => ''

						),

					//Phone

					array(

						'id' => 'phone',

						'type' => 'text',

						'title' => 'Phone',

						'sub_desc' => 'The phone shows up in the contact sections.',

						'std' => ''

						),

					//Fax

					array(

						'id' => 'fax_add',

						'type' => 'text',

						'title' => 'Fax',

						'sub_desc' => 'The FAX address shows up in the contact sections.',

						'std' => ''

						),					

					//Email Address
					array(

						'id' => 'email_add',

						'type' => 'text',

						'title' => 'Email',

						'sub_desc' => 'The Email address shows up in the contact sections.',

						'std' => ''

						),					

					//contact email

					array(

						'id' => 'email',

						'type' => 'text',

						'title' => 'Contact form e-mail',

						'sub_desc' => 'This is the e-mail where you\'ll receive all the messages from the contact page',

						'std' =>'admin@metrotheme.me'

						),

					// Contact Address Box 
					array(

						'id' => 'c_address_box',

						'type' => 'textarea',

						'title' => 'Contact Address Box',

						'sub_desc' => 'it will display on google map ',

						'std' => ' <h4>Main Hq</h4>
                <p>0000 Street <br>City, Country 0000</p>
                <p>0-000-000000 <br>(0-000-000-0000)</p>
                <p>Headquarters Staff Directory</p> '

						),

					array(

						'id' => 'enable_googlemap',

						'type' => 'button_set',

						'options' => array('1' => 'Yes', '0' => 'No'),

						'title' => 'Google Map show option',

						'sub_desc' => '<strong>You can Enable or Disable the Google map in contact section ,By default it is Enable</strong>',

						'std' => 1

						),

					//Google map
					array(

						'id' => 'gmap_address',

						'type' => 'textarea',

						'title' => 'Google Map Address',

						'sub_desc' => 'Write your Address to show the map in contact section .Example: 9930 124th Avenue Northeast Kirkland, Washington',

						'std' => 'Haltern am See, Weseler Str. 151'

						),				


					//Footer text 
					array(

						'id' => 'footer_text',

						'type' => 'textarea',

						'title' => 'Footer text',

						'sub_desc' => ' Footer copyright text .',

						'std' => '<p>&copy;2013 made with love by <a href="http://metrothemes.me">metrothemes</a></p>'

						),


	

					)

				);

$sections[] = array(

				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_082_roundabout.png',

				'title' => __('Social Network', 'applause'),

				'desc' => __('<p class="description">Add your social network links </p>', 'applause'),

				'fields' => array(
					
					//Twitter

					array(

						'id' => 'ap_twitter',

						'type' => 'text',

						'title' => 'Twitter Profile',

						'sub_desc' => 'Add your Twitter profile link',

						'std' => ''

						),	

					//Google plus

					array(

						'id' => 'ap_google_plus',

						'type' => 'text',

						'title' => 'Google plus Profile',

						'sub_desc' => 'Add your Google plus profile link',

						'std' => ''

						),	

					//Soundcloud

					array(

						'id' => 'ap_soundcloud',

						'type' => 'text',

						'title' => 'Soundcloud Profile',

						'sub_desc' => 'Add your Soundcloud profile link',

						'std' => ''

						),	

					//Facebok

					array(

						'id' => 'ap_facebok',

						'type' => 'text',

						'title' => 'Facebok Profile',

						'sub_desc' => 'Add your Facebok profile link',

						'std' => ''

						),	

					//Flickr

					array(

						'id' => 'ap_flickr',

						'type' => 'text',

						'title' => 'Flickr Profile',

						'sub_desc' => 'Add your Flickr profile link',

						'std' => ''

						),	


					//Instagram

					array(

						'id' => 'ap_instagram',

						'type' => 'text',

						'title' => 'Instagram Profile',

						'sub_desc' => 'Add your Instagram profile link',

						'std' => ''

						),	

					//Last fm

					array(

						'id' => 'ap_lastfm',

						'type' => 'text',

						'title' => 'Last fm Profile',

						'sub_desc' => 'Add your Last fm profile link',

						'std' => ''

						),	

					//Pinterest

					array(

						'id' => 'ap_pinterest',

						'type' => 'text',

						'title' => 'Pinterest Profile',

						'sub_desc' => 'Add your Pinterest profile link',

						'std' => ''

						),	


					//Youtube

					array(

						'id' => 'ap_youtube',

						'type' => 'text',

						'title' => 'Youtube Profile',

						'sub_desc' => 'Add your Youtube profile link',

						'std' => ''

						),	
					)

				);
$sections[] = array(

				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_150_check.png',

				'title' => __('Navigation', 'applause'),

				'desc' => __('<p class="description">This area controls the menu(if it\'s not setup in Appearance -> Menus and the Breadcrumbs section. </p>', 'applause'),

				'fields' => array(

					array(

						'id' => 'pages_topmenu',

						'type' => 'pages_multi_select',

						'title' => __('Pages to include in the Main menu', 'applause'), 

						'sub_desc' => __('Choose what pages you want in the Main menu.', 'applause'),

						'args' => '',

						'std' => ''

						),

					array(

						'id' => 'menu_homelink',

						'type' => 'button_set',

						'options' => array('1' => 'Yes', '0' => 'No'),

						'title' => 'Show a home link in the top menu?',

						'sub_desc' => '<strong>This will work only if you didn\'t set a menu in Appearance -> Menus.</strong>',

						'std' => 1

						)											

					)

				);

$sections[] = array(

				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_157_show_lines.png',

				'title' => __('Integration', 'applause'),

				'desc' => __('<p class="description">Use this to integrate google analytics code or to add any meta tag / html code you want.</p>', 'applause'),

				'fields' => array(

					array(

						'id' => 'integration_footer',

						'type' => 'textarea',

						'title' => __('Code before the &lt;/body&gt; tag', 'applause'), 

						'sub_desc' => __('<strong>Use this one for google analytics for example.</strong>', 'applause'),

						'std' => ''

						),

					array(

						'id' => 'integration_header',

						'type' => 'textarea',

						'title' => __('The code will be added before the &lt;/head&gt; tag', 'applause'), 

						'sub_desc' => __('Use this one if you want to verify your site for google/bing/alexa/etc for example.', 'applause'),

						'std' => ''

						),

					array(

						'id' => 'custom_css',

						'type' => 'textarea',

						'title' => 'Custom CSS',

						'sub_desc' => 'Include here any custom CSS you want, it will be kept when updating the theme'

						),
					)

				);

$sections[] = array(

				'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_107_text_resize.png',

				'title' => __('Colorization & Fonts', 'applause'),

				'desc' => __('<p class="description"></p>', 'applause'),

				'fields' => array(

					array(

						'id' => 'enable_colorization',

						'type' => 'button_set',

						'options' => array('1' => 'Yes', '0' => 'No'),

						'title' => 'Enable custom colorization & font changes?',

						'sub_desc' => '<strong>Please note that if you enable if, all the bottom settings will be used. For just some changes, use style.css.</strong>',

						'std' => 0

						),

					//background color
					array(

						'id' => 'bg_color',

						'type' => 'color',

						'title' => 'Background color',

						'sub_desc' => 'This will override any background image that was used previously and use just a color.',
						 
						 'std' => '#ED145B'
						),

					//Audio Player Background color 

					array(

						'id' => 'audio_bg_color',

						'type' => 'color',

						'title' => 'Audio Player Background color ',

						'sub_desc' => 'This will override Audio Player Background color ',
						 
						 'std' => '#F9F9F9'
						),


					//Audio Player Background color hover

					array(

						'id' => 'audio_hover_bg_color',

						'type' => 'color',

						'title' => 'Audio Player Background  hover color ',

						'sub_desc' => 'This will override Audio Player Background hover color ',
						 
						 'std' => '#E1E1E1'
						),




					//Body fonts
					array(

						'id' => 'body_font',

						'title' => 'Font for the body text:',

						'type' => 'select',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the body text',

						'std' => 'Open+Sans'

						),

					array(

						'id' => 'body_size',

						'type' => 'text',

						'title' => 'The default font size for the body text',

						'sub_desc' => 'This is the default font-size used on the body text(use just numbers, without px)',

						'std' => '14',

						'validate' => 'numeric'

						),	

					array(

						'id' => 'body_color',

						'title' => 'Color for the body text:',

						'type' => 'color',

						'sub_desc' => 'The color used on the body text',

						'std' => '#FFFFFF'

						),

				//Home Title Font Family
					array(

						'id' => 'home_font_family',

						'type' => 'select',

						'title' => 'Home Title Font Family',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the Home Title',

						'std' => 'Open+Sans'


						),					
				//Home Title Font size
					array(

						'id' => 'home_size',

						'type' => 'text',

						'title' => 'The default font size for Home Title',

						'sub_desc' => 'This is the default font-size used on Home Title(use just numbers, without px)',

						'std' => '72',

						'validate' => 'numeric'

						),	

				//Home Title Font color

					array(

						'id' => 'home_color',

						'type' => 'color',

						'title' => 'The default color for the Home Title',

						'sub_desc' => 'This is the default color used on Home Title',

						'std' => '#FFFFFF',

						),	


				//Section Heading
					array(

						'id' => 'sec_h_font_family',

						'type' => 'select',

						'title' => 'Section Heading Font Family',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the Section headings',

						'std' => 'Open+Sans'


						),					
				//Section Heading Font size
					array(

						'id' => 'sec_size',

						'type' => 'text',

						'title' => 'The default font size for Section Heading',

						'sub_desc' => 'This is the default font-size used on Section Heading(use just numbers, without px)',

						'std' => '40',

						'validate' => 'numeric'

						),	

				//Section Heading Font color

					array(

						'id' => 'sec_color',

						'type' => 'color',

						'title' => 'The default color for the Section Heading',

						'sub_desc' => 'This is the default color used on Section Heading',

						'std' => '#FFFFFF',

						),						
				//H2
					array(

						'id' => 'h2_size',

						'type' => 'text',

						'title' => 'The default font size for the h2 heading',

						'sub_desc' => 'This is the default font-size used on the h2 headings(use just numbers, without px)',

						'std' => '31.5',

						'validate' => 'numeric'

						),					

					array(

						'id' => 'h2_font',

						'title' => 'The default font for the h2 heading:',

						'type' => 'select',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the h2 headings',

						'std' => 'Open+Sans'

						),

					array(

						'id' => 'h2_color',

						'type' => 'color',

						'title' => 'The default color for the h2 heading',

						'sub_desc' => 'This is the default color used on the h2 headings',

						'std' => '#FFFFFF',

						),	



				//H3
					array(

						'id' => 'h3_size',

						'type' => 'text',

						'title' => 'The default font size for the h3 heading',

						'sub_desc' => 'This is the default font-size used on the h3 headings(use just numbers, without px)',

						'std' => '24.5',

						'validate' => 'numeric'

						),					

					array(

						'id' => 'h3_font',

						'title' => 'The default font for the h3 heading:',

						'type' => 'select',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the h3 headings',

						'std' => 'Open+Sans'

						),

					array(

						'id' => 'h3_color',

						'type' => 'color',

						'title' => 'The default color for the h3 heading',

						'sub_desc' => 'This is the default color used on the h3 headings',

						'std' => '#FFFFFF',

						),	

					//H4
					array(

						'id' => 'h4_size',

						'type' => 'text',

						'title' => 'The default font size for the h4 heading',

						'sub_desc' => 'This is the default font-size used on the h4 headings(use just numbers, without px)',

						'std' => '17.5',

						'validate' => 'numeric'

						),					

					array(

						'id' => 'h4_font',

						'title' => 'The default font for the h4 heading:',

						'type' => 'select',

						'options' => $google_fonts,

						'sub_desc' => 'The google font to be used on the h4 headings',

						'std' => 'Open+Sans'

						),

					array(

						'id' => 'h4_color',

						'type' => 'color',

						'title' => 'The default color for the h4 heading',

						'sub_desc' => 'This is the default color used on the h4 headings',

						'std' => '#FFFFFF',

						),

		

				)

			);				

				

	$tabs = array();

			

	if (function_exists('wp_get_theme')){

		$theme_data = wp_get_theme();

		$theme_uri = $theme_data->get('ThemeURI');

		$description = $theme_data->get('Description');

		$author = $theme_data->get('Author');

		$version = $theme_data->get('Version');

		$tags = $theme_data->get('Tags');

	}else{

		$theme_data = wp_get_theme();

		$theme_uri = $theme_data['ThemeURI'];

		$description = $theme_data['Description'];

		$author = $theme_data['Author'];

		$version = $theme_data['Version'];

		$tags = $theme_data['Tags'];

	}	



	$theme_info = '<div class="applause-section-desc">';

	$theme_info .= '<p class="applause-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'applause').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';

	$theme_info .= '<p class="applause-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'applause').$author.'</p>';

	$theme_info .= '<p class="applause-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'applause').$version.'</p>';

	$theme_info .= '<p class="applause-theme-data description theme-description">'.$description.'</p>';

	$theme_info .= '<p class="applause-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'applause').implode(', ', $tags).'</p>';

	$theme_info .= '</div>';







	$tabs['theme_info'] = array(

					'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',

					'title' => __('Theme Information', 'applause'),

					'content' => $theme_info

					);

	/*

	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){

		$tabs['theme_docs'] = array(

						'icon' => NHP_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',

						'title' => __('Documentation', 'applause'),

						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))

						);

	}//if

	*/

	global $NHP_Options;

	$NHP_Options = new NHP_Options($sections, $args, $tabs);



}//function

add_action('init', 'setup_framework_options', 0);



/*

 * 

 * Custom function for the callback referenced above

 *

 */

function my_custom_field($field, $value){

	print_r($field);

	print_r($value);



}//function



/*

 * 

 * Custom function for the callback validation referenced above

 *

 */

function validate_callback_function($field, $value, $existing_value){

	

	$error = false;

	$value =  'just testing';

	/*

	do your validation

	

	if(something){

		$value = $value;

	}elseif(somthing else){

		$error = true;

		$value = $existing_value;

		$field['msg'] = 'your custom error message';

	}

	*/

	

	$return['value'] = $value;

	if($error == true){

		$return['error'] = $field;

	}

	return $return;

	

}//function

?>