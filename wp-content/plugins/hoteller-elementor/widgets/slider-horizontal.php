<?php
namespace HotellerElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Blog Posts
 *
 * Elementor widget for blog posts
 *
 * @since 1.0.0
 */
class Hoteller_Slider_Horizontal extends Widget_Base {

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
		return 'hoteller-slider-horizontal';
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
		return __( 'Horizontal Slider', 'hoteller-elementor' );
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
		return 'eicon-post-slider';
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
		return [ 'flickity', 'hoteller-elementor' ];
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
			'slides',
			[
				'label' => __( 'Slides', 'hoteller-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'slide_image' => array(
							0 => array(
								'url' => 'http://assets.themegoods.com/demo/hoteller/slider-horizontal/bg1_1.jpg'
							),
							1 => array(
								'url' => 'http://assets.themegoods.com/demo/hoteller/slider-horizontal/bg1_2.jpg'
							),
							2 => array(
								'url' => 'http://assets.themegoods.com/demo/hoteller/slider-horizontal/bg1_3.jpg'
							),
						),
						'slide_title' => 'Beyond exceeded our expectations',
						'slide_description' => 'The service provided was outstanding and beyond to make sure our stay was both enjoyable and a 5 star experience.',
						'slide_link_title' => 'View Testimonials',
					],
					[
						'slide_image' => array(
							0 => array(
								'url' => 'http://assets.themegoods.com/demo/hoteller/slider-horizontal/bg2_1.jpg'
							),
							1 => array(
								'url' => 'http://assets.themegoods.com/demo/hoteller/slider-horizontal/bg2_2.jpg'
							),
						),
						'slide_title' => 'Stunning hotel with incredible views',
						'slide_description' => 'I booked this hotel based on the reviews of the service and the location. The location was incredible.',
						'slide_link_title' => 'View Testimonials',
					],
				],
				'fields' => [
					[
						'name' => 'slide_image',
						'label' => __( 'Image (max. 3)', 'hoteller-elementor' ),
						'type' => Controls_Manager::GALLERY,
						'default' => [],
					],
					[
						'name' => 'slide_title_align',
						'label' => __( 'Title Alignment', 'hoteller-elementor' ),
						'type' => Controls_Manager::SELECT,
						'default' => 'left',
					    'options' => [
					     	'left' => __( 'Left', 'hoteller-elementor' ),
					     	'right' => __( 'Right', 'hoteller-elementor' ),
					    ],
					],
					[
						'name' => 'slide_title',
						'label' => __( 'Title', 'hoteller-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'Title' , 'hoteller-elementor' ),
					],
					[
						'name' => 'slide_description',
						'label' => __( 'Description', 'hoteller-elementor' ),
						'type' => Controls_Manager::WYSIWYG,
					],
					[
						'name' => 'slide_link_title',
						'label' => __( 'Link Title', 'hoteller-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'View Gallery' , 'hoteller-elementor' ),
					],
					[
						'name' => 'slide_link',
						'label' => __( 'Link URL', 'hoteller-elementor' ),
						'type' => Controls_Manager::URL,
						'default' => [
					        'url' => '',
					        'is_external' => '',
					     ],
						'show_external' => true,
					],
				],
				'title_field' => '{{{ slide_title }}}',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_options',
			[
				'label' => __( 'Options', 'hoteller-elementor' ),
			]
		);
		
		$this->add_control(
			'image_size',
			[
				'label' => __( 'Image Size', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'large',
			    'options' => [
			     	'medium_large' => __( 'Medium (default 768px x 768px max)', 'hoteller-elementor' ),
			     	'large' => __( 'Large (default 1024px x 1024px max)', 'hoteller-elementor' ),
			     	'full' => __( 'Original image resolution', 'hoteller-elementor' ),
			    ],
			]
		);
		
		$this->add_control(
		    'height',
		    [
		        'label' => __( 'Height (in px)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 700,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 5,
		                'max' => 2000,
		                'step' => 5,
		            ]
		        ],
		        'size_units' => [ 'px' ]
		    ]
		);
		
		$this->add_control(
			'fullscreen',
			[
				'label' => __( 'Fullscreen', 'hoteller-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'hoteller-elementor' ),
				'label_off' => __( 'No', 'hoteller-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_responsive_control(
		    'spacing',
		    [
		        'label' => __( 'Spacing (in px)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 40,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 500,
		                'step' => 1,
		            ]
		        ],
		        'size_units' => [ 'px' ]
		    ]
		);
		
		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Auto Play', 'hoteller-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'hoteller-elementor' ),
				'label_off' => __( 'No', 'hoteller-elementor' ),
				'return_value' => 'yes',
			]
		);

		$this->add_control(
		    'timer',
		    [
		        'label' => __( 'Timer (in seconds)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 8,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 1,
		                'max' => 60,
		                'step' => 1,
		            ]
		        ],
		        'size_units' => [ 'px' ]
		    ]
		);
		
		$this->add_control(
			'loop',
			[
				'label' => __( 'Loop', 'hoteller-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'no',
				'label_on' => __( 'Yes', 'hoteller-elementor' ),
				'label_off' => __( 'No', 'hoteller-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'navigation',
			[
				'label' => __( 'Show Navigation', 'hoteller-elementor' ),
				'type' => Controls_Manager::SWITCHER,
				'default' => 'yes',
				'label_on' => __( 'Yes', 'hoteller-elementor' ),
				'label_off' => __( 'No', 'hoteller-elementor' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'pagination',
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
		
		$this->start_controls_section(
			'section_general_style',
			array(
				'label'      => esc_html__( 'General', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'content_background_color',
		    [
		        'label' => __( 'Content Background Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => 'rgba(256,256,256,0)',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .tg_horizontal_slider_cell' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_background_color',
		    [
		        'label' => __( 'Navigation Background Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => 'rgba(256,256,256,0)',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .flickity-prev-next-button.next' => 'background: {{VALUE}}',
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .flickity-prev-next-button.previous' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_color',
		    [
		        'label' => __( 'Navigation Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .flickity-prev-next-button .arrow' => 'fill: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'pagination_color',
		    [
		        'label' => __( 'Pagination Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .flickity-page-dots .dot' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_title_style',
			array(
				'label'      => esc_html__( 'Title', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_responsive_control(
		    'content_width',
		    [
		        'label' => __( 'Text Content Width', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 30,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 5,
		                'max' => 100,
		                'step' => 5,
		            ],
		        ],
		        'size_units' => [ '%', 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .tg_horizontal_slider_content' => 'width: {{SIZE}}{{UNIT}};',
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .tg_horizontal_slider_bg' => 'width: calc(100% - {{SIZE}}{{UNIT}});',
		        ],
		    ]
		);
		
		$this->add_control(
		    'content_title_color',
		    [
		        'label' => __( 'Title font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slide_content_title h2' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_font_size',
		    [
		        'label' => __( 'Title Font Size (* DEPRECIATED)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 40,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 20,
		                'max' => 200,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} div.tg_horizontal_slide_content_title h2' => 'font-size: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_letter_spacing',
		    [
		        'label' => __( 'Title Letter Spacing (* DEPRECIATED)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 0,
		        ],
		        'range' => [
		            'px' => [
		                'min' => -10,
		                'max' => 10,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} div.tg_horizontal_slider_content_cell .tg_horizontal_slide_content_title h2' => 'letter-spacing: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);
		
		$this->add_control(
			'title_text_transform',
			[
				'label' => __( 'Title Text Transform (* DEPRECIATED)', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
			    'options' => [
			     	'none' => __( 'None', 'hoteller-elementor' ),
			     	'uppercase' => __( 'Uppercase', 'hoteller-elementor' ),
			     	'lowercase' => __( 'Lowercase', 'hoteller-elementor' ),
			     	'capitalize' => __( 'Capitalize', 'hoteller-elementor' ),
			    ],
			    'selectors' => [
		            '{{WRAPPER}} div.tg_horizontal_slider_content_cell div.tg_horizontal_slide_content_title h2' => 'text-transform: {{VALUE}}',
		        ],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} div.tg_horizontal_slider_content_cell div.tg_horizontal_slide_content_title h2',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_content_style',
			array(
				'label'      => esc_html__( 'Content', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'content_font_color',
		    [
		        'label' => __( 'Content font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#444444',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_wrapper .tg_horizontal_slider_content .tg_horizontal_slider_content_wrap' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => __( 'Content Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .tg_horizontal_slider_wrapper .tg_horizontal_slider_content .tg_horizontal_slider_content_wrap',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_link_style',
			array(
				'label'      => esc_html__( 'Link', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'content_link_color',
		    [
		        'label' => __( 'Link font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .tg_horizontal_slider_content_cell .tg_horizontal_slide_content_link' => 'color: {{VALUE}}',
		            '{{WRAPPER}} .tg_horizontal_slide_content_link' => 'border-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .tg_horizontal_slider_content_cell .tg_horizontal_slide_content_link',
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
		include(HOTELLER_ELEMENTOR_PATH.'templates/slider-horizontal/index.php');
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
