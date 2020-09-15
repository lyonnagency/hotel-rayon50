<?php
namespace HotellerElementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Navigation Menu
 *
 * Elementor widget for navigation menu
 *
 * @since 1.0.0
 */
class Hoteller_Navigation_Menu extends Widget_Base {

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
		return 'hoteller-navigation-menu';
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
		return __( 'Theme Navigation Menu', 'hoteller-elementor' );
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
		return 'eicon-nav-menu';
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
			'section_parent_menu',
			[
				'label' => __( 'Parent Menu', 'hoteller-elementor' ),
			]
		);
		
		$this->add_control(
			'nav_menu',
			[
				'label' => __( 'Navigation Menu', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT2,
				'multiple' => false,
				'options' => $this->_get_menus(),
			]
		);
		
		$this->add_control(
			'nav_menu_hover_style',
			[
				'label' => __( 'Hover Style', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1'  => __( 'Style 1', 'hoteller-elementor' ),
					'style2' => __( 'Style 2', 'hoteller-elementor' ),
				],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'nav_menu_typography',
				'label' => __( 'Typography', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .tg_navigation_wrapper .nav li a',
			]
		);
		
		$this->add_control(
			'nav_menu_margin',
			[
				'label' => __( 'Margin', 'hoteller-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .tg_navigation_wrapper .nav > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'nav_menu_alignment',
			[
				'label' => __( 'Alignment', 'hoteller-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav' => 'text-align: {{VALUE}}',
		        ],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_sub_menu',
			[
				'label' => __( 'Sub Menu', 'hoteller-elementor' ),
			]
		);
		
		$this->add_control(
			'nav_sub_menu_margin',
			[
				'label' => __( 'Padding', 'hoteller-elementor' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px' ],
				'selectors' => [
					'{{WRAPPER}} .tg_navigation_wrapper .nav li ul.sub-menu li' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
		$this->add_control(
			'nav_sub_menu_alignment',
			[
				'label' => __( 'Alignment', 'hoteller-elementor' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'hoteller-elementor' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul.sub-menu' => 'text-align: {{VALUE}}',
		        ],
			]
		);
		
		$this->add_group_control(
			\Elementor\Group_Control_Box_Shadow::get_type(),
			[
				'name' => 'nav_sub_menu_box_shadow',
				'label' => __( 'Box Shadow', 'hoteller-elementor' ),
				'selector' => '{{WRAPPER}} .tg_navigation_wrapper .nav li ul.sub-menu',
			]
		);
		
		$this->add_control(
			'nav_sub_menu_border_radius',
			[
				'label' => __( 'Border Radius', 'hoteller-elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 25,
						'step' => 1,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => 4,
				],
				'selectors' => [
					'{{WRAPPER}} .tg_navigation_wrapper .nav li ul.sub-menu' => 'border-radius: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_menu_style',
			array(
				'label'      => esc_html__( 'Parent Menu Colors', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'nav_menu_font_color',
		    [
		        'label' => __( 'Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_menu_hover_font_color',
		    [
		        'label' => __( 'Hover Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li a:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_menu_hover_border_color',
		    [
		        'label' => __( 'Hover Border Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav ul li a:before, {{WRAPPER}} .tg_navigation_wrapper div .nav li > a:before' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_menu_active_font_color',
		    [
		        'label' => __( 'Active Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-item > a, {{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-parent > a, {{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-ancestor > a, {{WRAPPER}} .tg_navigation_wrapper .nav li ul:not(.sub-menu) li.current-menu-item a, {{WRAPPER}} .tg_navigation_wrapper .nav li.current-menu-parent  ul li.current-menu-item a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_menu_active_border_color',
		    [
		        'label' => __( 'Active Border Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#000000',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-item > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-parent > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav > li.current-menu-ancestor > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul:not(.sub-menu) li.current-menu-item a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li.current-menu-parent  ul li.current-menu-item a:before' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'section_sub_menu_style',
			array(
				'label'      => esc_html__( 'Sub Menu Colors', 'hoteller-elementor' ),
				'tab'        => Controls_Manager::TAB_STYLE,
				'show_label' => false,
			)
		);
		
		$this->add_control(
		    'nav_sub_menu_bg_color',
		    [
		        'label' => __( 'Background Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#333333',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul.sub-menu' => 'background: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_sub_menu_font_color',
		    [
		        'label' => __( 'Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul li a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_sub_menu_hover_font_color',
		    [
		        'label' => __( 'Hover Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul li a:hover' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_sub_menu_hover_border_color',
		    [
		        'label' => __( 'Hover Border Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul li a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul li > a:before' => 'background-color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_sub_menu_active_font_color',
		    [
		        'label' => __( 'Active Font Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-item > a, {{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-parent > a, {{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-ancestor > a, {{WRAPPER}} .tg_navigation_wrapper .nav li ul li ul:not(.sub-menu) li.current-menu-item a, {{WRAPPER}} .tg_navigation_wrapper .nav li ul li.current-menu-parent  ul li.current-menu-item a, {{WRAPPER}} .tg_navigation_wrapper .nav li.current-menu-parent ul > li.current-menu-item > a' => 'color: {{VALUE}}',
		        ],
		    ]
		);
		
		$this->add_control(
		    'nav_sub_menu_active_border_color',
		    [
		        'label' => __( 'Active Border Color', 'hoteller-elementor' ),
		        'type' => Controls_Manager::COLOR,
		        'default' => '#ffffff',
		        'selectors' => [
		            '{{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-item > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-parent > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul > li.current-menu-ancestor > a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul li ul:not(.sub-menu) li.current-menu-item a:before, {{WRAPPER}} .tg_navigation_wrapper .nav li ul li.current-menu-parent  ul li.current-menu-item a:before' => 'background-color: {{VALUE}}',
		        ],
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
		include(HOTELLER_ELEMENTOR_PATH.'templates/navigation-menu/index.php');
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
	
	protected function _get_menus() {
		/*
			Get all menus available
		*/
		$menus = get_terms('nav_menu');
		$menus_select = array(
			 '' => 'Default Menu'
		);
		foreach($menus as $each_menu)
		{
			$menus_select[$each_menu->slug] = $each_menu->name;
		}
		
		return $menus_select;
	}
}
