<?php
namespace Araratelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Utils;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * Ararat elementor hero section widget.
 *
 * @since 1.0
 */
class Ararat_Hero extends Widget_Base {

	public function get_name() {
		return 'ararat-hero';
	}

	public function get_title() {
		return __( 'Hero Section', 'ararat-companion' );
	}

	public function get_icon() {
		return 'eicon-slider-full-screen';
	}

	public function get_categories() {
		return [ 'ararat-elements' ];
	}

	protected function _register_controls() {

		// ----------------------------------------  Hero content ------------------------------
		$this->start_controls_section(
			'hero_content',
			[
				'label' => __( 'Hero slider content', 'ararat-companion' ),
			]
        );
        
		$this->add_control(
            'slider_contents', [
                'label' => __( 'Create New', 'ararat-companion' ),
                'type' => Controls_Manager::REPEATER,
                'title_field' => '{{{ slider_title }}}',
                'fields' => [
                    [
                        'name' => 'slider_img',
                        'label' => __( 'Slider Image', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::MEDIA,
                    ],
                    [
                        'name' => 'slider_title',
                        'label' => __( 'Slider Big Title', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'We Design your space', 'ararat-companion' ),
                    ],
                    [
                        'name' => 'sub_title',
                        'label' => __( 'Slider Sub Title', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor', 'ararat-companion' ),
                    ],
                    [
                        'name' => 'btn_label',
                        'label' => __( 'Button Label', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::TEXT,
                        'default' => __( 'See Our Projects', 'ararat-companion' ),
                    ],
                    [
                        'name' => 'btn_url',
                        'label' => __( 'Button URL', 'ararat-companion' ),
                        'label_block' => true,
                        'type' => Controls_Manager::URL,
                        'default' => [
                            'url'   => '#'
                        ],
                    ],
                ],
                'default'   => [
                    [
                        'slider_img'       => [
                            'url'          => Utils::get_placeholder_image_src(),
                        ],
                        'slider_title'     => __( 'We Design your space', 'ararat-companion' ),
                        'sub_title'        => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor', 'ararat-companion' ),
                        'btn_label'        => __( 'See Our Projects', 'ararat-companion' ),
                        'btn_url'          => '#',
                    ],
                    [
                        'slider_img'       => [
                            'url'          => Utils::get_placeholder_image_src(),
                        ],
                        'slider_title'     => __( 'We Design your space', 'ararat-companion' ),
                        'sub_title'        => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor', 'ararat-companion' ),
                        'btn_label'        => __( 'See Our Projects', 'ararat-companion' ),
                        'btn_url'          => '#',
                    ],
                    [
                        'slider_img'       => [
                            'url'          => Utils::get_placeholder_image_src(),
                        ],
                        'slider_title'     => __( 'We Design your space', 'ararat-companion' ),
                        'sub_title'        => __( 'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod tempor', 'ararat-companion' ),
                        'btn_label'        => __( 'See Our Projects', 'ararat-companion' ),
                        'btn_url'          => '#',
                    ],
                ]
            ]
        );
        
        $this->end_controls_section(); // End Hero content


    /**
     * Style Tab
     * ------------------------------ Style Title ------------------------------
     *
     */
        $this->start_controls_section(
			'style_title', [
				'label' => __( 'Style Hero Section', 'ararat-companion' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_control(
			'big_title_col', [
				'label' => __( 'Big Title Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text h3' => 'color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'sub_title_col', [
				'label' => __( 'Sub Title Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text p' => 'color: {{VALUE}};',
				],
			]
        );
		$this->add_control(
			'btn_border-text_col', [
				'label' => __( 'Button Border & Text Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2' => 'color: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_col', [
				'label' => __( 'Button Hover Bg & Border Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'background: {{VALUE}};border-color: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'btn_bg_hov_txt_col', [
				'label' => __( 'Button Hover Text Color', 'ararat-companion' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .slider_area .single_slider .slider_text .boxed-btn2:hover' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();
	}
    
	protected function render() {
    // call load widget script
    $this->load_widget_script(); 
    $settings   = $this->get_settings();  
    $sliders    = !empty( $settings['slider_contents'] ) ? $settings['slider_contents'] : ''; 
    ?>

    <!-- slider_area_start -->
    <div class="slider_area">
        <div class="slider_active owl-carousel">
            <?php
            if( is_array( $sliders ) && count( $sliders ) > 0 ){
                foreach ( $sliders as $slider ) {
                    $slider_img   = !empty( $slider['slider_img']['url'] ) ? $slider['slider_img']['url'] : '';
                    $slider_title = !empty( $slider['slider_title'] ) ? $slider['slider_title'] : '';
                    $sub_title    = !empty( $slider['sub_title'] ) ? $slider['sub_title'] : '';
                    $btn_label    = !empty( $slider['btn_label'] ) ? $slider['btn_label'] : '';
                    $btn_url      = !empty( $slider['btn_url']['url'] ) ? $slider['btn_url']['url'] : '';
                    ?>
                    <div class="single_slider overlay2 d-flex align-items-center justify-content-center slider_bg_1" <?php echo ararat_inline_bg_img( esc_url( $slider_img ) ); ?>>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="slider_text text-center">
                                        <h3><?php echo esc_html( $slider_title )?></h3>
                                        <p><?php echo esc_html( $sub_title )?></p>
                                        <a href="<?php echo esc_url( $btn_url )?>" class="boxed-btn2"><?php echo esc_html( $btn_label )?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>
    <!-- slider_area_end -->
    <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            // review-active
            $('.slider_active').owlCarousel({
            loop:true,
            margin:0,
            items:1,
            autoplay:true,
            navText:['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
                nav:false,
            dots:false,
            autoplayHoverPause: true,
            autoplaySpeed: 800,
                responsive:{
                    0:{
                        items:1,
                        dots:false
                    },
                    767:{
                        items:1,
                        dots:false
                    },
                    992:{
                        items:1
                    }
                }
            });
        })(jQuery);
        </script>
        <?php 
        }
    }	    
}