<?php
namespace HotellerElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Blog Posts
 *
 * Elementor widget
 *
 * @since 1.0.0
 */
class Hoteller_Slider_Zoom extends Widget_Base {

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
		return 'hoteller-slider-zoom';
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
		return __( 'Zoom Slider', 'hoteller-elementor' );
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
		return [ 'hoteller-elementor' ];
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
						'slide_image' => array('url' => 'http://assets.themegoods.com/demo/hoteller/slider-zoom/bg1.jpg'),
						'slide_title' => 'Art of City Luxury',
						'slide_description' => 'Experience the greatest for you holidays. Book now!',
					],
					[
						'slide_image' => array('url' => 'http://assets.themegoods.com/demo/hoteller/slider-zoom/bg2.jpg'),
						'slide_title' => 'Deliciously Expeience',
						'slide_description' => 'Experience our michalin stars chief from our international restaurant. Book now!',
					],
				],
				'fields' => [
					[
						'name' => 'slide_image',
						'label' => __( 'Image', 'hoteller-elementor' ),
						'type' => Controls_Manager::MEDIA,
						'label_block' => true,
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
						'type' => Controls_Manager::TEXTAREA,
						'default' => __( 'Description' , 'hoteller-elementor' ),
					],
					[
						'name' => 'slide_link_title',
						'label' => __( 'Link Title', 'hoteller-elementor' ),
						'type' => Controls_Manager::TEXT,
						'default' => __( 'View Detail' , 'hoteller-elementor' ),
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
		
		$this->add_responsive_control(
		    'height',
		    [
		        'label' => __( 'Height', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 900,
		            'unit' => 'px',
		        ],
		        'range' => [
		            'px' => [
		                'min' => 5,
		                'max' => 2000,
		                'step' => 5,
		            ],
				    'vh' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'size_units' => [ 'px', 'vh' ],
		        'selectors' => [
		            '{{WRAPPER}} .slider_zoom_wrapper' => 'height: {{SIZE}}{{UNIT}}',
		        ],
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
		    'overlay',
		    [
		        'label' => __( 'Background Overlay', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .slider_zoom_wrapper .slideshow__slide-image::before' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'overlay_opacity',
		    [
		        'label' => __( 'Height', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 0.3,
		            'unit' => 'px',
		        ],
		        'range' => [
		            'px' => [
		                'min' => 0,
		                'max' => 1,
		                'step' => 0.1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .slider_zoom_wrapper .slideshow__slide-image::before, .slideshow__slide-image::after' => 'opacity: {{SIZE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'content_background',
		    [
		        'label' => __( 'Content Background', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#222222',
		        'selectors' => [
		            '{{WRAPPER}} .slider_zoom_wrapper' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'pagination_color',
		    [
		        'label' => __( 'Pagination Background Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .slider_zoom_wrapper .pagination__item.is-current, {{WRAPPER}} .slider_zoom_wrapper .pagination__item:hover' => 'background: {{VALUE}}',
		            '{{WRAPPER}} .slider_zoom_wrapper .pagination__item' => 'border-color: {{VALUE}}',
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
		    'title_width',
		    [
		        'label' => __( 'Title Width', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 50,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 30,
		                'max' => 100,
		                'step' => 5,
		            ]
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-text .container .slideshow__slide-caption-title' => 'width: {{SIZE}}%;',
		            '{{WRAPPER}} .slideshow__slide-caption-text .container .slideshow__slide-desc' => 'width: {{SIZE}}%;',
		        ],
		    ]
		);
		
		$this->add_responsive_control(
		    'title_margintop',
		    [
		        'label' => __( 'Title Margin Top (in %)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 30,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 30,
		                'max' => 100,
		                'step' => 5,
		            ]
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-text' => 'padding-top: {{SIZE}}%;',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_color',
		    [
		        'label' => __( 'Title Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-title' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'title_font_size',
		    [
		        'label' => __( 'Title Font Size (* DEPRECIATED)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 110,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 10,
		                'max' => 200,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} h1.slideshow__slide-caption-title' => 'font-size: {{SIZE}}{{UNIT}};',
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
		                'min' => -20,
		                'max' => 20,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-text h1.slideshow__slide-caption-title' => 'letter-spacing: {{SIZE}}{{UNIT}};',
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
		            '{{WRAPPER}} .slideshow__slide-caption-text .slideshow__slide-caption-title' => 'text-transform: {{VALUE}}',
		        ],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __( 'Title Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .slideshow__slide-caption-text .slideshow__slide-caption-title',
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_description_style',
			array(
				'label'      => esc_html__( 'Description', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'description_color',
		    [
		        'label' => __( 'Description Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-text .slideshow__slide-desc' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'description_font_size',
		    [
		        'label' => __( 'Description Font Size (* DEPRECIATED)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 18,
		        ],
		        'range' => [
		            'px' => [
		                'min' => 8,
		                'max' => 40,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-text div.slideshow__slide-desc' => 'font-size: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);
		
		$this->add_control(
		    'description_letter_spacing',
		    [
		        'label' => __( 'Description Letter Spacing (* DEPRECIATED)', 'hoteller-elementor' ),
		        'type' => Controls_Manager::SLIDER,
		        'default' => [
		            'size' => 0,
		        ],
		        'range' => [
		            'px' => [
		                'min' => -5,
		                'max' => 5,
		                'step' => 1,
		            ],
		        ],
		        'size_units' => [ 'px' ],
		        'selectors' => [
		            '{{WRAPPER}} div.slideshow__slide-caption-text .slideshow__slide-desc' => 'letter-spacing: {{SIZE}}{{UNIT}};',
		        ],
		    ]
		);
		
		$this->add_control(
			'description_text_transform',
			[
				'label' => __( 'Description Text Transform (* DEPRECIATED)', 'hoteller-elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'none',
			    'options' => [
			     	'none' => __( 'None', 'hoteller-elementor' ),
			     	'uppercase' => __( 'Uppercase', 'hoteller-elementor' ),
			     	'lowercase' => __( 'Lowercase', 'hoteller-elementor' ),
			     	'capitalize' => __( 'Capitalize', 'hoteller-elementor' ),
			    ],
			    'selectors' => [
		            '{{WRAPPER}} div.slideshow__slide-caption-text div.slideshow__slide-desc' => 'text-transform: {{VALUE}};',
		        ],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'label' => __( 'Description Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} div.slideshow__slide-caption-text div.slideshow__slide-desc',
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
		    'link_color',
		    [
		        'label' => __( 'Link Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .slideshow__slide-caption-subtitle-label' => 'color: {{VALUE}}',
		            '{{WRAPPER}} .o-hsub::before' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'link_typography',
				'label' => __( 'Link Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .slideshow__slide-caption-subtitle-label',
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
		include(HOTELLER_ELEMENTOR_PATH.'templates/slider-zoom/index.php');
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
