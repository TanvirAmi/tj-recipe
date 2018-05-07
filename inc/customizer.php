<?php
/**
 * TJ Recipe Theme Customizer
 *
 * @package TJ_Recipe
 */

function tj_recipe_customizer_register(){
	//Stores all the control that will be added
	$options = array();

	//Stores all the sections to be added
	$sections = array();

	//Stores all the panel to be added
	$panels = array();

	//Adds the sections to the $options array
	$options['sections'] = $sections;

	// ========= Start Customizer panels/Sections/Settings =========//
	// Header Panels and sections
	$header_panel = 'header';

	$panels[] = array(
		'id'						=> $header_panel,
		'title'					=> esc_html__('Header', 'tj-recipe'),
		'description'		=> esc_html__('This panel is used for managing header section of your site.', 'tj-recipe'),
		'priority'			=> 15
	);

							// Logo
							$section = 'logo-section';

							$sections[] = array(
								'id'					=> $section,
								'title'				=> esc_html__('Logo', 'tj-recipe'),
								'priority'		=> 30,
								'panel'				=> $header_panel
							);

							$options['logo'] = array(
								'id'					=> 'logo',
								'label'				=> esc_html__('Regular Logo', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'media',
								'default'			=>''
							);

							// Social header
							$section = 'social-section';

							$sections[] = array(
								'id'					=> $section,
								'title'				=> esc_html__('Social', 'tj-recipe'),
								'priority'		=> 125,
								'panel'				=> $header_panel
							);

							$options['facebook'] = array(
								'id'					=> 'facebook',
								'label'				=> esc_html__('Facebook URL', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'url',
								'default'			=> ''
							);
							$options['twitter'] = array(
								'id'					=> 'twitter',
								'label'				=> esc_html__('Twitter URL', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'url',
								'default'			=> ''
							);
							$options['linkedin'] = array(
								'id'					=> 'linkedin',
								'label'				=> esc_html__('Linkedin URL', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'url',
								'default'			=> ''
							);
							$options['pinterest'] = array(
								'id'					=> 'pinterest',
								'label'				=> esc_html__('Pinterest URL', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'url',
								'default'			=> ''
							);
							$options['instagram'] = array(
								'id'					=> 'instagram',
								'label'				=> esc_html__('Instagram URL', 'tj-recipe'),
								'section'			=> $section,
								'type'				=> 'url',
								'default'			=> ''
							);



	// Content Panels and Sections
	$content_panel = 'content-layout';
	$panels[] = array(
		'id'						=> $content_panel,
		'title'					=> esc_html__('Content Layout', 'tj-recipe'),
		'description'		=> esc_html__('This panel is used for content section of your site', 'tj-recipe'),
		'priority'			=> 10
	);

							//First category image
							$section = 'featured-category';

							$sections[] = array(
								'id'					=> $section,
								'title'				=> esc_html__('Featured Category', 'tj-recipe'),
								'description'	=> esc_html__('Select category and thumbnail for top 3 featured category','tj-recipe'),
								'priority'		=> 30,
								'panel'				=> $content_panel
							);

							// Enable & disable option
							$options['featured-cat-enable'] = array(
								'id'          => 'featured-cat-enable',
								'label'       => esc_html__( 'Show featured category', 'oof' ),
								'section'     => $section,
								'type'        => 'switch',
								'default'     => 1
							);

							$options['category-1-group'] = array(
								'id'          => 'category-1-group',
								'label'       => __( 'First Category', 'shopy' ),
								'section'     => $section,
								'type'        => 'group-title'
							);
							$options['first-cat-thumbnail'] = array(
								'id'				=> 'first-cat-thumbnail',
								'label'			=> __('First category thumbnail', 'tj-recipe'),
								'section'		=> $section,
								'type'			=> 'media',
								'default'		=> ''
							);

							$options['featured-category-1'] = array(
								'id'					=> 'featured-category-1',
								'label'				=> esc_html__('Select a category','tj-recipe'),
								'description'	=> esc_html__('If you not select category..','tj-recipe'),
								'section'			=> $section,
								'type'				=> 'select2',
								'choices'			=> tj_recipe_cat_list()
							);

							//Second category images
							$options['category-2-group'] = array(
								'id'          => 'category-1-group',
								'label'       => __( 'Second Category', 'shopy' ),
								'section'     => $section,
								'type'        => 'group-title'
							);

							$options['second-cat-thumbnail'] = array(
								'id'				=> 'second-cat-thumbnail',
								'label'			=> esc_html__('Second category thumbnail', 'tj-recipe'),
								'section'		=> $section,
								'type'			=> 'media',
								'default'		=> ''
							);

							$options['featured-category-2'] = array(
								'id'					=> 'featured-category-2',
								'label'				=> esc_html__('Select a category','tj-recipe'),
								'description'	=> esc_html__('If you not select category..','tj-recipe'),
								'section'			=> $section,
								'type'				=> 'select2',
								'choices'			=> tj_recipe_cat_list()
							);

							// Third category images
							$options['category-3-group'] = array(
								'id'          => 'category-3-group',
								'label'       => __( 'Third Category', 'shopy' ),
								'section'     => $section,
								'type'        => 'group-title'
							);

							$options['third-cat-thumbnail'] = array(
								'id'				=> 'third-cat-thumbnail',
								'label'			=> esc_html__('Second category thumbnail', 'tj-recipe'),
								'section'		=> $section,
								'type'			=> 'media',
								'default'		=> ''
							);

							$options['featured-category-3'] = array(
								'id'					=> 'featured-category-3',
								'label'				=> esc_html__('Select a category','tj-recipe'),
								'description'	=> esc_html__('If you not select category..','tj-recipe'),
								'section'			=> $section,
								'type'				=> 'select2',
								'choices'			=> tj_recipe_cat_list()
							);




	// Footer Panels and sections
	$footer_panel = 'footer';

	$panels[] = array(
		'id'						=> $footer_panel,
		'title'					=> esc_html__('Footer', 'tj-recipe'),
		'description'		=> esc_html__('This panel is used for managing footer section of your site.', 'tj-recipe'),
		'priority'			=> 20
	);
								// Footer Text section
								$section = 'footer-text-section';

								$sections[] = array(
								'id'          => $section,
								'title'       => esc_html__( 'Footer Text', 'tj-recipe' ),
								'priority'    => 120,
								'panel'       => $footer_panel,
								);
								$options['footer-text'] = array(
								'id'           => 'footer-text',
								'label'        => '',
								'description'  => esc_html__( 'Customize the footer text.', 'tj-recipe' ),
								'section'      => $section,
								'type'         => 'textarea',
								'default'      => '&copy; Copyright ' . date( 'Y' ) . ' <a href="' . esc_url( home_url() ) . '">' . esc_attr( get_bloginfo( 'name' ) ) . '</a> &middot; Designed by <a href="http://www.theme-junkie.com/">Theme Junkie</a>'
								);


								// Footer social section
								$section = 'footer-social';

								$sections[] = array(
									'id'				=> $section,
									'title'			=> esc_html__('Footer Social', 'tj-recipe'),
									'priority'	=> 125,
									'panel'			=> $footer_panel
								);
								// Enable & disable option
								$options['footer-social-enable'] = array(
									'id'          => 'footer-social-enable',
									'label'       => esc_html__( 'Show footer social icon', 'tj-recipe' ),
									'section'     => $section,
									'type'        => 'switch',
									'default'     => 1
								);
								$options['footer-facebook'] = array(
									'id'					=> 'footer-facebook',
									'label'				=> esc_html__('facebook URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-twitter'] = array(
									'id'					=> 'footer-twitter',
									'label'				=> esc_html__('twitter URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-google-plus'] = array(
									'id'					=> 'footer-google-plus',
									'label'				=> esc_html__('Google plus URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-pinterest'] = array(
									'id'					=> 'footer-pinterest',
									'label'				=> esc_html__('pinterest URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-instagram'] = array(
									'id'					=> 'footer-instagram',
									'label'				=> esc_html__('instagram URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-vimeo'] = array(
									'id'					=> 'footer-vimeo',
									'label'				=> esc_html__('vimeo URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);
								$options['footer-youtube'] = array(
									'id'					=> 'footer-youtube',
									'label'				=> esc_html__('youtube URL', 'tj-recipe'),
									'section'			=> $section,
									'type'				=> 'url',
									'default'			=> ''
								);



			//Adds the sections to the $options array
			$options['sections'] = $sections;

			//Adds the panel to the $options array
			$options['panels'] = $panels;

			$customizer_library = Customizer_Library::Instance();
			$customizer_library-> add_options($options);
}
add_action('init','tj_recipe_customizer_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function tj_recipe_customize_preview_js() {
	wp_enqueue_script( 'tj-recipe-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
//add_action( 'customize_preview_init', 'tj_recipe_customize_preview_js' );
