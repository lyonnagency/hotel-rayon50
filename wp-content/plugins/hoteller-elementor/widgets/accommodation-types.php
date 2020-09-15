<?php
namespace HotellerElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Blog Posts
 *
 * Elementor widget for blog posts
 *
 * @since 1.0.0
 */
class Hoteller_Accommodation_Types extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'hoteller-accommodation-types';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Accommodation Types', 'hoteller-elementor' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'hoteller-theme-widgets-category' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return array();
	}
	
	/**
	 * Retrieve accommodation type post categories
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array accommodation type categories
	 */
	public function get_accommodation_categories() {

		$accommodation_cats_arr = get_terms('mphb_room_type_category', 'hide_empty=0&hierarchical=0&parent=0&orderby=name');
		$accommodation_cats_select = array();
		
		foreach ($accommodation_cats_arr as $cat) {
			$accommodation_cats_select[$cat->term_id] = $cat->name;
		}

		return $accommodation_cats_select;
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _register_controls() {
		$this->start_controls_section(
			'section_content',
			[
				'label' => __( 'Content', 'hoteller-elementor' ),
			]
		);

		$this->add_control(
			'layout',
			[
				'label' => __( 'Layout', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
			    'options' => [
			     	1 => __( 'Style 1', 'hoteller-elementor' ),
				 	2 => __( 'Style 2', 'hoteller-elementor' ),
			    ],
			]
		);
		
		$this->add_control(
		    'columns',
		    [
		        'label' => __( 'Columns', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 3,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 2,
		                'max' => 4,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
		    'posts_per_page',
		    [
		        'label' => __( 'Posts Per Page', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 6,
		        ],
		        'range' => [
		            'px' => [
		                'min' => -1,
		                'max' => 100,
		                'step' => 1,
		            ]
		        ],
		    ]
		);
		
		$this->add_control(
			'categories',
			[
				'label' => __( 'Categories', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT2,
			    'options' => $this->get_accommodation_categories(),
			    'multiple' => true,
			]
		);
		
		$this->add_control(
			'sort_by',
			[
				'label' => __( 'Sort By', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 1,
			    'options' => [
			     	'menu_order' => __( 'Default WordPress Order', 'hoteller-elementor' ),
				 	'title' => __( 'Title', 'hoteller-elementor' ),
			    ],
			]
		);
		
		$this->add_control(
			'show_pagination',
			[
				'label' => __( 'Show Pagination', 'hoteller-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'hoteller-elementor' ),
				'label_off' => __( 'No', 'hoteller-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->end_controls_section();
	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		include(HOTELLER_ELEMENTOR_PATH.'templates/accommodation-types/index.php');
	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function _content_template() {
		return '';
	}
}
